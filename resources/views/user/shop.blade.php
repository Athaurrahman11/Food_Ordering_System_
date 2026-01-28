<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Shop Our Menu - FoodieSystem</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #f48c25; border-radius: 10px; }
    </style>
</head>
<body class="bg-[#fcfaf8] text-[#1c140d]">

    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-[#f4ede7] px-6 py-4 lg:px-20 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <div class="bg-[#f48c25] p-2 rounded-xl text-white">
                <span class="material-symbols-outlined">restaurant</span>
            </div>
            <span class="text-xl font-bold">FoodieSystem</span>
        </div>
        <nav class="hidden md:flex gap-8 text-sm font-semibold">
            <a href="{{ route('home') }}" class="hover:text-[#f48c25]">Home</a>
            <a href="{{ route('shop') }}" class="text-[#f48c25]">Shop</a>
            <a href="{{ route('about') }}" class="hover:text-[#f48c25]">About</a>
            <a href="{{ route('contact')}}" class="hover:text-[#f48c25]"> Contact </a>
            <a href="{{ route('tracking') }}" class="hover:text-[#f48c25]">Tracking</a>
        </nav>
        <div class="flex items-center gap-4">
            <div class="relative bg-slate-100 p-2 rounded-full cursor-pointer">
                <span class="material-symbols-outlined text-slate-600">shopping_cart</span>
                <span class="absolute -top-1 -right-1 bg-[#f48c25] text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold">
                    {{ session('cart') ? count(session('cart')) : '0' }}
                </span>
            </div>
            <div class="w-10 h-10 rounded-full bg-slate-200 border-2 border-white shadow-sm overflow-hidden">
                <img src="https://ui-avatars.com/api/?name=User&background=f48c25&color=fff" alt="Profile">
            </div>
        </div>
    </header>

    <main class="max-w-[1440px] mx-auto px-6 py-10 lg:px-20 flex flex-col lg:flex-row gap-12">

        <aside class="w-full lg:w-72 space-y-10">
            <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-100">
                <h3 class="font-extrabold text-lg mb-6 tracking-tight">Categories</h3>
                <div class="space-y-3">
                    <button class="w-full flex items-center justify-between p-4 rounded-2xl bg-[#f48c25]/10 text-[#f48c25] font-bold transition-all">
                        <span class="flex items-center gap-3"><span class="material-symbols-outlined text-xl">restaurant_menu</span> All Items</span>
                    </button>
                    <button class="w-full flex items-center p-4 rounded-2xl hover:bg-slate-50 text-slate-500 font-semibold transition-all">
                        <span class="flex items-center gap-3"><span class="material-symbols-outlined text-xl">lunch_dining</span> Burgers</span>
                    </button>
                    <button class="w-full flex items-center p-4 rounded-2xl hover:bg-slate-50 text-slate-500 font-semibold transition-all">
                        <span class="flex items-center gap-3"><span class="material-symbols-outlined text-xl">local_pizza</span> Pizza</span>
                    </button>
                    <button class="w-full flex items-center p-4 rounded-2xl hover:bg-slate-50 text-slate-500 font-semibold transition-all">
                        <span class="flex items-center gap-3"><span class="material-symbols-outlined text-xl">nutrition</span> Salads</span>
                    </button>
                </div>
            </div>

            <div class="bg-[#f4ede7]/40 p-8 rounded-[2rem] border border-dashed border-[#f48c25]/20">
                <h3 class="font-extrabold text-sm mb-4 uppercase tracking-widest text-slate-400">Dietary Filters</h3>
                <div class="flex flex-wrap gap-2">
                    <button class="px-4 py-2 bg-white rounded-xl text-xs font-bold border border-slate-100 hover:border-[#f48c25] transition-colors">Vegetarian</button>
                    <button class="px-4 py-2 bg-white rounded-xl text-xs font-bold border border-slate-100 hover:border-[#f48c25] transition-colors">Spicy</button>
                    <button class="px-4 py-2 bg-white rounded-xl text-xs font-bold border border-slate-100 hover:border-[#f48c25] transition-colors">Gluten-Free</button>
                </div>
            </div>
        </aside>

        <section class="flex-1">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10 gap-4">
                <div>
                    <h2 class="text-4xl font-black mb-2">Shop Our Menu</h2>
                    <p class="text-slate-500">Fresh ingredients delivered to your door within 30 minutes.</p>
                </div>
                <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-xl border border-slate-100 shadow-sm">
                    <span class="text-xs font-bold text-slate-400">Sort by:</span>
                    <select class="text-xs font-black outline-none bg-transparent">
                        <option>Popularity</option>
                        <option>Price: Low to High</option>
                        <option>Rating</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">

                <div class="bg-white p-5 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl transition-all group">
                    <div class="relative h-56 rounded-[2rem] overflow-hidden mb-6">
                        <span class="absolute top-4 left-4 z-10 bg-[#f48c25] text-white text-[10px] font-black px-3 py-1 rounded-lg">BEST SELLER</span>
                        <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=600" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="flex justify-between items-start mb-2">
                        <h4 class="font-bold text-lg leading-tight">Classic Wagyu Burger</h4>
                        <span class="text-[#f48c25] font-black">$14.50</span>
                    </div>
                    <p class="text-xs text-slate-400 mb-6 leading-relaxed">Premium wagyu beef patty, aged cheddar, caramelized onions, and organic greens.</p>
                    <div class="flex justify-between items-center pt-2">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[#f48c25] text-sm">star</span>
                            <span class="text-xs font-black">4.9 <span class="text-slate-300 font-normal">(120+)</span></span>
                        </div>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="name" value="Classic Wagyu Burger">
                            <input type="hidden" name="price" value="14.50">
                            <button type="submit" class="bg-[#f48c25] text-white px-6 py-3 rounded-2xl font-bold text-xs flex items-center gap-2 hover:brightness-110 shadow-lg shadow-[#f48c25]/20">
                                <span class="material-symbols-outlined text-sm">add</span> Add
                            </button>
                        </form>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl transition-all group">
                    <div class="relative h-56 rounded-[2rem] overflow-hidden mb-6">
                        <span class="absolute top-4 left-4 z-10 bg-red-500 text-white text-[10px] font-black px-3 py-1 rounded-lg">SPICY</span>
                        <img src="https://images.unsplash.com/photo-1628840042765-356cda07504e?w=600" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="flex justify-between items-start mb-2">
                        <h4 class="font-bold text-lg leading-tight">Pepperoni Feast</h4>
                        <span class="text-[#f48c25] font-black">$16.00</span>
                    </div>
                    <p class="text-xs text-slate-400 mb-6 leading-relaxed">Double pepperoni, mozzarella, and chili-infused honey on sourdough.</p>
                    <div class="flex justify-between items-center pt-2">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[#f48c25] text-sm">star</span>
                            <span class="text-xs font-black">4.7 <span class="text-slate-300 font-normal">(85)</span></span>
                        </div>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="name" value="Pepperoni Feast">
                            <input type="hidden" name="price" value="16.00">
                            <button type="submit" class="bg-[#f48c25] text-white px-6 py-3 rounded-2xl font-bold text-xs flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">add</span> Add
                            </button>
                        </form>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl transition-all group">
                    <div class="relative h-56 rounded-[2rem] overflow-hidden mb-6">
                        <img src="https://images.unsplash.com/photo-1573080496219-bb080dd4f877?w=600" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="flex justify-between items-start mb-2">
                        <h4 class="font-bold text-lg leading-tight">Truffle Fries</h4>
                        <span class="text-[#f48c25] font-black">$8.50</span>
                    </div>
                    <p class="text-xs text-slate-400 mb-6 leading-relaxed">Hand-cut golden fries tossed in Italian truffle oil and grated parmesan.</p>
                    <div class="flex justify-between items-center pt-2">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[#f48c25] text-sm">star</span>
                            <span class="text-xs font-black">4.8 <span class="text-slate-300 font-normal">(210)</span></span>
                        </div>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="name" value="Truffle Fries">
                            <input type="hidden" name="price" value="8.50">
                            <button type="submit" class="bg-[#f48c25] text-white px-6 py-3 rounded-2xl font-bold text-xs flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">add</span> Add
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mt-16 text-center">
                <button class="bg-white border border-slate-100 px-10 py-4 rounded-2xl font-black text-sm text-slate-600 flex items-center gap-3 mx-auto shadow-sm hover:shadow-md transition-all">
                    Load More Items <span class="material-symbols-outlined">expand_more</span>
                </button>
            </div>
        </section>
    </main>

    <footer class="mt-20 border-t border-slate-100 py-10 px-6 lg:px-20 bg-white">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">
            <div class="flex items-center gap-2">
                <div class="bg-[#f48c25] p-1.5 rounded-lg text-white">
                    <span class="material-symbols-outlined text-sm">restaurant</span>
                </div>
                <span class="font-bold text-sm">FoodieSystem © {{ date('Y') }}</span>
            </div>
            <div class="flex gap-8 text-[10px] font-black text-slate-400 uppercase tracking-widest">
                <a href="#" class="hover:text-[#f48c25]">Privacy Policy</a>
                <a href="#" class="hover:text-[#f48c25]">Terms of Service</a>
                <a href="#" class="hover:text-[#f48c25]">Cookies</a>
            </div>
            <div class="flex gap-4">
                <div class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 hover:bg-[#f48c25] hover:text-white cursor-pointer transition-all">
                    <span class="material-symbols-outlined text-sm">share</span>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
