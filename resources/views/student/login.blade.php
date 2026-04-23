@extends('layouts.app')

@section('title', 'Student • Portal Login')

@section('content')
  <div class="card">
    <p class="h1">Student Portal Login</p>
    <p class="muted">Login is enabled only after Admin approval. Use <b>Name + Reference ID</b>.</p>

    @if (session('err'))
      <p class="muted" style="margin-top:10px;"><b>Error:</b> {{ session('err') }}</p>
    @endif

    <form method="POST" action="{{ route('student.login.submit') }}" style="margin-top:12px;">
      @csrf

      <label><b>Name</b></label><br>
      <input name="name" required placeholder="Exact name used in application"
        style="width:100%; margin-top:6px; padding:10px; border-radius:10px; border:1px solid #1f2833; background:#0b0d10; color:#e8eef6;">

      <div style="height:10px;"></div>

      <label><b>Reference ID</b></label><br>
      <input name="reference_id" required placeholder="e.g., REF-2026-0001"
        style="width:100%; margin-top:6px; padding:10px; border-radius:10px; border:1px solid #1f2833; background:#0b0d10; color:#e8eef6;">

      <div class="row" style="margin-top:12px;">
        <a class="btn" href="{{ route('entry') }}">Back</a>
        <button class="btn primary" type="submit">Login</button>
      </div>
    </form>
  </div>
@endsection