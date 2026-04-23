@extends('layouts.app')

@section('title', 'Entry • Role Selection')

@section('content')
  <div class="card">
    <p class="h1">Role Selection</p>
    <p class="muted">Choose where you want to go. This prototype uses session-based role simulation and hardcoded data.</p>

    <div class="grid" style="margin-top:12px;">
      <div class="card half">
        <div class="row">
          <div>
            <b>Student / Applicant</b>
            <div class="muted">Browse scholarships and apply (no login).</div>
          </div>
          <a class="btn primary" href="{{ route('student.scholarships') }}">Enter</a>
        </div>
      </div>

      <div class="card half">
        <div class="row">
          <div>
            <b>Admin</b>
            <div class="muted">Login (simulated) to access dashboard.</div>
          </div>
          <a class="btn primary" href="{{ route('admin.login') }}">Login</a>
        </div>
      </div>
    </div>
  </div>
@endsection