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

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/70 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-[1440px] mx-auto px-6 lg:px-20 w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <!-- Text Content -->
            <div class="text-center lg:text-left space-y-6">
                <span class="inline-block px-4 py-2 rounded-full bg-[#f48c25] text-white text-xs font-bold uppercase tracking-widest shadow-lg shadow-orange-500/30 animate-pulse">
                    Hungry? We got you.
                </span>
                
                <h1 class="text-5xl lg:text-7xl font-black text-white leading-tight drop-shadow-xl">
                    Delicious Food <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f48c25] to-orange-400">Delivered To Your Doorstep</span>
                </h1>
                
                <p class="text-lg text-slate-300 max-w-xl mx-auto lg:mx-0 font-body leading-relaxed">
                    Experience the fastest delivery in town. Fresh, hot, and tasty meals from our top-rated kitchen to your table in minutes. Order anytime, anywhere.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4">
                    <a href="{{ route('shop') }}" class="px-8 py-4 bg-[#f48c25] text-white rounded-2xl font-bold text-sm uppercase tracking-widest hover:bg-white hover:text-[#f48c25] transition-all shadow-lg shadow-orange-500/30 w-full sm:w-auto text-center group">
                        Order Now <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <a href="{{ route('shop') }}" class="px-8 py-4 bg-white/10 backdrop-blur-md border border-white/30 text-white rounded-2xl font-bold text-sm uppercase tracking-widest hover:bg-white hover:text-slate-900 transition-all w-full sm:w-auto text-center">
                        View Menu
                    </a>
                </div>

                <div class="pt-8 flex items-center justify-center lg:justify-start gap-8 opacity-80">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-clock text-[#f48c25] text-xl"></i>
                        <span class="text-white font-bold text-sm">30 Mins Delivery</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-motorcycle text-[#f48c25] text-xl"></i>
                        <span class="text-white font-bold text-sm">Free Shipping</span>
                    </div>
                </div>
            </div>

            <!-- Hero Image/Card (Optional Float) -->
            <div class="hidden lg:block relative">
                 <!-- Floating Elements - Abstract representation of speed/taste -->
            </div>
        </div>
    </section>

    <!-- Featured Categories -->
    <section class="py-24 px-6 lg:px-20 max-w-[1440px] mx-auto">
        <div class="text-center mb-16">
            <span class="text-[#f48c25] font-bold uppercase tracking-widest text-xs mb-3 block">What's on your mind?</span>
            <h2 class="text-4xl lg:text-5xl font-black text-slate-900">Featured <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f48c25] to-red-600">Categories</span></h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            <!-- Pizza -->
            <a href="{{ route('shop') }}" class="group bg-white border border-slate-100 p-6 rounded-[2.5rem] flex flex-col items-center hover:shadow-[0_20px_50px_-10px_rgba(244,140,37,0.2)] hover:border-[#f48c25]/30 transition-all duration-300">
                <div class="w-32 h-32 rounded-full overflow-hidden mb-4 shadow-lg group-hover:scale-110 transition-transform duration-500">
                    <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover">
                </div>
                <h3 class="font-extrabold text-lg text-slate-800 mb-1">Pizza</h3>
                <span class="text-xs font-bold text-[#f48c25] opacity-0 group-hover:opacity-100 transition-opacity translate-y-2 group-hover:translate-y-0">Order Now</span>
            </a>
            
            <!-- Burgers -->
            <a href="{{ route('shop') }}" class="group bg-white border border-slate-100 p-6 rounded-[2.5rem] flex flex-col items-center hover:shadow-[0_20px_50px_-10px_rgba(244,140,37,0.2)] hover:border-[#f48c25]/30 transition-all duration-300">
                <div class="w-32 h-32 rounded-full overflow-hidden mb-4 shadow-lg group-hover:scale-110 transition-transform duration-500">
                    <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover">
                </div>
                <h3 class="font-extrabold text-lg text-slate-800 mb-1">Burgers</h3>
                <span class="text-xs font-bold text-[#f48c25] opacity-0 group-hover:opacity-100 transition-opacity translate-y-2 group-hover:translate-y-0">Order Now</span>
            </a>

            <!-- Chicken -->
            <a href="{{ route('shop') }}" class="group bg-white border border-slate-100 p-6 rounded-[2.5rem] flex flex-col items-center hover:shadow-[0_20px_50px_-10px_rgba(244,140,37,0.2)] hover:border-[#f48c25]/30 transition-all duration-300">
                <div class="w-32 h-32 rounded-full overflow-hidden mb-4 shadow-lg group-hover:scale-110 transition-transform duration-500">
                    <img src="https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover">
                </div>
                <h3 class="font-extrabold text-lg text-slate-800 mb-1">Chicken</h3>
                <span class="text-xs font-bold text-[#f48c25] opacity-0 group-hover:opacity-100 transition-opacity translate-y-2 group-hover:translate-y-0">Order Now</span>
            </a>

             <!-- Desserts -->
             <a href="{{ route('shop') }}" class="group bg-white border border-slate-100 p-6 rounded-[2.5rem] flex flex-col items-center hover:shadow-[0_20px_50px_-10px_rgba(244,140,37,0.2)] hover:border-[#f48c25]/30 transition-all duration-300">
                <div class="w-32 h-32 rounded-full overflow-hidden mb-4 shadow-lg group-hover:scale-110 transition-transform duration-500">
                    <img src="https://images.unsplash.com/photo-1563729768-b692965d7bb6?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover">
                </div>
                <h3 class="font-extrabold text-lg text-slate-800 mb-1">Desserts</h3>
                <span class="text-xs font-bold text-[#f48c25] opacity-0 group-hover:opacity-100 transition-opacity translate-y-2 group-hover:translate-y-0">Order Now</span>
            </a>

             <!-- Drinks -->
             <a href="{{ route('shop') }}" class="group bg-white border border-slate-100 p-6 rounded-[2.5rem] flex flex-col items-center hover:shadow-[0_20px_50px_-10px_rgba(244,140,37,0.2)] hover:border-[#f48c25]/30 transition-all duration-300">
                <div class="w-32 h-32 rounded-full overflow-hidden mb-4 shadow-lg group-hover:scale-110 transition-transform duration-500">
                    <img src="https://images.unsplash.com/photo-1544145945-f90425340c7e?ixlib=rb-4.0.3&auto=format&fit=crop&w=300&q=80" class="w-full h-full object-cover">
                </div>
                <h3 class="font-extrabold text-lg text-slate-800 mb-1">Drinks</h3>
                <span class="text-xs font-bold text-[#f48c25] opacity-0 group-hover:opacity-100 transition-opacity translate-y-2 group-hover:translate-y-0">Order Now</span>
            </a>
        </div>
    </section>

    <!-- Popular Dishes -->
    <section class="py-24 px-6 lg:px-20 max-w-[1440px] mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
            <div class="text-center md:text-left">
                <span class="text-[#f48c25] font-bold uppercase tracking-widest text-xs mb-3 block">Menu Favorites</span>
                <h2 class="text-4xl lg:text-5xl font-black text-slate-900">Popular <span class="text-[#f48c25]">Dishes</span></h2>
            </div>
            <a href="{{ route('shop') }}" class="group flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-[#f48c25] transition-colors">
                View Full Menu
                <span class="material-symbols-outlined text-lg group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featured_foods as $food)
            @php
                $isVeg = \Illuminate\Support\Str::contains(strtolower($food->category), ['salad', 'vegan', 'veg', 'drink', 'beverage', 'dessert', 'coffee', 'tea']);
            @endphp
            <div class="bg-white rounded-[2.5rem] p-4 shadow-sm border border-slate-100 hover:shadow-[0_20px_50px_-10px_rgba(244,140,37,0.15)] hover:border-[#f48c25]/30 hover:-translate-y-2 transition-all duration-300 group flex flex-col h-full relative">
                
                <!-- Image Area -->
                <div class="relative h-60 rounded-[2rem] overflow-hidden mb-5 flex-shrink-0 bg-slate-50">
                    <!-- Badges Container -->
                    <div class="absolute top-4 left-4 z-20 flex flex-col gap-2">
                         <!-- Veg/Non-Veg Badge -->
                        <span class="bg-white/90 backdrop-blur text-[10px] font-black px-3 py-1.5 rounded-full shadow-sm uppercase tracking-wider flex items-center gap-1 w-max border {{ $isVeg ? 'border-green-500 text-green-600' : 'border-red-500 text-red-600' }}">
                            <span class="w-2 h-2 rounded-full {{ $isVeg ? 'bg-green-500' : 'bg-red-500' }}"></span>
                            {{ $isVeg ? 'VEG' : 'NON-VEG' }}
                        </span>
                    </div>
                    
                    <img src="{{ asset($food->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    
                    <!-- Overlay Gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent opacity-60"></div>
                </div>
                
                <!-- Content -->
                <div class="px-4 pb-4 flex flex-col flex-1">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-black text-xl text-slate-900 leading-tight group-hover:text-[#f48c25] transition-colors line-clamp-1">{{ $food->title }}</h3>
                        <span class="text-xs font-bold bg-slate-100 text-slate-500 px-2 py-1 rounded-lg uppercase tracking-wider">{{ $food->category }}</span>
                    </div>
                    
                    <p class="text-slate-400 text-sm font-body mb-6 line-clamp-2 flex-1">{{ $food->detail }}</p>
                    
                    <div class="flex items-center justify-between mt-auto">
                        <div class="flex flex-col">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Price</span>
                            <span class="text-2xl font-black text-slate-900">${{ $food->price }}</span>
                        </div>
                        
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $food->id }}">
                            <input type="hidden" name="name" value="{{ $food->title }}">
                            <input type="hidden" name="price" value="{{ $food->price }}">
                            <button type="submit" class="bg-slate-900 text-white w-14 h-14 rounded-2xl flex items-center justify-center shadow-lg hover:bg-[#f48c25] hover:scale-110 hover:shadow-orange-500/30 transition-all duration-300 group/btn">
                                <span class="material-symbols-outlined group-hover/btn:animate-bounce">add_shopping_cart</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-12 text-center lg:hidden">
            <a href="{{ route('shop') }}" class="inline-flex items-center gap-2 bg-slate-100 text-slate-900 px-8 py-4 rounded-2xl font-bold uppercase tracking-widest hover:bg-[#f48c25] hover:text-white transition-colors">
                View Full Menu
                <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-24 bg-[#fff8f2] relative w-full overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-orange-100/60 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-yellow-100/40 rounded-full blur-[80px] translate-y-1/3 -translate-x-1/4 pointer-events-none"></div>

        <div class="max-w-[1440px] mx-auto px-6 lg:px-20 relative z-10 w-full">
             <div class="text-center mb-16">
                <span class="text-[#f48c25] font-bold uppercase tracking-widest text-xs mb-3 block">Why Choose Us</span>
                <h2 class="text-4xl lg:text-5xl font-black text-slate-900">We Serve <span class="text-[#f48c25]">Passion</span></h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-orange-500/5 hover:-translate-y-2 transition-all duration-300 group border border-orange-100/50">
                    <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center text-[#f48c25] shadow-sm mb-6 group-hover:bg-[#f48c25] group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined text-3xl">eco</span>
                    </div>
                    <h3 class="font-black text-xl mb-3 text-slate-900">Fresh Ingredients</h3>
                    <p class="text-slate-500 font-body text-sm leading-relaxed">We use only the freshest, locally sourced organic ingredients.</p>
                </div>
                
                 <!-- Feature 2 -->
                 <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-orange-500/5 hover:-translate-y-2 transition-all duration-300 group border border-orange-100/50">
                    <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center text-[#f48c25] shadow-sm mb-6 group-hover:bg-[#f48c25] group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined text-3xl">rocket_launch</span>
                    </div>
                    <h3 class="font-black text-xl mb-3 text-slate-900">Fast Delivery</h3>
                    <p class="text-slate-500 font-body text-sm leading-relaxed">Hot and fresh food delivered to your door in record time.</p>
                </div>

                 <!-- Feature 3 -->
                 <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-orange-500/5 hover:-translate-y-2 transition-all duration-300 group border border-orange-100/50">
                    <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center text-[#f48c25] shadow-sm mb-6 group-hover:bg-[#f48c25] group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined text-3xl">soup_kitchen</span>
                    </div>
                    <h3 class="font-black text-xl mb-3 text-slate-900">Hygienic Cooking</h3>
                    <p class="text-slate-500 font-body text-sm leading-relaxed">Our kitchens adhere to strict safety and hygiene standards.</p>
                </div>
                
                 <!-- Feature 4 -->
                 <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-orange-500/5 hover:-translate-y-2 transition-all duration-300 group border border-orange-100/50">
                    <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center text-[#f48c25] shadow-sm mb-6 group-hover:bg-[#f48c25] group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined text-3xl">savings</span>
                    </div>
                    <h3 class="font-black text-xl mb-3 text-slate-900">Affordable Prices</h3>
                    <p class="text-slate-500 font-body text-sm leading-relaxed">Gourmet quality food at prices that won't break the bank.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-24 px-6 lg:px-20 max-w-[1440px] mx-auto">
         <div class="bg-[#f48c25] rounded-[3rem] p-12 lg:p-20 text-center relative overflow-hidden">
             <div class="absolute inset-0 opacity-10" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
             
             <div class="relative z-10">
                 <span class="text-white/80 font-bold uppercase tracking-widest text-xs mb-3 block">Easy Steps</span>
                 <h2 class="text-4xl lg:text-5xl font-black text-white mb-16">How It Works</h2>
                 
                 <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
                     <!-- Step 1 -->
                     <div class="relative z-10 group">
                         <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-xl group-hover:scale-110 transition-transform">
                             <span class="material-symbols-outlined text-4xl text-[#f48c25]">restaurant_menu</span>
                         </div>
                         <h3 class="font-black text-2xl text-white mb-2">1. Browse Menu</h3>
                         <p class="text-white/80 font-body text-sm">Explore our diverse menu and choose your favorite dishes.</p>
                     </div>
                     
                     <!-- Step 2 -->
                     <div class="relative z-10 group">
                         <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-xl group-hover:scale-110 transition-transform">
                             <span class="material-symbols-outlined text-4xl text-[#f48c25]">shopping_cart</span>
                         </div>
                         <h3 class="font-black text-2xl text-white mb-2">2. Add to Cart</h3>
                         <p class="text-white/80 font-body text-sm">Customize your order and proceed to secure checkout.</p>
                     </div>
                     
                     <!-- Step 3 -->
                     <div class="relative z-10 group">
                         <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-xl group-hover:scale-110 transition-transform">
                             <span class="material-symbols-outlined text-4xl text-[#f48c25]">local_shipping</span>
                         </div>
                         <h3 class="font-black text-2xl text-white mb-2">3. Fast Delivery</h3>
                         <p class="text-white/80 font-body text-sm">Sit back and relax while we deliver food to your doorstep.</p>
                     </div>
                     
                     <!-- Connecting Line (Desktop) -->
                     <div class="absolute top-12 left-0 w-full h-0.5 border-t-2 border-dashed border-white/30 hidden md:block -z-0 transform translate-y-1"></div>
                 </div>
             </div>
         </div>
    </section>

    <!-- Testimonials -->
    <section class="py-24 px-6 lg:px-20 max-w-[1440px] mx-auto bg-slate-50">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-black text-slate-900">Customer <span class="text-[#f48c25]">Love</span></h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Review 1 -->
            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100">
                <div class="flex text-yellow-400 mb-6">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-slate-600 font-body italic mb-8">"Absolutely delicious! The delivery was super fast and the packaging kept everything fresh. Highly recommend the burgers!"</p>
                <div class="flex items-center gap-4">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-12 h-12 rounded-full">
                    <div>
                        <h4 class="font-bold text-slate-900">Emily Johnson</h4>
                        <p class="text-xs text-slate-500 font-bold uppercase">Happy Customer</p>
                    </div>
                </div>
            </div>

            <!-- Review 2 -->
            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100">
                <div class="flex text-yellow-400 mb-6">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-slate-600 font-body italic mb-8">"Foodie is a lifesaver for busy weeknights. Great variety, amazing taste, and excellent service. Love the new app!"</p>
                <div class="flex items-center gap-4">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-12 h-12 rounded-full">
                    <div>
                        <h4 class="font-bold text-slate-900">Michael Smith</h4>
                        <p class="text-xs text-slate-500 font-bold uppercase">Food Blogger</p>
                    </div>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100">
                <div class="flex text-yellow-400 mb-6">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <p class="text-slate-600 font-body italic mb-8">"The healthiest options in town. I love their salads and smoothies. The ingredients always taste fresh and organic."</p>
                <div class="flex items-center gap-4">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg" class="w-12 h-12 rounded-full">
                    <div>
                        <h4 class="font-bold text-slate-900">Sarah Davis</h4>
                        <p class="text-xs text-slate-500 font-bold uppercase">Nutritionist</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- App Download -->
    <section class="py-24 bg-slate-900 relative overflow-hidden">
        <!-- Floating shapes -->
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-[#f48c25] rounded-full blur-[120px] opacity-20 -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-blue-500 rounded-full blur-[120px] opacity-10 translate-x-1/2 translate-y-1/2 pointer-events-none"></div>

        <div class="max-w-[1440px] mx-auto px-6 lg:px-20 relative z-10 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-16">
                
                <!-- Left: Content -->
                <div class="text-left">
                    <span class="text-[#f48c25] font-bold uppercase tracking-widest text-xs mb-3 block">Download App</span>
                    <h2 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight">Get The Full <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f48c25] to-orange-400">Foodie Experience</span></h2>
                    <p class="text-slate-400 text-lg mb-10 max-w-lg font-body leading-relaxed">Order faster, track your food in real-time, and get exclusive discounts only on the Foodie mobile app. Available for iOS and Android.</p>
                    
                    <div class="flex flex-wrap gap-4">
                        <button class="bg-white text-slate-900 px-6 py-3.5 rounded-xl flex items-center gap-3 hover:bg-[#f48c25] hover:text-white transition-all shadow-lg hover:shadow-orange-500/30 group">
                            <i class="fa-brands fa-apple text-3xl group-hover:scale-110 transition-transform"></i>
                            <div class="text-left">
                                <p class="text-[10px] uppercase font-bold opacity-70">Download on the</p>
                                <p class="text-sm font-black">App Store</p>
                            </div>
                        </button>
                        <button class="bg-transparent border border-slate-700 text-white px-6 py-3.5 rounded-xl flex items-center gap-3 hover:bg-white hover:text-slate-900 hover:border-white transition-all shadow-lg group">
                            <i class="fa-brands fa-google-play text-2xl group-hover:scale-110 transition-transform"></i>
                            <div class="text-left">
                                <p class="text-[10px] uppercase font-bold opacity-70">Get it on</p>
                                <p class="text-sm font-black">Google Play</p>
                            </div>
                        </button>
                    </div>
                    
                    <div class="mt-12 flex items-center gap-6">
                        <div class="flex -space-x-4">
                            <img class="w-10 h-10 rounded-full border-2 border-slate-900" src="https://randomuser.me/api/portraits/women/65.jpg" alt="">
                            <img class="w-10 h-10 rounded-full border-2 border-slate-900" src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
                            <img class="w-10 h-10 rounded-full border-2 border-slate-900" src="https://randomuser.me/api/portraits/women/23.jpg" alt="">
                            <div class="w-10 h-10 rounded-full border-2 border-slate-900 bg-slate-800 text-white flex items-center justify-center text-xs font-bold">+2k</div>
                        </div>
                        <div class="text-white">
                            <p class="font-bold text-sm">Downloaders</p>
                            <div class="flex text-[#f48c25] text-xs">
                                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right: Mobile Image -->
                <div class="relative lg:h-[600px] flex items-center justify-center">
                     <!-- Phone Frame Mockup -->
                     <div class="relative z-10 w-[300px] h-[600px] bg-slate-900 rounded-[3rem] border-8 border-slate-800 shadow-2xl shadow-black/50 overflow-hidden transform rotate-6 hover:rotate-0 transition-transform duration-700 ease-out">
                         <!-- Screen Content -->
                         <img src="https://images.unsplash.com/photo-1542315184-7e5d0d626388?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover opacity-80">
                         
                         <!-- Mock UI Elements -->
                         <div class="absolute bottom-0 w-full h-1/2 bg-gradient-to-t from-black/90 to-transparent p-6 flex flex-col justify-end">
                             <div class="bg-white/10 backdrop-blur-md p-4 rounded-xl border border-white/10 mb-4">
                                 <div class="flex justify-between items-center mb-2">
                                     <span class="text-white font-bold text-sm">Your Order</span>
                                     <span class="text-[#f48c25] font-bold text-xs">On the way</span>
                                 </div>
                                 <div class="w-full bg-slate-700 h-1.5 rounded-full overflow-hidden">
                                     <div class="bg-[#f48c25] h-full w-3/4 animate-pulse"></div>
                                 </div>
                             </div>
                             <h4 class="text-white font-black text-xl">Order #2938</h4>
                             <p class="text-slate-400 text-xs">Arriving in 12 mins...</p>
                         </div>
                     </div>
                     
                     <!-- Back Phone Effect -->
                     <div class="absolute z-0 w-[280px] h-[580px] bg-slate-800 rounded-[3rem] transform -rotate-6 translate-y-4 opacity-50 blur-sm"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-24 px-6 lg:px-20 max-w-4xl mx-auto text-center">
        <div class="bg-white p-12 rounded-[3rem] shadow-xl shadow-orange-500/10 border border-slate-100 relative overflow-hidden">
             <div class="absolute top-0 right-0 w-32 h-32 bg-orange-100 rounded-full blur-3xl opacity-50 -translate-y-1/2 translate-x-1/2"></div>
             <div class="absolute bottom-0 left-0 w-32 h-32 bg-blue-100 rounded-full blur-3xl opacity-50 translate-y-1/2 -translate-x-1/2"></div>
             
             <div class="relative z-10">
                <h2 class="text-3xl font-black text-slate-900 mb-4">Subscribe to our Newsletter</h2>
                <p class="text-slate-500 font-body mb-8">Don't miss out on our latest delicious offers and updates.</p>
                
                <form class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    <input type="email" placeholder="Enter your email" class="flex-1 bg-slate-50 border border-slate-200 rounded-2xl px-6 py-4 outline-none focus:border-[#f48c25] transition-colors font-bold text-slate-800">
                    <button class="bg-slate-900 text-white px-8 py-4 rounded-2xl font-bold uppercase tracking-widest hover:bg-[#f48c25] transition-colors">Subscribe</button>
                </form>
             </div>
        </div>
    </section>

    @include('partials.footer')

</body>
</html>
