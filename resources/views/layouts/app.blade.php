<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'To-Do List App')</title>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    body {
    background: linear-gradient(135deg, #0077b6, #023e8a, #48cae4);
    font-family: 'Poppins', sans-serif;
}
</style>
<body>
    <div class="container mt-5">
        <h2 class="text-center">@yield('header')</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @yield('content')

        <footer class="nt-5 text-center">
            <hr>
            <p>&copy; {{ date ('Y') }} To-Do List App - Dibuat dengan Laravel</p>
        </footer>
    </div>
</body>
</html>