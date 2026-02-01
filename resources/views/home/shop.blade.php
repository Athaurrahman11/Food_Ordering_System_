<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Our Menu - Foodie</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .font-body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #f48c25; border-radius: 10px; }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
        
        .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.8);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.05);
        }
    </style>
</head>
<body class="bg-[#fffbf7] text-slate-900 min-h-screen flex flex-col selection:bg-[#f48c25] selection:text-white relative overflow-x-hidden">

    <!-- Background Pattern -->
    <div class="fixed inset-0 z-0 pointer-events-none opacity-40">
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-orange-100/40 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[800px] h-[800px] bg-blue-100/40 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/2"></div>
    </div>

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
                <a href="{{ route('user.home') }}" class="hover:text-[#f48c25] transition-colors relative group">
                    Home
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#f48c25] transition-all group-hover:w-full"></span>
                </a>
                <a href="{{ route('shop') }}" class="text-[#f48c25] font-bold relative group">
                    Menu
                    <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-[#f48c25] transition-all"></span>
                </a>
                <a href="{{ route('about') }}" class="hover:text-[#f48c25] transition-colors relative group">
                    Story
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#f48c25] transition-all group-hover:w-full"></span>
                </a>
                <a href="{{ route('contact') }}" class="hover:text-[#f48c25] transition-colors relative group">
                    Contact
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#f48c25] transition-all group-hover:w-full"></span>
                </a>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-4">
                 <a href="{{ route('cart.view') }}" class="relative w-10 h-10 rounded-full bg-slate-900 text-white flex items-center justify-center hover:bg-[#f48c25] hover:scale-110 transition-all shadow-lg shadow-black/10">
                    <span class="material-symbols-outlined text-[20px]">shopping_bag</span>
                    <span class="cart-count absolute -top-1 -right-1 bg-red-500 text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold border-2 border-white animate-bounce {{ session('cart') ? '' : 'hidden' }}">
                        {{ session('cart') ? count(session('cart')) : 0 }}
                    </span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-[50vh] flex items-center justify-center pt-32 pb-20 overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" class="w-full h-full object-cover animate-pulse" style="animation-duration: 20s">
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-[2px]"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#fffbf7] via-transparent to-transparent"></div>
        </div>

        <div class="relative z-10 text-center max-w-4xl mx-auto px-6 animate-float">
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-2 rounded-full shadow-lg border border-white/20 mb-6 hover:bg-white/20 transition-colors cursor-pointer">
                <span class="w-2 h-2 rounded-full bg-[#f48c25] animate-pulse"></span>
                <span class="text-xs font-bold text-white uppercase tracking-wide">Authentic Taste</span>
            </div>
            
            <h1 class="text-6xl lg:text-8xl font-black text-white tracking-tight mb-6 drop-shadow-2xl">
                Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f48c25] to-orange-400">Menu</span>
            </h1>
            <p class="text-xl text-slate-200 font-body max-w-xl mx-auto leading-relaxed drop-shadow-md">
                Freshly prepared meals made daily.
            </p>
        </div>
    </section>

    <!-- Main Content Area -->
    <main class="max-w-[1440px] mx-auto px-6 py-12 lg:px-20 w-full flex-1 relative z-10 -mt-10">
        <div class="flex flex-col lg:flex-row gap-12">
        
        <!-- Sidebar -->
        <aside class="w-full lg:w-72 flex-shrink-0 space-y-8">
            <!-- Search Widget -->
            <div class="glass-card p-6 rounded-[2.5rem] hover:shadow-[0_20px_40px_rgb(244,140,37,0.1)] transition-all duration-300">
                <h3 class="font-black text-lg mb-4 text-slate-900 pl-1">Search</h3>
                <div class="relative group">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-xl group-focus-within:text-[#f48c25] transition-colors">search</span>
                    <input type="text" placeholder="Pizza, Burgers..." class="w-full pl-12 pr-4 py-4 bg-slate-50/50 rounded-2xl text-sm font-bold outline-none border border-transparent focus:border-[#f48c25] focus:bg-white focus:shadow-[0_0_0_4px_rgba(244,140,37,0.1)] transition-all placeholder:text-slate-400 text-slate-800">
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="glass-card p-6 rounded-[2.5rem]">
                 <div class="flex justify-between items-center mb-6 pl-1 pr-1">
                    <h3 class="font-black text-lg text-slate-900">Categories</h3>
                    <a href="{{ route('shop') }}" class="text-[10px] font-black text-slate-400 uppercase tracking-widest hover:text-[#f48c25] transition-colors">View All</a>
                 </div>
                 
                 <div class="space-y-2.5 max-h-[400px] overflow-y-auto custom-scrollbar pr-2">
                     <a href="{{ route('shop') }}" class="flex items-center justify-between p-3.5 rounded-2xl {{ !request('category') ? 'bg-[#f48c25] text-white shadow-lg shadow-[#f48c25]/30' : 'hover:bg-orange-50 text-slate-600' }} transition-all group">
                         <div class="flex items-center gap-3">
                             <div class="w-8 h-8 rounded-lg {{ !request('category') ? 'bg-white/20' : 'bg-slate-100 group-hover:bg-white' }} flex items-center justify-center transition-colors">
                                 <span class="material-symbols-outlined text-sm">restaurant_menu</span>
                             </div>
                             <span class="font-bold text-sm">All Items</span>
                         </div>
                         @if(!request('category')) <span class="material-symbols-outlined text-sm">check_circle</span> @endif
                     </a>
                     
                     @foreach($categories as $category)
                     <a href="{{ route('shop', ['category' => $category->category]) }}" class="flex items-center justify-between p-3.5 rounded-2xl {{ request('category') == $category->category ? 'bg-[#f48c25] text-white shadow-lg shadow-[#f48c25]/30' : 'hover:bg-orange-50 text-slate-600' }} transition-all group">
                         <div class="flex items-center gap-3">
                             <div class="w-8 h-8 rounded-lg {{ request('category') == $category->category ? 'bg-white/20' : 'bg-slate-100 group-hover:bg-white' }} flex items-center justify-center transition-colors">
                                 <span class="material-symbols-outlined text-sm">category</span>
                             </div>
                             <span class="font-bold text-sm">{{ $category->category }}</span>
                         </div>
                     </a>
                     @endforeach
                 </div>
            </div>

            <!-- Price Filter Widget -->
            <div class="glass-card p-6 rounded-[2.5rem]">
                <div class="flex justify-between items-center mb-4 pl-1">
                    <h3 class="font-black text-lg text-slate-900">Price Range</h3>
                </div>
                <div class="px-1">
                    <input type="range" class="w-full h-1.5 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-[#f48c25]" min="0" max="100">
                    <div class="flex justify-between mt-3 text-xs font-bold text-slate-500">
                        <span>$0</span>
                        <span>$100+</span>
                    </div>
                </div>
            </div>

            <!-- Ad / Promo -->
            <div class="bg-slate-900 p-8 rounded-[2.5rem] text-center text-white relative overflow-hidden hidden lg:block shadow-xl shadow-slate-900/10 group hover:scale-[1.02] transition-transform duration-500">
                 <div class="absolute inset-0 opacity-20" style="background-image: radial-gradient(#f48c25 1px, transparent 1px); background-size: 10px 10px;"></div>
                 <div class="absolute -bottom-12 -right-12 w-48 h-48 bg-[#f48c25] blur-[80px] rounded-full opacity-40 group-hover:opacity-60 transition-all duration-700"></div>
                 
                 <div class="relative z-10">
                     <div class="w-12 h-12 bg-[#f48c25] rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-[#f48c25]/20 animate-bounce">
                        <span class="material-symbols-outlined text-xl">local_offer</span>
                     </div>
                     <h3 class="font-black text-2xl mb-2">Super Deal</h3>
                     <p class="text-sm opacity-70 mb-6 font-body leading-relaxed">Get 50% off on your first order this weekend!</p>
                     <button class="w-full bg-white text-slate-900 py-4 rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-[#f48c25] hover:text-white transition-all shadow-lg hover:shadow-[#f48c25]/25">Claim Now</button>
                 </div>
            </div>
        </aside>

        <!-- Main Grid -->
        <section class="flex-1">
            <!-- Filter Bar -->
            <div class="glass-card p-4 rounded-[2.5rem] flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                 <div class="pl-2">
                     <p class="text-slate-500 font-medium text-sm font-body">
                        Found <span class="text-slate-900 font-black">{{ $foods->total() }}</span> tasty results
                     </p>
                 </div>
                 
                 <div class="flex items-center gap-3">
                     <div class="flex items-center gap-2 bg-slate-50/50 p-1.5 rounded-2xl border border-slate-100">
                         <button class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center text-[#f48c25]"><span class="material-symbols-outlined text-[20px]">grid_view</span></button>
                         <button class="w-10 h-10 text-slate-400 hover:text-slate-600 hover:bg-slate-200 rounded-xl flex items-center justify-center transition-all"><span class="material-symbols-outlined text-[20px]">view_list</span></button>
                     </div>
                     
                     <div class="relative group h-full">
                         <select class="appearance-none bg-slate-50/50 h-[52px] pl-5 pr-12 rounded-2xl text-xs font-bold text-slate-700 outline-none cursor-pointer border border-slate-100 hover:border-[#f48c25] focus:border-[#f48c25] transition-all uppercase tracking-wide">
                             <option>Recommended</option>
                             <option>Price: Low to High</option>
                             <option>Price: High to Low</option>
                             <option>Rating</option>
                         </select>
                         <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-sm group-hover:text-[#f48c25] transition-colors">expand_more</span>
                     </div>
                 </div>
            </div>

            <!-- Items Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @foreach($foods as $food)
                @php
                    $isVeg = \Illuminate\Support\Str::contains(strtolower($food->category), ['salad', 'vegan', 'veg', 'drink', 'beverage', 'dessert', 'coffee', 'tea']);
                @endphp
                <div class="glass-card rounded-[2.5rem] p-4 hover:shadow-[0_20px_50px_-10px_rgba(244,140,37,0.15)] hover:border-[#f48c25]/30 hover:-translate-y-2 transition-all duration-300 group flex flex-col h-full relative">
                    
                    <!-- Image Area -->
                    <div class="relative h-60 rounded-[2rem] overflow-hidden mb-5 flex-shrink-0 bg-slate-50">
                        <!-- Badges Container -->
                        <div class="absolute top-4 left-4 z-20 flex flex-col gap-2">
                            @if($loop->iteration <= 3 && !request('page'))
                            <span class="bg-gradient-to-r from-[#f48c25] to-orange-600 text-white text-[10px] font-black px-3 py-1.5 rounded-full shadow-lg shadow-[#f48c25]/30 uppercase tracking-wider flex items-center gap-1 w-max">
                                <span class="material-symbols-outlined text-[14px] filled">local_fire_department</span> Hot
                            </span>
                            @endif
                            
                            <!-- Veg/Non-Veg Badge -->
                            <span class="bg-white/90 backdrop-blur text-[10px] font-black px-3 py-1.5 rounded-full shadow-sm uppercase tracking-wider flex items-center gap-1 w-max border {{ $isVeg ? 'border-green-500 text-green-600' : 'border-red-500 text-red-600' }}">
                                <span class="w-2 h-2 rounded-full {{ $isVeg ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                {{ $isVeg ? 'VEG' : 'NON-VEG' }}
                            </span>
                        </div>
                        
                        <div class="absolute top-4 right-4 z-20 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-x-2 group-hover:translate-x-0">
                             <button class="w-10 h-10 bg-white/90 backdrop-blur rounded-full flex items-center justify-center shadow-lg hover:bg-red-50 hover:text-red-500 transition-colors" title="Add to Wishlist">
                                 <span class="material-symbols-outlined text-[20px]">favorite</span>
                             </button>
                        </div>
                        
                        <img src="{{ Str::startsWith($food->image, ['http', 'https']) ? $food->image : asset('Food_items/' . $food->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        
                        <!-- Rating -->
                        <div class="absolute bottom-3 left-3 z-20">
                             <div class="bg-white/95 backdrop-blur px-2.5 py-1 rounded-full flex items-center gap-1 shadow-sm border border-white/50">
                                <span class="material-symbols-outlined text-yellow-500 text-[16px] filled">star</span>
                                <span class="text-xs font-bold text-slate-800">4.8</span>
                            </div>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="flex flex-col flex-1 px-2.5">
                        <div class="flex justify-between items-start mb-3 gap-2">
                            <h4 class="font-extrabold text-lg leading-tight text-slate-900 line-clamp-1 group-hover:text-[#f48c25] transition-colors" title="{{ $food->name }}">{{ $food->name }}</h4>
                            <span class="text-[#f48c25] font-black text-xl">${{ $food->price }}</span>
                        </div>
                        
                        <div class="mb-6">
                            <span class="inline-block bg-orange-50 text-[#f48c25] px-2.5 py-1 rounded-lg text-[10px] font-bold uppercase tracking-wider mb-2 border border-orange-100">
                                {{ $food->category }}
                            </span>
                            <p class="text-xs text-slate-500 line-clamp-2 leading-relaxed font-body">Premium quality <span class="font-bold text-slate-700">{{ strtolower($food->name) }}</span>, freshly prepared for you.</p>
                        </div>
                        
                        <div class="mt-auto border-t border-slate-50 pt-5">
                            <form action="{{ route('cart.add') }}" method="POST" class="ajax-cart-form">
                                @csrf
                                <input type="hidden" name="name" value="{{ $food->name }}">
                                <input type="hidden" name="price" value="{{ $food->price }}">
                                <input type="hidden" name="id" value="{{ $food->id }}">
                                <button type="submit" class="w-full bg-gradient-to-r from-slate-900 to-slate-800 text-white py-4 rounded-2xl font-black text-xs uppercase tracking-widest hover:from-[#f48c25] hover:to-orange-600 hover:shadow-xl hover:shadow-[#f48c25]/30 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2 group/btn relative overflow-hidden">
                                     <div class="absolute inset-0 bg-white/20 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-300"></div>
                                     <span class="relative z-10">Add to Cart</span> 
                                     <span class="material-symbols-outlined relative z-10 group-hover/btn:translate-x-1 transition-transform text-[16px]">arrow_forward</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-16 text-center">
                 <div class="inline-block glass-card p-3 rounded-[2.5rem]">
                    {{ $foods->links() }}
                 </div>
            </div>
        </section>
        </div>
    </main>

    @include('partials.footer')

    <!-- Toast Notification Container -->
    <div id="toast-container" class="fixed bottom-6 right-6 z-[150] flex flex-col gap-3 pointer-events-none"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const forms = document.querySelectorAll('.ajax-cart-form');
            
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const formData = new FormData(this);
                    const button = this.querySelector('button');
                    const originalContent = button.innerHTML;
                    
                    // Loading State
                    button.disabled = true;
                    button.innerHTML = '<span class="material-symbols-outlined animate-spin text-sm">progress_activity</span>';
                    
                    fetch(this.action, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update Cart Count
                            const cartCounters = document.querySelectorAll('.cart-count');
                            cartCounters.forEach(counter => {
                                counter.textContent = data.cartCount;
                                counter.classList.remove('hidden');
                            });
                            
                            // Show Toast
                            showToast(data.message, 'success');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        showToast('Something went wrong', 'error');
                    })
                    .finally(() => {
                        // Reset Button
                        button.disabled = false;
                        button.innerHTML = originalContent;
                    });
                });
            });
        });

        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            
            // Toast Styling
            const colors = type === 'success' ? 'bg-slate-900 border-l-4 border-[#f48c25]' : 'bg-red-600 border-l-4 border-white';
            const icon = type === 'success' ? 'check_circle' : 'error';
            
            toast.className = `${colors} text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 transform translate-y-20 opacity-0 transition-all duration-500 pointer-events-auto min-w-[300px]`;
            toast.innerHTML = `
                <span class="material-symbols-outlined text-[#f48c25]">${icon}</span>
                <p class="font-bold text-sm bg-transparent">${message}</p>
            `;
            
            container.appendChild(toast);
            
            // Animate In
            requestAnimationFrame(() => {
                toast.classList.remove('translate-y-20', 'opacity-0');
            });
            
            // Remove after 3s
            setTimeout(() => {
                toast.classList.add('translate-y-20', 'opacity-0');
                setTimeout(() => toast.remove(), 500);
            }, 3000);
        }
    </script>
</body>
</html>
