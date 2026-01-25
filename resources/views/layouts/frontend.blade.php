<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodOrder - University Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-orange-500">FastFood</a>
            <div class="space-x-6">
                <a href="/" class="hover:text-orange-500">Menu</a>
                <a href="/cart" class="hover:text-orange-500">Cart (0)</a>
                <a href="/login" class="bg-orange-500 text-white px-4 py-2 rounded">Login</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-8 p-4">
        @yield('content')
    </main>

    <footer class="text-center p-8 text-gray-500 mt-10">
        &copy; 2024 FoodOrder Project - University Exam
    </footer>
</body>
</html>
