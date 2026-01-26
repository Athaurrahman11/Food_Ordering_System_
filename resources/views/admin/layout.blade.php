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
<!-- Sidebar Navigation -->
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
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors" href="{{ uri('admin_dashboard') }}">
<span class="material-symbols-outlined">dashboard</span>
<span class="text-sm font-medium">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 bg-primary/10 text-primary rounded-lg transition-colors" href="{{ uri('orders') }}">
<span class="material-symbols-outlined fill-[1]">shopping_bag</span>
<span class="text-sm font-bold">Orders</span>
</a>
<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors" href="{{ uri('menu') }}">
<span class="material-symbols-outlined">menu_book</span>
<span class="text-sm font-medium">Menu</span>
</a>

<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors" href="{{ uri('food') }}">
<span class="material-symbols-outlined">restaurant_menu</span>
<span class="text-sm font-medium">Food</span>
</a>



<a class="flex items-center gap-3 px-3 py-2 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 rounded-lg transition-colors" href="{{ uri('customers') }}">
<span class="material-symbols-outlined">group</span>
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
<script src="js/app.js"></script>
</body>