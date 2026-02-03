<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Foodie - Delicious Food Delivered</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .font-body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
        
        .glass {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .glass-dark {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="bg-[#fffbf7] text-slate-900 overflow-x-hidden selection:bg-[#f48c25] selection:text-white">

    <!-- Navbar -->
    <nav class="fixed w-full z-[100] transition-all duration-300 px-6 py-4 lg:px-12 top-0">
        <div class="glass max-w-7xl mx-auto rounded-full px-6 py-3 flex justify-between items-center shadow-lg shadow-black/5">
            <!-- Logo -->
            <a href="{{ route('user.home') }}" class="flex items-center gap-2 group">
                <div class="bg-gradient-to-br from-[#f48c25] to-orange-600 w-10 h-10 rounded-full flex items-center justify-center text-white shadow-[#f48c25]/30 shadow-lg group-hover:scale-110 transition-transform">
                    <span class="material-symbols-outlined">restaurant</span>
                </div>
                <span class="text-xl font-bold tracking-tight text-slate-800">Foodie<span class="text-[#f48c25]">.</span></span>
            </a>

            <!-- Links -->
            <div class="hidden md:flex items-center gap-8 font-medium text-sm text-slate-500">
                <a href="{{ route('user.home') }}" class="text-[#f48c25] font-bold">Home</a>
                <a href="{{ route('shop') }}" class="hover:text-[#f48c25] transition-colors">Menu</a>
                <a href="{{ route('about') }}" class="hover:text-[#f48c25] transition-colors">Story</a>
                <a href="{{ route('contact') }}" class="hover:text-[#f48c25] transition-colors">Contact</a>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-4">
                 <a href="{{ route('cart.view') }}" class="relative w-10 h-10 rounded-full bg-slate-900 text-white flex items-center justify-center hover:bg-[#f48c25] transition-colors shadow-lg shadow-black/10">
                    <span class="material-symbols-outlined text-[20px]">shopping_bag</span>
                    @if(session('cart'))
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold border-2 border-white">
                        {{ count(session('cart')) }}
                    </span>
                    @endif
                </a>
                 @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/redirect') }}" class="hidden lg:block bg-[#f48c25] hover:bg-orange-600 text-white px-6 py-2.5 rounded-full text-xs font-bold transition-all shadow-lg shadow-orange-500/30">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="hidden lg:block bg-[#f48c25] hover:bg-orange-600 text-white px-6 py-2.5 rounded-full text-xs font-bold transition-all shadow-lg shadow-orange-500/30">Sign In</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    


</body>