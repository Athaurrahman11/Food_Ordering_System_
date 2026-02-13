<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DineNexus</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

  <nav class="fixed w-full z-[100] transition-all duration-300 px-6 py-4 lg:px-12 top-0" id="navbar">
    <div class="glass max-w-7xl mx-auto rounded-full px-6 py-3 flex justify-between items-center shadow-lg shadow-black/5">
      
      <!-- Mobile Menu Button -->
      <button id="mobile-menu-btn" class="lg:hidden text-slate-800 hover:text-[#f48c25] transition-colors p-1">
        <span class="material-symbols-outlined text-2xl">menu</span>
      </button>

      <a href="{{ route('user.home') }}" class="flex items-center gap-2 group">
        <img src="{{ asset('images/logo.svg') }}" alt="DineNexus Logo" class="w-10 h-10 shadow-lg shadow-orange-500/30 rounded-full group-hover:scale-110 transition-transform">
        <span class="text-xl font-bold tracking-tight text-slate-800">DineNexus<span class="text-[#f48c25]">.</span></span>
      </a>

      <!-- Desktop Navigation -->
      <div class="hidden lg:flex items-center gap-8 font-medium text-sm text-slate-500">
        <a href="{{ route('user.home') }}" class="hover:text-[#f48c25] transition-colors {{ request()->routeIs('user.home*') ? 'text-[#f48c25] font-semibold' : '' }}">Home</a>
        <a href="{{ route('shop') }}" class="hover:text-[#f48c25] transition-colors {{ request()->routeIs('shop*') ? 'text-[#f48c25] font-semibold' : '' }}">Menu</a>
        <a href="{{ route('about') }}" class="hover:text-[#f48c25] transition-colors {{ request()->routeIs('about*') ? 'text-[#f48c25] font-semibold' : '' }}">Story</a>
        <a href="{{ route('contact') }}" class="hover:text-[#f48c25] transition-colors {{ request()->routeIs('contact*') ? 'text-[#f48c25] font-semibold' : '' }}">Contact</a>
      </div>


      <div class="flex items-center gap-4">

        @if (Route::has('login'))
        @auth
        <h2 class="hidden lg:block text-base lg:text-base font-black text-slate-900">Welcome, <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f48c25] to-red-600">{{ Auth::user()->name }}</span></h2>
        <a href="{{ route('cart.view') }}" class="relative w-10 h-10 rounded-full bg-slate-900 text-white flex items-center justify-center hover:bg-[#f48c25] transition-colors shadow-lg shadow-black/10">
          <span class="material-symbols-outlined text-[20px]">shopping_bag</span>
          @auth
          @php
          $count = \App\Models\Cart::where('user_id', Auth::id())->sum('quantity');
          @endphp
          @if($count > 0)
          <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold border-2 border-white">
            {{ $count }}
          </span>
          @endif
          @endauth
        </a>

        <a href="{{ route('my_orders') }}" class="hidden lg:flex items-center justify-center bg-[#f48c25] hover:bg-orange-600 text-white px-6 py-2.5 rounded-full text-xs font-bold transition-all shadow-lg shadow-orange-500/30 h-10">My Orders</a>

        <form action="{{ route('logout') }}" method="post" class="hidden lg:flex items-center">
          @csrf
          <button type="submit" class="flex items-center justify-center bg-[#f48c25] hover:bg-orange-600 text-white px-6 py-2.5 rounded-full text-xs font-bold transition-all shadow-lg shadow-orange-500/30 h-10">Logout</button>
        </form>

        @else
        <a href="{{ route('login') }}" class="hidden lg:block text-slate-900 hover:text-[#f48c25] px-6 py-2.5 rounded-full text-xs font-bold transition-colors">Sign In</a>
        <a href="{{ route('register') }}" class="hidden lg:block bg-[#f48c25] hover:bg-orange-600 text-white px-8 py-3 rounded-full text-xs font-bold transition-all shadow-lg shadow-orange-500/30 hover:-translate-y-0.5">Register Now</a>
        <!-- Mobile Login Link -->
        <a href="{{ route('login') }}" class="lg:hidden text-slate-900 font-bold text-sm bg-slate-100 rounded-full px-4 py-2 hover:bg-[#f48c25] hover:text-white transition-colors">Login</a>
        @endauth
        @endif
      </div>
    </div>
  </nav>

  <!-- Mobile Sidebar Backdrop -->
  <div id="sidebar-backdrop" class="fixed inset-0 bg-black/50 z-[140] hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm"></div>

  <!-- Mobile Sidebar -->
  <div id="mobile-sidebar" class="fixed top-0 left-0 h-full w-[280px] bg-white shadow-2xl z-[150] transform -translate-x-full transition-transform duration-300 ease-in-out flex flex-col font-body">
      <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
         <a href="{{ route('user.home') }}" class="flex items-center gap-2 group">
            <img src="{{ asset('images/logo.svg') }}" alt="DineNexus Logo" class="w-10 h-10 shadow-lg shadow-orange-500/30 rounded-full group-hover:scale-110 transition-transform">
            <span class="text-xl font-bold tracking-tight text-slate-800">DineNexus<span class="text-[#f48c25]">.</span></span>
         </a>
         <button id="close-sidebar-btn" class="w-8 h-8 rounded-full bg-white shadow-sm border border-slate-100 flex items-center justify-center text-slate-500 hover:bg-rose-50 hover:text-rose-500 hover:border-rose-100 transition-all">
            <span class="material-symbols-outlined text-lg">close</span>
         </button>
      </div>

      <div class="flex-1 overflow-y-auto py-6 px-4 space-y-6">
          @auth
          <div class="bg-orange-50/50 rounded-2xl p-4 border border-orange-100/50">
             <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 rounded-full bg-[#f48c25] text-white flex items-center justify-center text-lg font-bold shadow-md shadow-orange-500/20">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div class="overflow-hidden">
                    <p class="font-bold text-slate-900 truncate">{{ Auth::user()->name }}</p>
                    <p class="text-xs text-slate-500 truncate">{{ Auth::user()->email }}</p>
                </div>
             </div>
             <a href="{{ route('my_orders') }}" class="w-full flex items-center justify-center gap-2 bg-white border border-orange-100 text-slate-700 py-2 rounded-xl text-xs font-bold hover:bg-[#f48c25] hover:text-white hover:border-[#f48c25] transition-all shadow-sm">
                <span class="material-symbols-outlined text-sm">receipt_long</span>
                View Orders
             </a>
          </div>
          @endauth

          <div class="space-y-1">
            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest px-4 mb-2">Menu</p>
            <a href="{{ route('user.home') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-50 text-slate-600 font-bold transition-all group {{ request()->routeIs('user.home*') ? 'bg-orange-50 text-[#f48c25]' : '' }}">
                <span class="w-8 h-8 rounded-lg bg-slate-100 text-slate-500 flex items-center justify-center group-hover:bg-orange-100 group-hover:text-[#f48c25] transition-colors {{ request()->routeIs('user.home*') ? '!bg-orange-100 !text-[#f48c25]' : '' }}">
                    <span class="material-symbols-outlined text-lg">home</span>
                </span>
                Home
            </a>
            <a href="{{ route('shop') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-50 text-slate-600 font-bold transition-all group {{ request()->routeIs('shop*') ? 'bg-orange-50 text-[#f48c25]' : '' }}">
                <span class="w-8 h-8 rounded-lg bg-slate-100 text-slate-500 flex items-center justify-center group-hover:bg-orange-100 group-hover:text-[#f48c25] transition-colors {{ request()->routeIs('shop*') ? '!bg-orange-100 !text-[#f48c25]' : '' }}">
                    <span class="material-symbols-outlined text-lg">restaurant_menu</span>
                </span>
                Menu
            </a>
            <a href="{{ route('about') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-50 text-slate-600 font-bold transition-all group {{ request()->routeIs('about*') ? 'bg-orange-50 text-[#f48c25]' : '' }}">
                <span class="w-8 h-8 rounded-lg bg-slate-100 text-slate-500 flex items-center justify-center group-hover:bg-orange-100 group-hover:text-[#f48c25] transition-colors {{ request()->routeIs('about*') ? '!bg-orange-100 !text-[#f48c25]' : '' }}">
                    <span class="material-symbols-outlined text-lg">auto_stories</span>
                </span>
                Story
            </a>
            <a href="{{ route('contact') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-50 text-slate-600 font-bold transition-all group {{ request()->routeIs('contact*') ? 'bg-orange-50 text-[#f48c25]' : '' }}">
                <span class="w-8 h-8 rounded-lg bg-slate-100 text-slate-500 flex items-center justify-center group-hover:bg-orange-100 group-hover:text-[#f48c25] transition-colors {{ request()->routeIs('contact*') ? '!bg-orange-100 !text-[#f48c25]' : '' }}">
                    <span class="material-symbols-outlined text-lg">support_agent</span>
                </span>
                Contact
            </a>
          </div>

          @auth
          <div class="pt-6 border-t border-slate-100">
             <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-rose-50 text-slate-600 hover:text-rose-600 font-bold transition-all group text-left">
                    <span class="w-8 h-8 rounded-lg bg-slate-100 text-slate-500 flex items-center justify-center group-hover:bg-rose-100 group-hover:text-rose-600 transition-colors">
                        <span class="material-symbols-outlined text-lg">logout</span>
                    </span>
                    Sign Out
                </button>
             </form>
          </div>
          @else
          <div class="pt-6 border-t border-slate-100 space-y-3">
               <a href="{{ route('login') }}" class="flex items-center justify-center w-full py-3 rounded-xl border border-slate-200 font-bold text-slate-700 hover:border-[#f48c25] hover:text-[#f48c25] transition-colors bg-white">
                  Sign In
               </a>
               <a href="{{ route('register') }}" class="flex items-center justify-center w-full py-3 rounded-xl bg-[#f48c25] text-white font-bold shadow-lg shadow-orange-500/30 hover:bg-[#e07b1a] transition-all">
                  Register Now
               </a>
          </div>
          @endauth
      </div>
  </div>

  @yield('content')

  <footer class="bg-[#1c140d] text-white/80 border-t border-white/5 py-12 mt-auto font-body">
    <div class="w-full px-6 lg:px-12">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-y-8 gap-x-12 mb-12">

        <!-- Brand -->
        <div class="lg:col-span-4 space-y-6">
          <div class="flex items-center gap-4">
            <img src="{{ asset('images/logo.svg') }}" alt="DineNexus Logo" class="w-12 h-12 rounded-full shadow-lg shadow-orange-900/30">
            <span class="text-4xl font-black text-white tracking-tight">DineNexus<span class="text-orange-500">.</span></span>
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

        <div class="lg:col-span-2 lg:col-start-6">
          <h4 class="text-white font-bold text-xl mb-6">Explore</h4>
          <ul class="space-y-4 font-medium text-base text-slate-400">
            <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Offers Near Me</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Popular Restaurants</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> New on DineNexus</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Gift Cards</a></li>
          </ul>
        </div>

        <div class="lg:col-span-2">
          <h4 class="text-white font-bold text-xl mb-6">Support</h4>
          <ul class="space-y-4 font-medium text-base text-slate-400">
            <li><a href="{{ route('contact') }}" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Help Center</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Safety Information</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Cancellation Options</a></li>
            <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Refund Policy</a></li>
          </ul>
        </div>

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
          © {{ date('Y') }} DineNexus Inc. All rights reserved.
        </p>
        <div class="flex items-center gap-8 text-base font-medium text-slate-500">
          <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
          <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
          <a href="#" class="hover:text-white transition-colors">Cookies Settings</a>
        </div>
      </div>
    </div>
  </footer>

  <div id="toast-notification" class="fixed bottom-6 right-6 translate-y-24 opacity-0 transition-all duration-300 z-[150] flex items-center gap-3 bg-slate-900 text-white px-6 py-4 rounded-2xl shadow-2xl shadow-black/20 pointer-events-none">
    <div class="w-8 h-8 rounded-full bg-green-500 flex items-center justify-center text-slate-900">
      <span class="material-symbols-outlined text-lg font-bold">check</span>
    </div>
    <div>
      <h4 class="font-bold text-sm">Success</h4>
      <p class="text-xs text-slate-400 font-medium">Item added to your cart.</p>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {

      // Mobile Sidebar Logic
      const mobileBtn = document.getElementById('mobile-menu-btn');
      const sidebar = document.getElementById('mobile-sidebar');
      const backdrop = document.getElementById('sidebar-backdrop');
      const closeBtn = document.getElementById('close-sidebar-btn');

      function toggleSidebar() {
          if (!sidebar || !backdrop) return;
          
          const isClosed = sidebar.classList.contains('-translate-x-full');
          
          if (isClosed) {
              // Open Sidebar
              sidebar.classList.remove('-translate-x-full');
              backdrop.classList.remove('hidden');
              // Small delay to allow display:block to apply before opacity transition
              setTimeout(() => {
                  backdrop.classList.remove('opacity-0');
              }, 10);
              document.body.style.overflow = 'hidden'; // Prevent scrolling
          } else {
              // Close Sidebar
              sidebar.classList.add('-translate-x-full');
              backdrop.classList.add('opacity-0');
              
              // Wait for transition to finish before hiding backdrop
              setTimeout(() => {
                  backdrop.classList.add('hidden');
              }, 300);
              document.body.style.overflow = ''; // Restore scrolling
          }
      }

      if (mobileBtn) mobileBtn.addEventListener('click', toggleSidebar);
      if (closeBtn) closeBtn.addEventListener('click', toggleSidebar);
      if (backdrop) backdrop.addEventListener('click', toggleSidebar);

      const toast = document.getElementById('toast-notification');
      let toastTimeout;

      function showToast(message) {
        if (message) toast.querySelector('p').textContent = message;

        toast.classList.remove('translate-y-24', 'opacity-0');
        clearTimeout(toastTimeout);
        toastTimeout = setTimeout(() => {
          toast.classList.add('translate-y-24', 'opacity-0');
        }, 3000);
      }

      document.body.addEventListener('submit', async function(e) {
        const form = e.target.closest('form[action$="cart-add"]');
        if (!form) return;

        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();

        const btn = form.querySelector('button');
        if (!btn) return;

        const originalContent = btn.innerHTML;
        btn.disabled = true;
        btn.innerHTML = '<span class="material-symbols-outlined animate-spin text-lg">progress_activity</span>';

        try {
          const formData = new FormData(form);
          const response = await fetch(form.action, {
            method: 'POST',
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
              'Accept': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: formData
          });

          if (response.ok) {
            const data = await response.json();
            if (data.success) {
              showToast(data.message);
              updateCartCount(data.cart_count);
            }
          } else {
            if (response.status === 401 || response.status === 419) {
              window.location.href = '{{ route("login") }}';
            }
          }
        } catch (error) {
          console.error('Error:', error);
        } finally {
          if (btn) {
            btn.disabled = false;
            btn.innerHTML = originalContent;
          }
        }
      });

      function updateCartCount(count) {
        const cartLink = document.querySelector('a[href*="cart"]');
        if (!cartLink) return;

        let badge = cartLink.querySelector('.bg-red-500'); 

        if (count > 0) {
          if (!badge) {
            badge = document.createElement('span');
            badge.className = 'absolute -top-1 -right-1 bg-red-500 text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold border-2 border-white';
            cartLink.appendChild(badge);
          }
          badge.textContent = count;
        } else {
          if (badge) badge.remove();
        }
      }
    });

    function confirmation(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');

      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        width: 400,
        padding: '1em',
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = urlToRedirect;
        }
      });
    }
  </script>
</body>