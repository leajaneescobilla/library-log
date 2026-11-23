<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Library Log')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand navbar-dark bg-dark mb-4">
    <div class="container">
        <span class="navbar-brand">Library Log</span>
        <div class="navbar-nav">
            <a class="nav-link" href="{{ route('books.index') }}">Books</a>
            <a class="nav-link" href="{{ url('/borrowings/create') }}">Borrow a Book</a>
            <a class="nav-link" href="{{ url('/borrowings') }}">Borrowing Log</a>
        </div>
    </div>
</nav>

<div class="container">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @yield('content')
</div>
</body>
</html>