@extends('home.layouts.app')

@section('content')
<div class="relative min-h-screen pt-32 pb-20 px-6 lg:px-20 max-w-[1440px] mx-auto">
    
    <!-- Background Elements -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-orange-100/40 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2 -z-10"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-blue-100/30 rounded-full blur-[80px] translate-y-1/3 -translate-x-1/4 -z-10"></div>

    <div class="text-center mb-12">
        <span class="text-[#f48c25] font-bold uppercase tracking-widest text-xs mb-3 block">Final Step</span>
        <h1 class="text-4xl lg:text-5xl font-black text-slate-900">Checkout</h1>
        <div class="w-24 h-1.5 bg-[#f48c25] rounded-full mt-4 mx-auto"></div>
    </div>

    @if(session('cart') && count(session('cart')) > 0)
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
        
        <!-- Left Side: Address Form -->
        <div class="lg:col-span-7">
            <div class="bg-white p-8 lg:p-10 rounded-[2.5rem] shadow-xl border border-slate-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-orange-50 to-transparent rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
                
                <h3 class="font-black text-2xl text-slate-900 mb-8 flex items-center gap-3 relative z-10">
                    <span class="flex items-center justify-center w-8 h-8 rounded-full bg-orange-100 text-[#f48c25] text-sm">1</span>
                    Delivery Details
                </h3>

                <form action="{{ route('place.order') }}" method="POST" class="space-y-6 relative z-10" id="checkout-form">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2 group/input">
                            <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Full Name</label>
                            <input type="text" name="name" required placeholder="John Doe" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-[#f48c25] focus:bg-white focus:shadow-[0_4px_15px_-3px_rgba(244,140,37,0.2)] transition-all font-bold text-slate-800 placeholder:font-medium placeholder:text-slate-400">
                        </div>
                        <div class="space-y-2 group/input">
                            <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Phone Number</label>
                            <input type="tel" name="phone" required placeholder="+1 (555) 000-0000" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-[#f48c25] focus:bg-white focus:shadow-[0_4px_15px_-3px_rgba(244,140,37,0.2)] transition-all font-bold text-slate-800 placeholder:font-medium placeholder:text-slate-400">
                        </div>
                    </div>

                    <div class="space-y-2 group/input">
                        <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Delivery Address</label>
                        <textarea name="address" required rows="3" placeholder="Apartment, Street Address, City" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-[#f48c25] focus:bg-white focus:shadow-[0_4px_15px_-3px_rgba(244,140,37,0.2)] transition-all font-bold text-slate-800 placeholder:font-medium placeholder:text-slate-400 resize-none"></textarea>
                    </div>

                    <div class="space-y-2 group/input">
                        <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1">Order Notes (Optional)</label>
                        <textarea name="notes" rows="2" placeholder="Any special instructions for delivery?" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-[#f48c25] focus:bg-white focus:shadow-[0_4px_15px_-3px_rgba(244,140,37,0.2)] transition-all font-bold text-slate-800 placeholder:font-medium placeholder:text-slate-400 resize-none"></textarea>
                    </div>

                    <div class="h-px bg-slate-100 my-6"></div>

                    <h3 class="font-black text-2xl text-slate-900 mb-6 flex items-center gap-3">
                        <span class="flex items-center justify-center w-8 h-8 rounded-full bg-orange-100 text-[#f48c25] text-sm">2</span>
                        Payment Method
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <label class="relative cursor-pointer group">
                            <input type="radio" name="payment_method" value="cod" checked class="peer sr-only">
                            <div class="p-5 rounded-2xl border-2 border-slate-200 bg-white peer-checked:border-[#f48c25] peer-checked:bg-orange-50/50 transition-all hover:border-orange-200">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="material-symbols-outlined text-[#f48c25]">payments</span>
                                    <span class="font-bold text-slate-900">Cash on Delivery</span>
                                </div>
                                <p class="text-xs text-slate-500">Pay when you receive your order.</p>
                            </div>
                            <div class="absolute top-5 right-5 w-4 h-4 rounded-full border-2 border-slate-300 peer-checked:border-[#f48c25] peer-checked:bg-[#f48c25] transition-colors"></div>
                        </label>

                        <label class="relative cursor-pointer group opacity-60 grayscale cursor-not-allowed">
                            <input type="radio" name="payment_method" value="card" disabled class="peer sr-only">
                            <div class="p-5 rounded-2xl border-2 border-slate-200 bg-slate-50 transition-all">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="material-symbols-outlined text-slate-400">credit_card</span>
                                    <span class="font-bold text-slate-400">Online Payment</span>
                                </div>
                                <p class="text-xs text-slate-400">Coming Soon</p>
                            </div>
                        </label>
                    </div>

                </form>
            </div>
        </div>

        <!-- Right Side: Order Summary -->
        <div class="lg:col-span-5">
            <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-orange-500/10 border border-slate-100 lg:sticky lg:top-32">
                <h3 class="font-black text-xl text-slate-900 mb-6">Order Summary</h3>
                
                <div class="max-h-[300px] overflow-y-auto pr-2 space-y-4 mb-6 custom-scrollbar">
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity']; @endphp
                    <div class="flex items-center gap-4 py-2">
                         <div class="w-16 h-16 rounded-xl bg-slate-100 flex items-center justify-center text-slate-300 flex-shrink-0 overflow-hidden">
                            @if(isset($details['image']) && $details['image'])
                                    <img src="{{ asset('Food_Items/'.$details['image']) }}" class="w-full h-full object-cover">
                            @else
                                    <span class="material-symbols-outlined text-2xl">lunch_dining</span>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="font-bold text-slate-900 text-sm truncate">{{ $details['name'] }}</h4>
                            <p class="text-xs text-slate-500">Qty: {{ $details['quantity'] }}</p>
                        </div>
                        <span class="font-black text-slate-900 text-sm">${{ $details['price'] * $details['quantity'] }}</span>
                    </div>
                    @endforeach
                </div>

                @php
                    $shipping = $total > 1000 ? 0 : 50;
                @endphp

                <div class="space-y-3 mb-8 pt-6 border-t border-slate-100">
                    <div class="flex justify-between items-center text-slate-500 text-sm font-medium">
                        <span>Subtotal</span>
                        <span class="text-slate-900 font-bold">${{ $total }}</span>
                    </div>
                    <div class="flex justify-between items-center text-slate-500 text-sm font-medium">
                        <span>Delivery Fee</span>
                        @if($shipping == 0)
                            <span class="text-green-600 font-bold">Free</span>
                        @else
                            <span class="text-slate-900 font-bold">${{ $shipping }}</span>
                        @endif
                    </div>
                    <div class="h-px bg-slate-100 my-2"></div>
                    <div class="flex justify-between items-center text-xl font-black text-slate-900">
                        <span>Total</span>
                        <span>${{ $total + $shipping }}</span>
                    </div>
                </div>

                <button onclick="document.getElementById('checkout-form').submit();" class="w-full bg-[#f48c25] text-white py-4 rounded-2xl font-bold uppercase tracking-widest hover:bg-orange-600 hover:scale-[1.02] active:scale-[0.98] transition-all shadow-lg shadow-orange-500/30 flex items-center justify-center gap-2 group">
                    <span>Place Order</span>
                    <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">check_circle</span>
                </button>
                
                <p class="text-center text-[10px] text-slate-400 font-bold mt-4 uppercase tracking-wide">
                    <span class="material-symbols-outlined text-sm align-middle mr-1">lock</span> Secure Checkout
                </p>
            </div>
        </div>

    </div>
    @else
        <script>window.location = "{{ route('shop') }}";</script>
    @endif
</div>

<style>
.custom-scrollbar::-webkit-scrollbar {
    width: 6px;
}
.custom-scrollbar::-webkit-scrollbar-track {
    background: #f1f5f9; 
    border-radius: 4px;
}
.custom-scrollbar::-webkit-scrollbar-thumb {
    background: #cbd5e1; 
    border-radius: 4px;
}
.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #94a3b8; 
}
</style>
@endsection
