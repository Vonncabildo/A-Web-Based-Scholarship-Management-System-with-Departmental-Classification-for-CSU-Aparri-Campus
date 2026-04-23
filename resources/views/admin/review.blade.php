@extends('layouts.app')

@section('title', 'Admin • Review Application')

@section('content')
  <div class="card">
    <div class="row">
      <div>
        <p class="h1">Review Application</p>
        <p class="muted">Approve or reject. Approval generates Reference ID and enables student portal login.</p>
      </div>
      <a class="btn" href="{{ route('admin.applications') }}">Back</a>
    </div>
  </div>

  <div class="card" style="margin-top:12px;">
    <b>Applicant:</b> {{ $application['applicant_name'] }}<br>
    <span class="muted">Email: {{ $application['email'] }}</span><br>
    <span class="muted">Program: {{ $application['program'] }} • Year: {{ $application['year_level'] }}</span><br>
    <span class="muted">Scholarship: {{ $application['scholarship_title'] }}</span><br>
    <span class="muted">Current Status: {{ strtoupper($application['status'] ?? 'pending_review') }}</span>

    <div style="margin-top:12px;">
      <form method="POST" action="{{ route('admin.applications.approve') }}" style="margin-bottom:10px;">
        @csrf
        <label><b>Admin Remarks (optional)</b></label><br>
        <input name="admin_remarks" placeholder="Remarks..."
          style="width:100%; margin-top:6px; padding:10px; border-radius:10px; border:1px solid #1f2833; background:#0b0d10; color:#e8eef6;">
        <div class="row" style="margin-top:10px;">
          <button class="btn primary" type="submit">Approve</button>
        </div>
      </form>

      <form method="POST" action="{{ route('admin.applications.reject') }}">
        @csrf
        <label><b>Admin Remarks (optional)</b></label><br>
        <input name="admin_remarks" placeholder="Reason for rejection..."
          style="width:100%; margin-top:6px; padding:10px; border-radius:10px; border:1px solid #1f2833; background:#0b0d10; color:#e8eef6;">
        <div class="row" style="margin-top:10px;">
          <button class="btn" type="submit">Reject</button>
        </div>
      </form>
    </div>
  </div>
@endsection