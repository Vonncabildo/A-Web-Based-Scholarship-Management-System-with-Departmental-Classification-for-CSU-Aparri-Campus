@extends('layouts.app')

@section('title', 'Student • Scholarship Details')

@section('content')
  <div class="card">
    <div class="row">
      <div>
        <p class="h1">{{ $scholarship['title'] }}</p>
        <p class="muted">{{ $scholarship['description'] }}</p>
      </div>
      <span class="badge">{{ strtoupper($scholarship['status']) }}</span>
    </div>

    <div style="margin-top:12px;">
      <p class="muted"><b>Deadline:</b> {{ $scholarship['deadline'] }}</p>
      <p class="muted"><b>Eligible Program:</b> {{ $scholarship['eligible_program'] }}</p>
      <p class="muted"><b>Eligible Year Level:</b> {{ $scholarship['eligible_year_level'] }}</p>
    </div>

    <div style="margin-top:14px;" class="row">
      <a class="btn" href="{{ route('student.scholarships') }}">Back</a>

      @if ($scholarship['status'] === 'open')
        <a class="btn primary" href="{{ route('student.apply', $scholarship['id']) }}">Apply Now</a>
      @else
        <span class="badge">Applications closed</span>
      @endif
    </div>
  </div>
@endsection