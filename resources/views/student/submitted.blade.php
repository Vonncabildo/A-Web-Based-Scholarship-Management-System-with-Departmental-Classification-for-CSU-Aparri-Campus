@extends('layouts.app')

@section('title', 'Student • Submitted')

@section('content')
  <div class="card">
    <p class="h1">Application Submitted</p>
    <p class="muted">Your application is now recorded as <b>Pending Review</b> (session-only prototype).</p>

    <div style="margin-top:12px;">
      <p class="muted"><b>Applicant:</b> {{ $application['applicant_name'] }}</p>
      <p class="muted"><b>Email:</b> {{ $application['email'] }}</p>
      <p class="muted"><b>Scholarship:</b> {{ $application['scholarship_title'] }}</p>
      <p class="muted"><b>Status:</b> {{ strtoupper($application['status']) }}</p>
      <p class="muted"><b>Submitted:</b> {{ $application['submitted_at'] }}</p>
    </div>

    <div class="row" style="margin-top:14px;">
      <a class="btn" href="{{ route('student.scholarships') }}">Back to Scholarships</a>
      <a class="btn" href="{{ route('entry') }}">Home</a>
    </div>
  </div>
@endsection