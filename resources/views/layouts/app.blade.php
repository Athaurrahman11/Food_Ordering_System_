<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodieDash - The Best of Your City</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .brand-orange { color: #E87A5D; }
        .bg-brand-orange { background-color: #E87A5D; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <nav class="bg-white py-4 px-8 flex justify-between items-center sticky top-0 z-50 shadow-sm">
        <div class="flex items-center gap-8">
            <div class="flex items-center gap-2 text-2xl font-bold brand-orange">
                <i class="fas fa-hamburger"></i> FoodieDash
            </div>
            <div class="hidden md:flex gap-6 font-medium text-gray-600">
                <a href="#">Offers</a>
                <a href="#">Restaurants</a>
                <a href="#">Help</a>
            </div>
        </div>

        <div class="flex items-center gap-4">
            <div class="relative">
                <input type="text" placeholder="Search for dishes..." class="bg-gray-100 rounded-full py-2 px-10 focus:outline-none w-64">
                <i class="fas fa-search absolute left-4 top-3 text-gray-400"></i>
            </div>
            <button class="font-bold text-gray-700">Sign In</button>
            <button class="bg-brand-orange text-white px-6 py-2 rounded-full font-bold shadow-lg shadow-orange-200">Sign Up</button>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-white border-t mt-20 pt-16 pb-8">
        <div class="container mx-auto px-8 grid grid-cols-1 md:grid-cols-4 gap-12">
            <div>
                <div class="text-xl font-bold brand-orange mb-4">FoodieDash</div>
                <p class="text-gray-500 mb-6">The premier destination for food discovery. Join our community of food lovers today.</p>
                <div class="flex gap-4">
                    <i class="fab fa-facebook text-xl text-gray-400 cursor-pointer"></i>
                    <i class="fab fa-instagram text-xl text-gray-400 cursor-pointer"></i>
                    <i class="fab fa-twitter text-xl text-gray-400 cursor-pointer"></i>
                </div>
            </div>
            <div>
                <h4 class="font-bold mb-4">Discovery</h4>
                <ul class="text-gray-500 space-y-2">
                    <li>Restaurants Near Me</li>
                    <li>Top Rated Dishes</li>
                    <li>Special Offers</li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4">Company</h4>
                <ul class="text-gray-500 space-y-2">
                    <li>About Us</li>
                    <li>Be a Courier</li>
                    <li>Add your Restaurant</li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4">Stay Hungry</h4>
                <p class="text-gray-500 mb-4 text-sm">Get the best culinary news and offers in your inbox.</p>
                <div class="flex">
                    <input type="email" placeholder="Email address" class="bg-gray-100 rounded-l-lg p-3 w-full outline-none">
                    <button class="bg-brand-orange text-white px-4 rounded-r-lg">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="container mx-auto px-8 mt-12 pt-8 border-t flex justify-between text-gray-400 text-sm">
            <p>© {{ date('Y') }} FoodieDash. All rights reserved.</p>
            <div class="flex gap-6">
                <span>Privacy Policy</span>
                <span>Terms of Service</span>
            </div>
        </div>
    </footer>

</body>
</html>
