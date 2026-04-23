@extends('layouts.app')

@section('title', 'Admin • Login')

@section('content')
  <div class="card">
    <p class="h1">Admin Login (Prototype)</p>
    <p class="muted">No real credentials. Clicking login will set <b>session(role=admin)</b>.</p>

    <form method="POST" action="{{ route('admin.login.submit') }}">
      @csrf
      <button class="btn primary" type="submit">Login as Admin</button>
      <a class="btn" href="{{ route('entry') }}">Back</a>
    </form>
  </div>
@endsection