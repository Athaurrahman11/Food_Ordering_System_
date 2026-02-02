@extends('home.layouts.app')

@section('content')

    <section class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/home_bgavif.avif') }}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/70 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-[1440px] mx-auto px-6 lg:px-20 w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
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

            <div class="hidden lg:block relative">
            </div>
        </div>
    </section>

    <section class="py-24 px-6 lg:px-10 max-w-[1800px] mx-auto">
        <div class="text-center mb-16">
            <span class="text-[#f48c25] font-bold uppercase tracking-widest text-xs mb-3 block">What's on your mind?</span>
            <h2 class="text-4xl lg:text-5xl font-black text-slate-900">Featured <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f48c25] to-red-600">Categories</span></h2>
            <div class="w-80 h-1.5 bg-[#f48c25] rounded-full mt-4 mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 ">
           
            @foreach ($featured_foods as $featured_food)
                 <a href="{{ route('shop', ['category' => $featured_food->category]) }}" class="group relative h-[300px] md:w-[450px] lg:w-[550px] w-full rounded-[2.5rem] overflow-hidden shadow-xl hover:shadow-2xl hover:shadow-orange-500/20 transition-all duration-500 hover:-translate-y-2 isolate">
                    
                    <!-- Background Image -->
                    <img src="{{ asset('Menu_items/'.$featured_food->image) }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    
                    <!-- Dark Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent opacity-90 transition-opacity"></div>
                    
                    <!-- Content -->
                    <div class="absolute bottom-0 left-0 w-full p-6 flex flex-col justify-end">
                        <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">
                            <!-- Category Badge -->
                            <span class="inline-block bg-[#f48c25] text-white text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full mb-3 shadow-lg shadow-orange-500/30">
                                Featured
                            </span>
                            
                            <h3 class="font-black text-4xl text-white mb-3 leading-none tracking-tight">{{ $featured_food->category }}</h3>
                            
                            <!-- Description (Reveals on Hover) -->
                            <p class="text-slate-300 font-body text-sm leading-relaxed line-clamp-2 mb-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                                {{ $featured_food->description }}
                            </p>
                            
                            <!-- Action Button -->
                            <div class="flex items-center gap-3 group/btn">
                                <span class="w-12 h-12 rounded-full bg-white/10 backdrop-blur-md border border-white/20 flex items-center justify-center text-white group-hover/btn:bg-[#f48c25] group-hover/btn:border-[#f48c25] transition-all duration-300">
                                    <span class="material-symbols-outlined">arrow_forward</span>
                                </span>
                                <span class="text-white font-bold text-sm uppercase tracking-wider group-hover:text-[#f48c25] transition-colors">Explore Menu</span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
            
        </div>
    </section>
    
    <section class="py-24 px-6 lg:px-20 max-w-[1440px] mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
            <div class="text-center md:text-left">
                <span class="text-[#f48c25] font-bold uppercase tracking-widest text-xs mb-3 block">Food Items</span>
                <h2 class="text-4xl lg:text-5xl font-black text-slate-900">Popular <span class="text-[#f48c25]">Dishes</span></h2>
                <div class="w-80 h-1.5 bg-[#f48c25] rounded-full mt-4 mx-auto md:mx-0"></div>
            </div>
            <a href="{{ route('shop') }}" class="group flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-[#f48c25] transition-colors">
                View Full Food Items
                <span class="material-symbols-outlined text-lg group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($food_items as $food)
          
            <div class="group bg-[#2b2118] rounded-[2rem] overflow-hidden shadow-lg hover:shadow-2xl hover:shadow-[#f48c25]/20 hover:-translate-y-2 transition-all duration-500 flex flex-col relative h-full border border-white/5">
                
                <!-- Image Area -->
                <div class="relative h-60 bg-slate-800 isolate transform-gpu">
                    <!-- Badges Container -->
                    <div class="absolute top-4 left-4 z-20 flex flex-col gap-2">
                         <!-- Category Badge -->
                        <span class="bg-white/90 backdrop-blur text-[10px] font-black px-3 py-1.5 rounded-full shadow-sm uppercase tracking-wider flex items-center gap-1 w-max border border-orange-500 text-orange-600">
                            <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                            {{ $food->category }}
                        </span>
                    </div>
                    
                    <img src="{{ asset('Food_Items/'.$food->image) }}" class="w-full h-full object-cover   ">
                    
                    <!-- Dark Gradient -->
                    <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-[#2b2118] to-transparent"></div>
                </div>
                
                <!-- Content -->
                <div class="px-6 pb-6 pt-2 flex flex-col flex-1">
                    <div class="flex justify-between items-start mb-6">
                        <h3 class="font-bold text-xl text-white leading-tight group-hover:text-[#f48c25] transition-colors line-clamp-2" title="{{ $food->name }}">{{ $food->name }}</h3>
                        <span class="text-[#f48c25] font-black text-xl">${{ $food->price }}</span>
                    </div>
                    
                    <div class="mt-auto">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $food->id }}">
                            <input type="hidden" name="name" value="{{ $food->name }}">
                            <input type="hidden" name="price" value="{{ $food->price }}">
                            
                            <button type="submit" class="w-full bg-[#f48c25] text-white py-3.5 rounded-xl font-bold text-sm uppercase tracking-widest hover:bg-[#e07b1a] transition-all shadow-lg shadow-[#f48c25]/25 flex items-center justify-center gap-2 active:scale-95">
                                <span>ADD TO CART</span>
                                <span class="material-symbols-outlined text-[18px]">shopping_cart</span>
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
                <div class="w-80 h-1.5 bg-[#f48c25] rounded-full mt-4 mx-auto"></div>
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



    <!-- Testimonials -->
    <section class="py-24 px-6 lg:px-20 max-w-[1440px] mx-auto bg-slate-50">
        <div class="text-center mb-16">
            <h2 class="text-4xl lg:text-5xl font-black text-slate-900">Customer <span class="text-[#f48c25]">Love</span></h2>
             <div class="w-60 h-1.5 bg-[#f48c25] rounded-full mt-4 mx-auto"></div>
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
                <p class="text-slate-600 font-body italic mb-8">"DineNexus is a lifesaver for busy weeknights. Great variety, amazing taste, and excellent service. Love the new app!"</p>
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
    <section class="py-12 bg-slate-900 relative overflow-hidden">
        <!-- Floating shapes -->
        <div class="absolute top-0 left-0 w-[500px] h-[500px] bg-[#f48c25] rounded-full blur-[120px] opacity-20 -translate-x-1/2 -translate-y-1/2 pointer-events-none"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-blue-500 rounded-full blur-[120px] opacity-10 translate-x-1/2 translate-y-1/2 pointer-events-none"></div>

        <div class="max-w-[1440px] mx-auto px-6 lg:px-20 relative z-10 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-16">
                
                <!-- Left: Content -->
                <div class="text-left">
                    <span class="text-[#f48c25] font-bold uppercase tracking-widest text-xs mb-3 block">Download App</span>
                    <h2 class="text-4xl lg:text-6xl font-black text-white mb-6 leading-tight">Get The Full <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f48c25] to-orange-400">DineNexus Experience</span></h2>
                    <p class="text-slate-400 text-lg mb-10 max-w-lg font-body leading-relaxed">Order faster, track your food in real-time, and get exclusive discounts only on the DineNexus mobile app. Available for iOS and Android.</p>
                    
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
                <div class="relative lg:h-[450px] flex items-center justify-center">
                     <!-- Phone Frame Mockup -->
                     <div class="relative z-10 w-[225px] h-[450px] bg-slate-900 rounded-[2.5rem] border-8 border-slate-800 shadow-2xl shadow-black/50 overflow-hidden transform rotate-6 hover:rotate-0 transition-transform duration-700 ease-out">
                         <!-- Screen Content -->
                         <img src="https://images.unsplash.com/photo-1542315184-7e5d0d626388?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover opacity-80">
                         
                         <!-- Mock UI Elements -->
                         <div class="absolute bottom-0 w-full h-1/2 bg-gradient-to-t from-black/90 to-transparent p-4 flex flex-col justify-end">
                             <div class="bg-white/10 backdrop-blur-md p-3 rounded-xl border border-white/10 mb-3">
                                 <div class="flex justify-between items-center mb-2">
                                     <span class="text-white font-bold text-xs">Your Order</span>
                                     <span class="text-[#f48c25] font-bold text-[10px]">On the way</span>
                                 </div>
                                 <div class="w-full bg-slate-700 h-1 rounded-full overflow-hidden">
                                     <div class="bg-[#f48c25] h-full w-3/4 animate-pulse"></div>
                                 </div>
                             </div>
                             <h4 class="text-white font-black text-lg">Order #2938</h4>
                             <p class="text-slate-400 text-[10px]">Arriving in 12 mins...</p>
                         </div>
                     </div>
                     
                     <!-- Back Phone Effect -->
                     <div class="absolute z-0 w-[210px] h-[435px] bg-slate-800 rounded-[2.5rem] transform -rotate-6 translate-y-4 opacity-50 blur-sm"></div>
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
    
  
@endsection