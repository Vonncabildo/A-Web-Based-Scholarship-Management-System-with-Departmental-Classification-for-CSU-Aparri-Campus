@extends('layouts.app')

@section('title', 'Student • Scholarships')

@section('content')
  <div class="card">
    <div class="row">
      <div>
        <p class="h1">Available Scholarships</p>
        <p class="muted">Showing only scholarships with status <b>Open</b> (hardcoded from config/mock.php).</p>
      </div>
      <span class="badge">{{ count($scholarships) }} open</span>
    </div>
  </div>

  <div class="grid" style="margin-top:12px;">
    @forelse ($scholarships as $s)
      <div class="card half">
        <div class="row">
          <div>
            <b>{{ $s['title'] }}</b>
            <div class="muted">Deadline: {{ $s['deadline'] }}</div>
            <div class="muted">Eligible: {{ $s['eligible_program'] }} • {{ $s['eligible_year_level'] }}</div>
          </div>
          <span class="badge">Open</span>
        </div>

        <p class="muted" style="margin-top:10px;">{{ $s['description'] }}</p>

        {{-- Next step (details) will be added later --}}
        <a class="btn primary" href="{{ route('student.scholarships.details', $s['id']) }}">
            View Details
        </a>
      </div>
    @empty
      <div class="card">
        <b>No open scholarships.</b>
        <p class="muted">Check back later.</p>
      </div>
    @endforelse
  </div>
@endsection