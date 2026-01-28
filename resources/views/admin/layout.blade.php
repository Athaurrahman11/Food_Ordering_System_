<!DOCTYPE html>
<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Order Management List - Admin Dashboard</title>

<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#197fe6",
                        "background-light": "#f6f7f8",
                        "background-dark": "#111921",
                        "card-dark": "#1a222c",
                        "border-dark": "#2d3748",
                    },
                    fontFamily: {
                        "display": ["Inter"]
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                },
            },
        }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 antialiased min-h-screen">
<div class="flex h-screen overflow-hidden">

<aside class="w-64 flex-shrink-0 bg-white dark:bg-card-dark border-r border-slate-200 dark:border-border-dark hidden md:flex flex-col">


<div class="p-6">
<div class="flex items-center gap-3">
<div class="flex items-center gap-2">
<img class="w-14 h-14 rounded-full border  dark:border-slate-700 border-blue-300"  src="{{ asset('images/image.png') }}"/>
<span class="text-sm font-medium text-blue-500">Hello,</span>
</div>


<div>
<h1 class="text-slate-900 dark:text-white text-lg font-bold leading-none">FoodAdmin</h1>
<p class="text-slate-500 dark:text-slate-400 text-xs mt-1">  Admin</p>
</div>
</div>
</div>
<nav class="flex-1 px-4 space-y-1 overflow-y-auto">
<a class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ request()->is('admin_dashboard') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}" href="{{ url('admin_dashboard') }}">
<span class="material-symbols-outlined {{ request()->is('admin_dashboard') ? 'fill-[1]' : '' }}">dashboard</span>
<span class="text-sm font-medium">Dashboard</span>
</a>

<a class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ request()->is('orders*') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}" href="{{ url('orders') }}">
<span class="material-symbols-outlined {{ request()->is('orders*') ? 'fill-[1]' : '' }}">shopping_bag</span>
<span class="text-sm font-medium">Orders</span>
</a>

<a class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ request()->is('menu*') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}" href="{{ url('menu') }}">
<span class="material-symbols-outlined {{ request()->is('menu*') ? 'fill-[1]' : '' }}">menu_book</span>
<span class="text-sm font-medium">Menu</span>
</a>

<a class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ request()->is('food*') || request()->is('add_food') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}" href="{{ route('food_management') }}">
<span class="material-symbols-outlined {{ request()->is('food*') ? 'fill-[1]' : '' }}">restaurant_menu</span>
<span class="text-sm font-medium">Food</span>
</a>

<a class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ request()->is('restaurants*') || request()->is('add_restaurant') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}" href="{{ url('restaurants') }}">
<span class="material-symbols-outlined {{ request()->is('restaurants*') ? 'fill-[1]' : '' }}">storefront</span>
<span class="text-sm font-medium">Restaurants</span>
</a>

<a class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ request()->is('customers*') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}" href="{{ url('customers') }}">
<span class="material-symbols-outlined {{ request()->is('customers*') ? 'fill-[1]' : '' }}">group</span>
<span class="text-sm font-medium">Customers</span>
</a>


