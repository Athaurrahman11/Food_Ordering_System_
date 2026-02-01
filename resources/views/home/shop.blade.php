@extends('home.layouts.app')
@section('content')
    <div class="fixed inset-0 z-0 pointer-events-none opacity-40">
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-orange-100/40 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2"></div>
        <div class="absolute bottom-0 left-0 w-[800px] h-[800px] bg-blue-100/40 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/2"></div>
    </div>


    <section class="relative min-h-[50vh] flex items-center justify-center pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1559339352-11d035aa65de?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" class="w-full h-full object-cover animate-pulse" style="animation-duration: 20s">
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-[2px]"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-[#fffbf7] via-transparent to-transparent"></div>
        </div>

        <div class="relative z-10 text-center max-w-4xl mx-auto px-6 animate-float">
            <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-2 rounded-full shadow-lg border border-white/20 mb-6 hover:bg-white/20 transition-colors cursor-pointer">
                <span class="w-2 h-2 rounded-full bg-[#f48c25] animate-pulse"></span>
                <span class="text-[10px] font-bold text-white uppercase tracking-wide">Authentic Taste</span>
            </div>
            
            <h1 class="text-4xl lg:text-6xl font-black text-white tracking-tight mb-6 drop-shadow-2xl">
                Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f48c25] to-orange-400">Menu</span>
            </h1>
            <p class="text-lg text-slate-200 font-body max-w-xl mx-auto leading-relaxed drop-shadow-md">
                Freshly prepared meals made daily.
            </p>
        </div>
    </section>

    <main class="max-w-[1440px] mx-auto px-6 py-12 lg:px-20 w-full flex-1 relative z-10 -mt-10">
        <div class="flex flex-col lg:flex-row gap-12">
        
        <aside class="w-full lg:w-80 flex-shrink-0 space-y-8">
            <!-- Search Widget -->
            <div class="bg-white p-6 rounded-[2rem] shadow-xl shadow-slate-200/60 border border-slate-100">
                <h3 class="font-black text-lg mb-4 text-slate-800">Search</h3>
                <div class="relative group">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-[#f48c25] transition-colors">search</span>
                    <input type="text" placeholder="Search pizza, burgers..." class="w-full pl-12 pr-4 py-4 bg-slate-50 rounded-2xl text-xs font-bold outline-none border border-slate-100 focus:border-[#f48c25] focus:bg-white focus:shadow-[0_0_0_4px_rgba(244,140,37,0.1)] transition-all placeholder:text-slate-400 text-slate-800">
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="bg-white p-6 rounded-[2rem] shadow-xl shadow-slate-200/60 border border-slate-100">
                 <div class="flex justify-between items-center mb-6">
                    <h3 class="font-black text-lg text-slate-800">Categories</h3>
                    <a href="{{ route('shop') }}" class="text-[10px] font-bold text-[#f48c25] hover:text-orange-600 transition-colors uppercase tracking-wider">View All</a>
                 </div>
                 
                 <div class="space-y-3 max-h-[400px] overflow-y-auto custom-scrollbar pr-2">
                     <a href="{{ route('shop') }}" class="group flex items-center justify-between p-3 rounded-2xl {{ !request('category') ? 'bg-[#f48c25] text-white shadow-lg shadow-orange-500/30' : 'hover:bg-slate-50 text-slate-600' }} transition-all cursor-pointer">
                         <div class="flex items-center gap-4">
                             <div class="w-10 h-10 rounded-xl {{ !request('category') ? 'bg-white/20' : 'bg-white shadow-sm group-hover:scale-110' }} flex items-center justify-center transition-all duration-300">
                                 <span class="material-symbols-outlined text-lg">restaurant_menu</span>
                             </div>
                             <span class="font-bold text-sm">All Items</span>
                         </div>
                         @if(!request('category')) <span class="material-symbols-outlined text-sm">check_circle</span> @endif
                     </a>
                     
                     @foreach($categories as $cat)
                     @php
                        $icons = [
                            'burger' => 'lunch_dining',
                            'pizza' => 'local_pizza',
                            'drink' => 'local_bar',
                            'dessert' => 'icecream',
                            'salad' => 'nutrition',
                            'chicken' => 'egg_alt', // fallbackish
                            'coffee' => 'coffee',
                        ];
                        // Simple check to find icon based on category name
                        $icon = 'restaurant';
                        foreach($icons as $key => $val) {
                            if(stripos($cat->category, $key) !== false) {
                                $icon = $val;
                                break;
                            }
                        }
                     @endphp
                     <a href="{{ route('shop', ['category' => $cat->category]) }}" class="group flex items-center justify-between p-3 rounded-2xl {{ request('category') == $cat->category ? 'bg-[#f48c25] text-white shadow-lg shadow-orange-500/30' : 'hover:bg-slate-50 text-slate-600' }} transition-all cursor-pointer">
                         <div class="flex items-center gap-4">
                             <div class="w-10 h-10 rounded-xl {{ request('category') == $cat->category ? 'bg-white/20' : 'bg-white shadow-sm group-hover:scale-110' }} flex items-center justify-center transition-all duration-300">
                                 <span class="material-symbols-outlined text-lg">{{ $icon }}</span>
                             </div>
                             <span class="font-bold text-sm">{{ $cat->category }}</span>
                         </div>
                     </a>
                     @endforeach
                 </div>
            </div>

            <!-- Ad / Promo - Premium Style -->
            <div class="relative overflow-hidden rounded-[2.5rem] bg-slate-900 p-8 text-center text-white shadow-2xl shadow-slate-900/20 group hidden lg:block">
                 <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#f48c25_1px,transparent_1px)] [background-size:16px_16px]"></div>
                 <div class="absolute -top-24 -right-24 w-60 h-60 bg-[#f48c25] blur-[100px] opacity-40 group-hover:opacity-60 transition-all duration-700"></div>
                 <div class="absolute -bottom-24 -left-24 w-60 h-60 bg-blue-600 blur-[100px] opacity-40 group-hover:opacity-60 transition-all duration-700"></div>
                 
                <div class="relative z-10">
                     <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-[#f48c25] to-orange-600 shadow-lg shadow-orange-500/40 mb-6 group-hover:scale-110 transition-transform duration-300">
                        <span class="material-symbols-outlined text-2xl">percent</span>
                     </div>
                     <h3 class="font-black text-xl mb-2 tracking-tight">Super Deal!</h3>
                     <p class="text-xs opacity-80 mb-8 font-medium leading-relaxed">Save 50% on your first order. Limited time only!</p>
                     <button class="w-full bg-white text-slate-900 py-4 rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-[#f48c25] hover:text-white transition-all shadow-lg hover:shadow-orange-500/25 active:scale-95">Claim Offer</button>
                 </div>
            </div>
        </aside>


        <!-- Main Grid -->
        <section class="flex-1">
            <!-- Header & Sort -->
            <div class="mb-8 flex flex-col md:flex-row justify-between items-end gap-6">
                 <div>
                     <span class="text-[#f48c25] font-bold uppercase tracking-widest text-[10px] mb-2 block pl-1">Menu</span>
                     <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight">Delicious <span class="text-[#f48c25]">Choices</span></h2>
                     <div class="w-80 h-1.5 bg-[#f48c25] rounded-full mt-4"></div>
                 </div>
                 
                 <div class="flex items-center gap-4 bg-white p-2 rounded-2xl shadow-sm border border-slate-100">
                    <div class="flex items-center px-4 py-2 bg-slate-50 rounded-xl text-[10px] font-bold text-slate-500 uppercase tracking-wide">
                        {{ $foods->total() }} items
                    </div>
                 </div>
            </div>

            <!-- Items Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                @foreach($foods as $food)
                @php
                    // MOCK ATTRIBUTES
                    $isVeg = \Illuminate\Support\Str::contains(strtolower($food->category), ['salad', 'vegan', 'veg', 'drink', 'beverage', 'dessert', 'coffee', 'tea']);
                    $rating = number_format(4.0 + (rand(0, 90) / 100), 1);
                    $reviews = rand(12, 180);
                    $deliveryMin = rand(20, 35);
                    $deliveryMax = $deliveryMin + 10;
                    $isHot = $loop->iteration <= 3 && !request('page');
                    
                    $description = 'Savory blend of fresh ingredients and spices.';
                    if(stripos($food->name, 'pizza') !== false) $description = 'Cheesy goodness with premium toppings on a crispy crust.';
                    elseif(stripos($food->name, 'burger') !== false) $description = 'Juicy patty, fresh lettuce, and our secret sauce.';
                    elseif(stripos($food->name, 'salad') !== false) $description = 'Garden fresh greens with vinaigrette dressing.';
                @endphp
                <div class="group bg-[#2b2118] rounded-[2rem] overflow-hidden shadow-lg hover:shadow-2xl hover:shadow-[#f48c25]/20 hover:-translate-y-2 transition-all duration-500 flex flex-col relative h-full border border-white/5">
                    


                    <!-- Image Area -->
                    <div class="relative w-full aspect-[4/3] bg-slate-800 isolate transform-gpu">
                        <!-- Badges -->
                        <div class="absolute top-4 left-4 z-20 flex flex-wrap gap-2">
                                <span class="bg-white text-green-600 text-[10px] font-black px-2.5 py-1 rounded-lg shadow-lg uppercase tracking-wider flex items-center gap-1">
                                    {{ $food->category }}
                                </span>
                        </div>
                        
                        <img src="{{ Str::startsWith($food->image, ['http', 'https']) ? $food->image : asset('Food_items/' . $food->image) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
                        
                        <!-- Dark Gradient Overlay at Bottom -->
                        <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-[#2b2118] to-transparent"></div>
                    </div>

                    <!-- Content -->
                    <div class="flex flex-col flex-1 px-6 pb-6 pt-2">
                        <div class="flex justify-between items-start mb-2 gap-2">
                            <h4 class="font-bold text-lg leading-tight text-white group-hover:text-[#f48c25] transition-colors" title="{{ $food->name }}">{{ $food->name }}</h4>
                            <span class="text-white font-black text-lg">${{ $food->price }}</span>
                        </div>
                        
                        <p class="text-xs text-gray-400 line-clamp-2 leading-relaxed mb-6 font-medium">{{ $description }}</p>
                        
                        <div class="mt-auto">
                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="name" value="{{ $food->name }}">
                                <input type="hidden" name="price" value="{{ $food->price }}">
                                <input type="hidden" name="id" value="{{ $food->id }}">
                                
                                <button type="submit" class="w-full bg-[#f48c25] text-white py-3.5 rounded-xl font-bold text-sm flex items-center justify-center gap-2 shadow-lg shadow-[#f48c25]/25 hover:bg-[#e07b1a] active:scale-95 transition-all duration-300 uppercase tracking-widest">
                                        <span>ADD TO CART</span> 
                                        <span class="material-symbols-outlined text-[18px]">lunch_dining</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-16 text-center">
                    <div class="inline-block bg-white p-2 rounded-[2rem] shadow-md shadow-slate-200/50 border border-slate-100">
                    {{ $foods->links() }}
                    </div>
            </div>
        </section>
        
        </div>
    </main>
@endsection
 
