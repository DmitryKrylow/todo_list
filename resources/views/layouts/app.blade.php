<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'ToDo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
<nav class="mb-4">
    @auth
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-outline-danger">Выйти</button>
        </form>
    @endauth
</nav>
@yield('content')
</body>
</html>
