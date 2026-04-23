@extends('layouts.app')

@section('title', 'Student • Dashboard')

@section('content')
  <div class="card">
    <div class="row">
      <div>
        <p class="h1">Student Dashboard</p>
        <p class="muted">Welcome, <b>{{ $student_name }}</b> • Ref: <b>{{ $student_ref }}</b></p>
      </div>
      <a class="btn" href="{{ route('student.logout') }}">Logout</a>
    </div>
  </div>

  <div class="grid" style="margin-top:12px;">
    <div class="card half">
      <b>Application Status</b>
      <p class="muted" style="margin-top:8px;">
        Scholarship: {{ $application['scholarship_title'] ?? '—' }}<br>
        Status: <b>{{ strtoupper($application['status'] ?? '—') }}</b>
      </p>
      @if (!empty($application['admin_remarks']))
        <p class="muted"><b>Admin Remarks:</b> {{ $application['admin_remarks'] }}</p>
      @endif
    </div>

    <div class="card half">
      <b>Compliance Checklist (Mock)</b>
      <p class="muted" style="margin-top:8px;">
        • Certificate of Registration<br>
        • Latest Grades / GWA Proof<br>
        • Valid School ID<br>
      </p>
      <span class="badge">Next: Compliance upload (later)</span>
    </div>
  </div>
@endsection