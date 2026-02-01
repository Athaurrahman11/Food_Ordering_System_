@extends('home.layouts.app')

@section('content')
<div class="relative min-h-screen pt-32 pb-20 px-6 lg:px-20 max-w-[1440px] mx-auto">
    
    <!-- Background Elements -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-orange-100/40 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2 -z-10"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-blue-100/30 rounded-full blur-[80px] translate-y-1/3 -translate-x-1/4 -z-10"></div>

    <div class="text-center mb-12">
        <span class="text-[#f48c25] font-bold uppercase tracking-widest text-xs mb-3 block">Your Order</span>
        <h1 class="text-4xl lg:text-5xl font-black text-slate-900">Shopping <span class="text-[#f48c25]">Cart</span></h1>
        <div class="w-44 h-1.5 bg-[#f48c25] rounded-full mt-4 mx-auto"></div>
    </div>

    @if(session('cart') && count(session('cart')) > 0)
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
        
        <!-- Cart Items List -->
        <div class="lg:col-span-2 space-y-6">
            @php $total = 0; @endphp
            @foreach(session('cart') as $id => $details)
            @php $total += $details['price'] * $details['quantity']; @endphp
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 grid grid-cols-1 md:grid-cols-12 items-center gap-6 group hover:border-[#f48c25]/30 transition-colors">
                
                <!-- Image -->
                <div class="md:col-span-2 flex justify-center md:justify-start">
                    <div class="w-24 h-24 rounded-2xl bg-slate-100 flex items-center justify-center text-slate-300 flex-shrink-0 overflow-hidden">
                        @if(isset($details['image']) && $details['image'])
                             <img src="{{ asset('Food_Items/'.$details['image']) }}" class="w-full h-full object-cover">
                        @else
                             <span class="material-symbols-outlined text-4xl">lunch_dining</span>
                        @endif
                    </div>
                </div>

                <!-- Info -->
                <div class="md:col-span-4 text-center md:text-left">
                    <h3 class="font-black text-xl text-slate-900 mb-1 truncate" title="{{ $details['name'] }}">{{ $details['name'] }}</h3>
                    <p class="text-[#f48c25] font-bold">${{ $details['price'] }}</p>
                </div>

                <!-- Qty -->
                <div class="md:col-span-3 flex justify-center md:justify-start">
                    <div class="flex items-center gap-4 bg-slate-50 px-4 py-2 rounded-xl border border-slate-200">
                        <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Qty</span>
                        <span class="font-black text-slate-900">{{ $details['quantity'] }}</span>
                    </div>
                </div>

                <!-- Total -->
                <div class="md:col-span-2 text-center md:text-left">
                    <div class="font-black text-xl text-slate-900">
                        ${{ $details['price'] * $details['quantity'] }}
                    </div>
                </div>

                <!-- Remove -->
                <div class="md:col-span-1 flex justify-center md:justify-end">
                    <a href="{{ route('cart.remove', $id) }}" class="w-10 h-10 rounded-full bg-red-50 text-red-500 flex items-center justify-center hover:bg-red-500 hover:text-white transition-all shadow-sm" title="Remove">
                        <span class="material-symbols-outlined text-sm">delete</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Summary -->
        <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-orange-500/10 border border-slate-100 lg:sticky lg:top-32">
            <h3 class="font-black text-2xl text-slate-900 mb-8">Order Summary</h3>
            
            <div class="space-y-4 mb-8">
                <div class="flex justify-between items-center text-slate-500 font-medium">
                    <span>Subtotal</span>
                    <span class="text-slate-900 font-bold">${{ $total }}</span>
                </div>
                
                @php
                    $shipping = $total > 1000 ? 0 : 500;
                @endphp

                <div class="flex justify-between items-center text-slate-500 font-medium">
                    <span>Delivery Fee</span>
                    @if($shipping == 0)
                        <span class="text-green-600 font-bold">Free</span>
                    @else
                        <span class="text-slate-900 font-bold">${{ $shipping }}</span>
                    @endif
                </div>

                @if($shipping > 0)
                <div class="text-xs text-slate-400 mt-1">
                    Add ${{ 1000 - $total }} more for free shipping
                </div>
                @endif

                <div class="h-px bg-slate-100 my-4"></div>
                <div class="flex justify-between items-center text-xl font-black text-slate-900">
                    <span>Total</span>
                    <span>${{ $total + $shipping }}</span>
                </div>
            </div>

            <a href="{{ route('checkout') }}" class="w-full bg-[#f48c25] text-white py-4 rounded-2xl font-bold uppercase tracking-widest hover:bg-orange-600 hover:scale-[1.02] active:scale-[0.98] transition-all shadow-lg shadow-orange-500/30 flex items-center justify-center gap-2 group">
                Checkout
                <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
            
            <a href="{{ route('shop') }}" class="block text-center mt-6 text-sm font-bold text-slate-400 hover:text-slate-900 transition-colors">
                Continue Shopping
            </a>
        </div>

    </div>
    @else
    
    <!-- Empty Cart State -->
    <div class="flex flex-col items-center justify-center py-20 text-center">
        <div class="w-40 h-40 bg-orange-50 rounded-full flex items-center justify-center mb-8 animate-pulse text-[#f48c25]">
            <span class="material-symbols-outlined text-7xl">shopping_cart_off</span>
        </div>
        <h2 class="text-3xl font-black text-slate-900 mb-4">Your cart is empty</h2>
        <p class="text-slate-500 max-w-md mx-auto mb-8 leading-relaxed">Looks like you haven't added anything to your cart yet. Go ahead and explore our delicious menu!</p>
        <a href="{{ route('shop') }}" class="bg-[#f48c25] text-white px-10 py-4 rounded-full font-bold uppercase tracking-widest shadow-lg shadow-orange-500/30 hover:bg-orange-600 hover:scale-110 transition-all">
            Browse Menu
        </a>
    </div>

    @endif
</div>
@endsection
