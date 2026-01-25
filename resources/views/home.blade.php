@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <div class="relative w-full h-[450px] rounded-[2.5rem] overflow-hidden mb-12 shadow-2xl">
        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=1200&q=80"
             class="absolute inset-0 w-full h-full object-cover brightness-[0.4]" alt="FoodieDash Hero">

        <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-6">
            <span class="bg-brand-orange text-white text-[10px] font-bold px-3 py-1 rounded-full mb-4 uppercase tracking-[0.2em]">
                New in Town
            </span>

            <h1 class="text-white text-4xl md:text-6xl font-extrabold mb-4 leading-tight">
                The best of your city, <br>
                <span class="brand-orange underline decoration-white/20 underline-offset-8">delivered.</span>
            </h1>

            <p class="text-gray-300 text-base md:text-lg max-w-xl mb-10 font-light">
                Experience culinary excellence from local icons to underground gems, right at your doorstep.
            </p>

            <div class="bg-black/20 backdrop-blur-md p-2 rounded-2xl flex flex-col md:flex-row items-center w-full max-w-2xl border border-white/10">
                <div class="flex-1 flex items-center bg-white rounded-xl px-4 py-3 w-full">
                    <i class="fas fa-map-marker-alt brand-orange mr-3"></i>
                    <input type="text" placeholder="What are you craving?" class="w-full outline-none text-gray-700 bg-transparent">
                </div>
                <button class="bg-brand-orange text-white px-8 py-3 rounded-xl font-bold mt-2 md:mt-0 md:ml-2 w-full md:w-auto hover:bg-orange-600 transition shadow-lg">
                    Find Food
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 mt-8">
    <div class="flex flex-wrap justify-center items-center gap-3 md:gap-4 overflow-x-auto pb-4 scrollbar-hide">
        <button class="flex items-center gap-2 bg-brand-orange text-white px-5 py-2.5 rounded-full shadow-md whitespace-nowrap text-sm font-medium">
            <i class="fas fa-utensils"></i> All Cuisines
        </button>

        @php
            $cuisines = [
                ['name' => 'Neapolitan Pizza', 'icon' => 'fa-pizza-slice'],
                ['name' => 'Premium Sushi', 'icon' => 'fa-fish'],
                ['name' => 'Craft Burgers', 'icon' => 'fa-hamburger'],
                ['name' => 'Vegan Bowls', 'icon' => 'fa-leaf'],
                ['name' => 'Artisan Pasta', 'icon' => 'fa-stroopwafel']
            ];
        @endphp

        @foreach($cuisines as $c)
            <button class="flex items-center gap-2 bg-white border border-gray-100 text-gray-600 px-5 py-2.5 rounded-full hover:bg-gray-50 hover:border-orange-200 transition-all whitespace-nowrap text-sm font-medium shadow-sm">
                <i class="fas {{ $c['icon'] }} text-gray-400"></i> {{ $c['name'] }}
            </button>
        @endforeach
    </div>
</div>

<div class="py-20 bg-[#FFF8F6] rounded-[3rem] mt-16 mx-4">
    <div class="text-center mb-16">
        <h2 class="text-3xl font-extrabold mb-2">How it Works</h2>
        <p class="text-gray-500">Getting your favorite food is easier than ever.</p>
    </div>

    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-12 px-8">
        <div class="bg-white p-10 rounded-[2.5rem] shadow-sm text-center">
            <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center mx-auto mb-6 text-orange-500 text-xl">
                <i class="fas fa-mouse-pointer"></i>
            </div>
            <h3 class="font-bold text-xl mb-3">Pick your plate</h3>
            <p class="text-gray-500 text-sm leading-relaxed">Browse thousands of menus from top-rated restaurants.</p>
        </div>
        <div class="bg-white p-10 rounded-[2.5rem] shadow-sm text-center">
            <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center mx-auto mb-6 text-orange-500 text-xl">
                <i class="fas fa-credit-card"></i>
            </div>
            <h3 class="font-bold text-xl mb-3">Secure checkout</h3>
            <p class="text-gray-500 text-sm leading-relaxed">Pay safely with Apple Pay or credit cards.</p>
        </div>
        <div class="bg-white p-10 rounded-[2.5rem] shadow-sm text-center">
            <div class="w-16 h-16 bg-orange-50 rounded-2xl flex items-center justify-center mx-auto mb-6 text-orange-500 text-xl">
                <i class="fas fa-hotdog"></i>
            </div>
            <h3 class="font-bold text-xl mb-3">Savor the moment</h3>
            <p class="text-gray-500 text-sm leading-relaxed">Relax as your hot meal travels to your door.</p>
        </div>
    </div>
