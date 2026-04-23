@extends('layouts.app')

@section('title', 'Admin • Applications')

@section('content')
  <div class="card">
    <div class="row">
      <div>
        <p class="h1">Applications</p>
        <p class="muted">Prototype list. Reads from session('application') only.</p>
      </div>
      <div class="row">
        <a class="btn" href="{{ route('admin.dashboard') }}">Back</a>
        <a class="btn" href="{{ route('admin.logout') }}">Logout</a>
      </div>
    </div>

    @if (session('msg'))
      <p class="muted" style="margin-top:10px;"><b>Notice:</b> {{ session('msg') }}</p>
    @endif
  </div>

  <div class="card" style="margin-top:12px;">
    @if (!$application)
      <b>No submitted application yet.</b>
      <p class="muted">Submit one from the Student flow first (Apply → Submit).</p>
    @else
      <div class="row">
        <div>
          <b>{{ $application['applicant_name'] }}</b>
          <div class="muted">{{ $application['email'] }}</div>
          <div class="muted">Scholarship: {{ $application['scholarship_title'] }}</div>
        </div>

        <span class="badge">
          {{ strtoupper($application['status'] ?? 'pending_review') }}
        </span>
      </div>

      @if (!empty($application['reference_id']))
        <p class="muted" style="margin-top:10px;"><b>Reference ID:</b> {{ $application['reference_id'] }}</p>
      @endif

      @if (!empty($application['admin_remarks']))
        <p class="muted"><b>Remarks:</b> {{ $application['admin_remarks'] }}</p>
      @endif

      <a class="btn primary" href="{{ route('admin.applications.review') }}" style="margin-top:10px;">
        Review Application
      </a>
    @endif
  </div>
@endsection