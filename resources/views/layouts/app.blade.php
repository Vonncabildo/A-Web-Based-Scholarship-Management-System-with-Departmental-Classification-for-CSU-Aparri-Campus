<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Scholarship Portal Prototype')</title>
  <style>
    :root { --bg:#0b0d10; --card:#12161c; --text:#e8eef6; --muted:#9aa6b2; --line:#1f2833; }
    body { margin:0; font-family: system-ui, -apple-system, Segoe UI, Roboto, Arial; background:var(--bg); color:var(--text); }
    a { color:inherit; text-decoration:none; }
    .wrap { max-width: 980px; margin: 0 auto; padding: 20px; }
    .top { display:flex; align-items:center; justify-content:space-between; gap:12px; margin-bottom: 16px; }
    .brand { font-weight:700; letter-spacing:.3px; }
    .nav { display:flex; gap:10px; flex-wrap:wrap; }
    .btn { display:inline-block; padding:10px 12px; border-radius:10px; background:#1b2430; border:1px solid var(--line); }
    .btn:hover { filter: brightness(1.05); }
    .btn.primary { background:#2b3a4a; }
    .grid { display:grid; grid-template-columns: repeat(12, 1fr); gap:12px; }
    .card { grid-column: span 12; background:var(--card); border:1px solid var(--line); border-radius:14px; padding:14px; }
    @media (min-width: 760px) { .card.half { grid-column: span 6; } }
    .muted { color:var(--muted); }
    .h1 { font-size: 20px; margin: 0 0 6px; }
    .badge { display:inline-block; padding:4px 10px; border-radius:999px; border:1px solid var(--line); color:var(--muted); font-size: 12px; }
    .row { display:flex; align-items:center; justify-content:space-between; gap:12px; flex-wrap:wrap; }
  </style>
</head>
<body>
  <div class="wrap">
    <div class="top">
      <div class="brand">Scholarship Portal • Prototype</div>
      <div class="nav">
        <a class="btn" href="{{ route('entry') }}">Home</a>
        <a class="btn" href="{{ route('student.scholarships') }}">Student</a>
        <a class="btn" href="{{ route('admin.login') }}">Admin</a>
      </div>
    </div>

    @yield('content')
  </div>
</body>
</html>