</div>

<div class="py-20 container mx-auto px-4">
    <div class="flex justify-between items-end mb-10">
        <div>
            <h2 class="text-4xl font-extrabold mb-2">Trending Near You</h2>
            <p class="text-gray-500 text-lg">Top picks from food critics and locals alike.</p>
        </div>
        <a href="#" class="brand-orange font-bold flex items-center gap-2 hover:underline text-lg">
            View all restaurants <i class="fas fa-arrow-right text-sm"></i>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <div class="group cursor-pointer">
            <div class="relative overflow-hidden rounded-[2.5rem] mb-5 shadow-lg">
                <img src="https://images.unsplash.com/photo-1579871494447-9811cf80d66c?auto=format&fit=crop&w=800&q=80" class="w-full h-72 object-cover transition duration-500 group-hover:scale-110">
                <div class="absolute top-5 right-5 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1 shadow-sm">
                    <i class="fas fa-star text-yellow-400"></i> 4.9
                </div>
            </div>
            <div class="flex justify-between items-start px-2">
                <div>
                    <h3 class="text-2xl font-bold mb-1 group-hover:brand-orange transition">Mizu Premium Sushi</h3>
                    <p class="text-gray-500 text-sm mb-4 italic">Japanese • Seafood • Fine Dining</p>
                    <div class="flex items-center gap-4 text-gray-400 text-xs font-semibold">
                        <span><i class="far fa-clock mr-1"></i> 20-30 min</span>
                        <span><i class="fas fa-money-bill-wave mr-1"></i> $$$</span>
                    </div>
                </div>
                <span class="bg-orange-100 text-orange-600 text-[10px] font-bold px-3 py-1 rounded-full uppercase">Free Delivery</span>
            </div>
        </div>

        <div class="group cursor-pointer">
            <div class="relative overflow-hidden rounded-[2.5rem] mb-5 shadow-lg">
                <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&w=800&q=80" class="w-full h-72 object-cover transition duration-500 group-hover:scale-110">
                <div class="absolute top-5 right-5 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1 shadow-sm">
                    <i class="fas fa-star text-yellow-400"></i> 4.7
                </div>
            </div>
            <div class="flex justify-between items-start px-2">
                <div>
                    <h3 class="text-2xl font-bold mb-1 group-hover:brand-orange transition">The Burger Lab</h3>
                    <p class="text-gray-500 text-sm mb-4 italic">American • Burgers • Grill</p>
                    <div class="flex items-center gap-4 text-gray-400 text-xs font-semibold">
                        <span><i class="far fa-clock mr-1"></i> 15 min</span>
                        <button class="brand-orange font-bold ml-2 hover:underline">Order Now</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="group cursor-pointer">
            <div class="relative overflow-hidden rounded-[2.5rem] mb-5 shadow-lg">
                <img src="https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=800&q=80" class="w-full h-72 object-cover transition duration-500 group-hover:scale-110">
                <div class="absolute top-5 right-5 bg-white/90 backdrop-blur-md px-3 py-1 rounded-full text-xs font-bold flex items-center gap-1 shadow-sm">
                    <i class="fas fa-star text-yellow-400"></i> 4.8
                </div>
            </div>
            <div class="flex justify-between items-start px-2">
                <div>
                    <h3 class="text-2xl font-bold mb-1 group-hover:brand-orange transition">Pizzeria Napoli</h3>
                    <p class="text-gray-500 text-sm mb-4 italic">Italian • Pizza • Organic</p>
                    <div class="flex items-center gap-4 text-gray-400 text-xs font-semibold">
                        <span><i class="far fa-clock mr-1"></i> 25 min</span>
                        <button class="brand-orange font-bold ml-2 hover:underline">Order Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
