<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Foodie - Delicious Food Delivered</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    body {
      font-family: 'Outfit', sans-serif;
    }

    .font-body {
      font-family: 'Plus Jakarta Sans', sans-serif;
    }

    @keyframes float {
      0% {
        transform: translateY(0px);
      }

      50% {
        transform: translateY(-15px);
      }

      100% {
        transform: translateY(0px);
      }
    }

    .animate-float {
      animation: float 6s ease-in-out infinite;
    }

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

<body class="bg-[#fffbf7] text-slate-900 overflow-x-hidden selection:bg-[#f48c25] selection:text-white min-h-screen flex flex-col">

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
        
        @if (Route::has('login'))
        @auth
        <h2 class="text-base lg:text-base font-black text-slate-900">Welcome, <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f48c25] to-red-600">{{ Auth::user()->name }}</span></h2>
        <a href="{{ route('cart.view') }}" class="relative w-10 h-10 rounded-full bg-slate-900 text-white flex items-center justify-center hover:bg-[#f48c25] transition-colors shadow-lg shadow-black/10">
          <span class="material-symbols-outlined text-[20px]">shopping_bag</span>
          @auth
          @php 
            $count = \App\Models\Cart::where('user_id', Auth::id())->count();
          @endphp
          @if($count > 0)
          <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold border-2 border-white">
            {{ $count }}
          </span>
          @endif
          @endauth
        </a>
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <input type="submit"  class="lg:block bg-[#f48c25] hover:bg-orange-600 text-white px-6 py-2.5 rounded-full text-xs font-bold transition-all shadow-lg shadow-orange-500/30" value="Logout">
        </form>
        @else
        <a href="{{ route('login') }}" class="hidden lg:block bg-[#f48c25] hover:bg-orange-600 text-white px-6 py-2.5 rounded-full text-xs font-bold transition-all shadow-lg shadow-orange-500/30">Sign In</a>
        <a href="{{ route('register') }}" class="hidden lg:block bg-[#f48c25] hover:bg-orange-600 text-white px-6 py-2.5 rounded-full text-xs font-bold transition-all shadow-lg shadow-orange-500/30">Register</a>
        @endauth
        @endif
      </div>
    </div>
  </nav>

  @yield('content')

   <footer class="bg-[#1c140d] text-white/80 border-t border-white/5 py-12 mt-auto font-body">
    <div class="w-full px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-y-8 gap-x-12 mb-12">

             <!-- Brand -->
            <div class="lg:col-span-4 space-y-6">
                <div class="flex items-center gap-4">
                    <div class="bg-gradient-to-br from-orange-500 to-red-600 p-3 rounded-2xl text-white shadow-xl shadow-orange-900/30">
                        <span class="material-symbols-outlined text-3xl">restaurant</span>
                    </div>
                    <span class="text-4xl font-black text-white tracking-tight">Foodie<span class="text-orange-500">.</span></span>
                </div>
                <p class="text-slate-400 text-lg leading-relaxed pr-6 max-w-sm">
                    Delicious meals from your favorite local restaurants delivered straight to your door. Energetic, fast, and always fresh.
                </p>
                <div class="flex items-center gap-5 pt-4">
                     <a href="#" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center hover:bg-orange-600 hover:border-orange-600 hover:text-white transition-all duration-300">
                         <span class="material-symbols-outlined text-lg">facebook</span>
                     </a>
                     <a href="#" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center hover:bg-orange-600 hover:border-orange-600 hover:text-white transition-all duration-300">
                         <span class="material-symbols-outlined text-lg">public</span>
                     </a>
                     <a href="#" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center hover:bg-orange-600 hover:border-orange-600 hover:text-white transition-all duration-300">
                         <span class="material-symbols-outlined text-lg">alternate_email</span>
                     </a>
                </div>
            </div>

            <!-- Links 1 -->
            <div class="lg:col-span-2 lg:col-start-6">
                <h4 class="text-white font-bold text-xl mb-6">Explore</h4>
                <ul class="space-y-4 font-medium text-base text-slate-400">
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Offers Near Me</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Popular Restaurants</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> New on Foodie</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Gift Cards</a></li>
                </ul>
            </div>

            <!-- Links 2 -->
            <div class="lg:col-span-2">
                <h4 class="text-white font-bold text-xl mb-6">Support</h4>
                <ul class="space-y-4 font-medium text-base text-slate-400">
                    <li><a href="{{ route('contact') }}" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Help Center</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Safety Information</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Cancellation Options</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Refund Policy</a></li>
                </ul>
            </div>

            <!-- Links 3 -->
             <div class="lg:col-span-2">
                <h4 class="text-white font-bold text-xl mb-6">Join Us</h4>
                <ul class="space-y-4 font-medium text-base text-slate-400">
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Become a Driver</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Add your Restaurant</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Business Accounts</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Careers</a></li>
                </ul>
            </div>
        </div>

        <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-8">
            <p class="text-slate-500 text-base font-medium">
                © {{ date('Y') }} Foodie Inc. All rights reserved.
            </p>
            <div class="flex items-center gap-8 text-base font-medium text-slate-500">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-white transition-colors">Cookies Settings</a>
            </div>
        </div>
    </div>
</footer>

<script src="app.js"></script>
</body>