</nav>
<div class="p-4 border-t border-slate-200 dark:border-border-dark">
<button class="w-full flex items-center justify-center gap-2 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 py-2 rounded-lg transition-colors font-semibold text-sm">
<span class="material-symbols-outlined text-sm">logout</span>
                    Logout
                </button>


              </div>
            </aside>

    <div class="flex-1 flex flex-col min-w-0 overflow-hidden relative">
        

        <header class="bg-white dark:bg-card-dark border-b border-slate-200 dark:border-border-dark h-16 flex items-center justify-between px-4 md:hidden z-10">
            <div class="flex items-center gap-2">
                 <img class="w-8 h-8 rounded-full border border-blue-300" src="{{ asset('images/image.png') }}"/>
                 <span class="font-bold text-slate-900 dark:text-white">FoodAdmin</span>
            </div>
            <button id="mobile-menu-btn" class="p-2 rounded-lg text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </header>


        <div id="mobile-sidebar-overlay" class="fixed inset-0 bg-black/50 z-40 hidden transition-opacity opacity-0 mx-auto"></div>


        <aside id="mobile-sidebar" class="fixed inset-y-0 left-0 w-64 bg-white dark:bg-card-dark z-50 transform -translate-x-full transition-transform duration-300 flex flex-col shadow-2xl md:hidden">
            <div class="p-4 border-b border-slate-200 dark:border-border-dark flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <img class="w-10 h-10 rounded-full border border-blue-300" src="{{ asset('images/image.png') }}"/>
                    <div>
                        <h1 class="text-slate-900 dark:text-white text-base font-bold leading-none">FoodAdmin</h1>
                        <p class="text-slate-500 dark:text-slate-400 text-[10px] mt-0.5">Admin</p>
                    </div>
                </div>
                <button id="close-sidebar-btn" class="p-2 rounded-lg text-slate-500 hover:bg-slate-100 dark:hover:bg-slate-800">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <nav class="flex-1 px-4 space-y-1 overflow-y-auto py-4">
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ request()->is('admin_dashboard') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}" href="{{ url('admin_dashboard') }}">
                    <span class="material-symbols-outlined {{ request()->is('admin_dashboard') ? 'fill-[1]' : '' }}">dashboard</span>
                    <span class="text-sm font-medium">Dashboard</span>
                </a>

                <a class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ request()->is('orders*') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}" href="{{ url('orders') }}">
                    <span class="material-symbols-outlined {{ request()->is('orders*') ? 'fill-[1]' : '' }}">shopping_bag</span>
                    <span class="text-sm font-medium">Orders</span>
                </a>

                <a class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ request()->is('menu*') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}" href="{{ url('menu') }}">
                    <span class="material-symbols-outlined {{ request()->is('menu*') ? 'fill-[1]' : '' }}">menu_book</span>
                    <span class="text-sm font-medium">Menu</span>
                </a>

                <a class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ request()->is('food*') || request()->is('add_food') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}" href="{{ route('food_management') }}">
                    <span class="material-symbols-outlined {{ request()->is('food*') ? 'fill-[1]' : '' }}">restaurant_menu</span>
                    <span class="text-sm font-medium">Food</span>
                </a>

                <a class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ request()->is('restaurants*') || request()->is('add_restaurant') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}" href="{{ url('restaurants') }}">
                    <span class="material-symbols-outlined {{ request()->is('restaurants*') ? 'fill-[1]' : '' }}">storefront</span>
                    <span class="text-sm font-medium">Restaurants</span>
                </a>

                <a class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors {{ request()->is('customers*') ? 'bg-primary/10 text-primary' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800' }}" href="{{ url('customers') }}">
                    <span class="material-symbols-outlined {{ request()->is('customers*') ? 'fill-[1]' : '' }}">group</span>
                    <span class="text-sm font-medium">Customers</span>
                </a>
            </nav>

            <div class="p-4 border-t border-slate-200 dark:border-border-dark">
                 <button class="w-full flex items-center justify-center gap-2 bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 py-2 rounded-lg transition-colors font-semibold text-sm">
                    <span class="material-symbols-outlined text-sm">logout</span>
                    Logout
                </button>
            </div>
        </aside>


        @yield('content')
    </div>

</div>

<script>
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const closeSidebarBtn = document.getElementById('close-sidebar-btn');
    const mobileSidebar = document.getElementById('mobile-sidebar');
    const overlay = document.getElementById('mobile-sidebar-overlay');

    function toggleSidebar() {
        const isHidden = mobileSidebar.classList.contains('-translate-x-full');
        if (isHidden) {
            // Open
            mobileSidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            setTimeout(() => overlay.classList.remove('opacity-0'), 10);
        } else {
            // Close
            mobileSidebar.classList.add('-translate-x-full');
            overlay.classList.add('opacity-0');
            setTimeout(() => overlay.classList.add('hidden'), 300);
        }
    }

    mobileMenuBtn.addEventListener('click', toggleSidebar);
    closeSidebarBtn.addEventListener('click', toggleSidebar);
    overlay.addEventListener('click', toggleSidebar);
</script>
<script src="js/app.js"></script>
</body>