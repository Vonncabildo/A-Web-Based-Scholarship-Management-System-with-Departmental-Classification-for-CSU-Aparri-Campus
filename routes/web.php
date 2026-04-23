<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| System Entry
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('entry.index');
})->name('entry');

/*
|--------------------------------------------------------------------------
| Student (Public - No Login) + Student Portal
|--------------------------------------------------------------------------
*/
Route::prefix('student')->group(function () {

    // Public list (Open only)
    Route::get('/scholarships', function () {
        $scholarships = collect(config('mock.scholarships'))
            ->where('status', 'open')
            ->values()
            ->all();

        return view('student.scholarships', compact('scholarships'));
    })->name('student.scholarships');

    // Scholarship details (public)
    Route::get('/scholarships/{id}', function ($id) {
        $scholarship = collect(config('mock.scholarships'))->firstWhere('id', (int)$id);
        if (!$scholarship) abort(404);

        return view('student.details', compact('scholarship'));
    })->name('student.scholarships.details');

    // Apply form (public)
    Route::get('/apply/{id}', function (Request $request, $id) {
        $scholarship = collect(config('mock.scholarships'))->firstWhere('id', (int)$id);

        if (!$scholarship || $scholarship['status'] !== 'open') {
            return redirect()->route('student.scholarships');
        }

        return view('student.apply', compact('scholarship'));
    })->name('student.apply');

    // Submit application (session only)
    Route::post('/apply/{id}', function (Request $request, $id) {
        $scholarship = collect(config('mock.scholarships'))->firstWhere('id', (int)$id);

        if (!$scholarship || $scholarship['status'] !== 'open') {
            return redirect()->route('student.scholarships');
        }

        $request->session()->put('application', [
            'scholarship_id' => (int)$id,
            'scholarship_title' => $scholarship['title'],
            'applicant_name' => trim((string)$request->input('applicant_name')),
            'email' => trim((string)$request->input('email')),
            'program' => trim((string)$request->input('program')),
            'year_level' => trim((string)$request->input('year_level')),
            'status' => 'pending_review',
            'submitted_at' => now()->format('Y-m-d H:i'),
        ]);

        return redirect()->route('student.submitted');
    })->name('student.apply.submit');

    // Submitted page
    Route::get('/submitted', function (Request $request) {
        $application = $request->session()->get('application');
        if (!$application) return redirect()->route('student.scholarships');

        return view('student.submitted', compact('application'));
    })->name('student.submitted');

    // Student portal login (Approved only)
    Route::get('/login', function () {
        return view('student.login');
    })->name('student.login');

    Route::post('/login', function (Request $request) {
        $name = trim((string)$request->input('name'));
        $ref  = trim((string)$request->input('reference_id'));

        $approved = $request->session()->get('approved_access');

        $ok = $approved
            && strcasecmp($approved['name'], $name) === 0
            && $approved['reference_id'] === $ref;

        if (!$ok) {
            return back()->with('err', 'Invalid Name or Reference ID (prototype).');
        }

        $request->session()->put('student_logged', true);
        $request->session()->put('student_name', $name);
        $request->session()->put('student_ref', $ref);

        return redirect()->route('student.dashboard');
    })->name('student.login.submit');

    Route::get('/dashboard', function (Request $request) {
        if (!$request->session()->get('student_logged')) {
            return redirect()->route('student.login');
        }

        $application = $request->session()->get('application');

        return view('student.dashboard', [
            'application' => $application,
            'student_name' => $request->session()->get('student_name'),
            'student_ref' => $request->session()->get('student_ref'),
        ]);
    })->name('student.dashboard');

    Route::get('/logout', function (Request $request) {
        $request->session()->forget(['student_logged', 'student_name', 'student_ref']);
        return redirect()->route('entry');
    })->name('student.logout');
});

/*
|--------------------------------------------------------------------------
| Admin (Session Role Simulated)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    Route::get('/login', function () {
        return view('admin.login');
    })->name('admin.login');

    Route::post('/login', function (Request $request) {
        $request->session()->put('role', 'admin');
        return redirect()->route('admin.dashboard');
    })->name('admin.login.submit');

    Route::get('/dashboard', function (Request $request) {
        if ($request->session()->get('role') !== 'admin') {
            return redirect()->route('admin.login');
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/logout', function (Request $request) {
        $request->session()->forget('role');
        return redirect()->route('entry');
    })->name('admin.logout');

    // Applications list
    Route::get('/applications', function (Request $request) {
        if ($request->session()->get('role') !== 'admin') {
            return redirect()->route('admin.login');
        }

        $application = $request->session()->get('application');

        return view('admin.applications', compact('application'));
    })->name('admin.applications');

    // Review page
    Route::get('/applications/review', function (Request $request) {
        if ($request->session()->get('role') !== 'admin') {
            return redirect()->route('admin.login');
        }

        $application = $request->session()->get('application');
        if (!$application) return redirect()->route('admin.applications');

        return view('admin.review', compact('application'));
    })->name('admin.applications.review');

    // Approve
    Route::post('/applications/approve', function (Request $request) {
        if ($request->session()->get('role') !== 'admin') {
            return redirect()->route('admin.login');
        }

        $application = $request->session()->get('application');
        if (!$application) return redirect()->route('admin.applications');

        $ref = 'REF-' . now()->format('Y') . '-' . str_pad((string)rand(1, 9999), 4, '0', STR_PAD_LEFT);

        $application['status'] = 'approved';
        $application['reference_id'] = $ref;
        $application['admin_remarks'] = trim((string)$request->input('admin_remarks'));

        $request->session()->put('application', $application);

        $request->session()->put('approved_access', [
            'name' => $application['applicant_name'],
            'reference_id' => $ref,
        ]);

        return redirect()->route('admin.applications')->with('msg', 'Application approved. Reference ID generated.');
    })->name('admin.applications.approve');

    // Reject
    Route::post('/applications/reject', function (Request $request) {
        if ($request->session()->get('role') !== 'admin') {
            return redirect()->route('admin.login');
        }

        $application = $request->session()->get('application');
        if (!$application) return redirect()->route('admin.applications');

        $application['status'] = 'rejected';
        $application['admin_remarks'] = trim((string)$request->input('admin_remarks'));

        $request->session()->put('application', $application);
        $request->session()->forget('approved_access');

        return redirect()->route('admin.applications')->with('msg', 'Application rejected.');
    })->name('admin.applications.reject');
});