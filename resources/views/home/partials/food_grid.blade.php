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
        <div class="relative h-60 bg-slate-800 isolate transform-gpu">
            <!-- Badges -->
            <div class="absolute top-4 left-4 z-20 flex flex-wrap gap-2">
                    <span class="bg-white text-green-600 text-[10px] font-black px-2.5 py-1 rounded-lg shadow-lg uppercase tracking-wider flex items-center gap-1">
                        {{ $food->category }}
                    </span>
            </div>
            
            <img src="{{ Str::startsWith($food->image, ['http', 'https']) ? $food->image : asset('Food_items/' . $food->image) }}" class="w-full h-full object-cover">
            
            <!-- Dark Gradient Overlay at Bottom -->
            <div class="absolute bottom-0 left-0 right-0 h-20 bg-gradient-to-t from-[#2b2118] to-transparent"></div>
        </div>

        <!-- Content -->
        <div class="flex flex-col flex-1 px-6 pb-6 pt-2">
            <div class="flex justify-between items-start mb-2 gap-2">
                <h4 class="font-bold text-lg leading-tight text-white group-hover:text-[#f48c25] transition-colors" title="{{ $food->name }}">{{ $food->name }}</h4>
                <span class="text-white font-black text-lg">${{ $food->price }}</span>
            </div>
            

            
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
