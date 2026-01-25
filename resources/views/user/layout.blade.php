<!DOCTYPE html>
<html>
<head>
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>@yield('title')</title>
</head>


<body>

<header>
    <h1>My Website</h1>
    <nav>
        <a href="/" class="">Home</a>
        <a href="/about">About</a>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer >
    © 2026 My Website
</footer>

</body>
</html>
