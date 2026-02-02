@extends('home.layouts.app')

@section('content')
<div class="relative min-h-screen pt-32 pb-20 px-6 lg:px-20 max-w-[1440px] mx-auto">

    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-orange-100/40 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2 -z-10"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-blue-100/30 rounded-full blur-[80px] translate-y-1/3 -translate-x-1/4 -z-10"></div>

    <div class="text-center mb-12">
        <span class="text-[#f48c25] font-bold uppercase tracking-widest text-xs mb-3 block">Your Order</span>
        <h1 class="text-4xl lg:text-5xl font-black text-slate-900">Shopping <span class="text-[#f48c25]">Cart</span></h1>
        <div class="w-44 h-1.5 bg-[#f48c25] rounded-full mt-4 mx-auto"></div>
    </div>

    @if($cartItems->count() > 0)
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">

        <div class="lg:col-span-2 space-y-6">
            @php $total = 0; @endphp
            @foreach($cartItems as $item)
            @php $total += $item->food->price * $item->quantity; @endphp
            <div id="cart-item-{{ $item->id }}" class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 grid grid-cols-1 md:grid-cols-12 items-center gap-6 group hover:border-[#f48c25]/30 transition-colors">

                <div class="md:col-span-2 flex justify-center md:justify-start">
                    <div class="w-24 h-24 rounded-2xl bg-slate-100 flex items-center justify-center text-slate-300 flex-shrink-0 overflow-hidden">
                        @if($item->food->image)
                        <img src="{{ Str::startsWith($item->food->image, ['http', 'https']) ? $item->food->image : asset('Food_Items/'.$item->food->image) }}" class="w-full h-full object-cover">
                        @else
                        <span class="material-symbols-outlined text-4xl">lunch_dining</span>
                        @endif
                    </div>
                </div>

                <div class="md:col-span-4 text-center md:text-left">
                    <h3 class="font-black text-xl text-slate-900 mb-1 truncate" title="{{ $item->food->name }}">{{ $item->food->name }}</h3>
                    <p class="text-[#f48c25] font-bold">${{ $item->food->price }}</p>
                </div>

                <div class="md:col-span-3 flex justify-center md:justify-start">
                    <div class="flex items-center gap-3 bg-slate-50 px-4 py-2 rounded-xl border border-slate-200">
                        <a href="{{ route('cart.decrement', $item->id) }}" class="cart-control w-6 h-6 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center hover:bg-[#f48c25] hover:text-white transition-all shadow-sm">
                            <span class="font-bold text-lg leading-none mb-0.5">-</span>
                        </a>
                        <span id="qty-{{ $item->id }}" class="font-black text-slate-900 w-6 text-center">{{ $item->quantity }}</span>
                        <a href="{{ route('cart.increment', $item->id) }}" class="cart-control w-6 h-6 rounded-full bg-slate-200 text-slate-600 flex items-center justify-center hover:bg-[#f48c25] hover:text-white transition-all shadow-sm">
                            <span class="font-bold text-lg leading-none mb-0.5">+</span>
                        </a>
                    </div>
                </div>

                <div class="md:col-span-2 text-center md:text-left">
                    <div class="font-black text-xl text-slate-900">
                        $<span id="total-{{ $item->id }}">{{ $item->food->price * $item->quantity }}</span>
                    </div>
                </div>

                <div class="md:col-span-1 flex justify-center md:justify-end">
                    <a href="{{ route('cart.remove', $item->id) }}" class="cart-remove w-10 h-10 rounded-full bg-red-50 text-red-500 flex items-center justify-center hover:bg-red-500 hover:text-white transition-all shadow-sm" title="Remove">
                        <span class="material-symbols-outlined text-sm">delete</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-orange-500/10 border border-slate-100 lg:sticky lg:top-32">
            <h3 class="font-black text-2xl text-slate-900 mb-8">Order Summary</h3>

            <div class="space-y-4 mb-8">
                <div class="flex justify-between items-center text-slate-500 font-medium">
                    <span>Subtotal</span>
                    <span class="text-slate-900 font-bold">$<span id="cart-subtotal">{{ $total }}</span></span>
                </div>

                @php
                $shipping = $total > 200 ? 0 : 100;
                @endphp

                <div class="flex justify-between items-center text-slate-500 font-medium">
                    <span>Delivery Fee</span>
                    <span id="cart-shipping-container">
                        @if($shipping == 0)
                        <span class="text-green-600 font-bold">Free</span>
                        @else
                        <span class="text-slate-900 font-bold display-shipping">$<span id="cart-shipping">{{ $shipping }}</span></span>
                        @endif
                    </span>
                </div>

                <div id="free-shipping-note" class="text-xs text-slate-400 mt-1 {{ $shipping == 0 ? 'hidden' : '' }}">
                    Add $<span id="shipping-diff">{{ 200 - $total }}</span> more for free shipping
                </div>


                <div class="h-px bg-slate-100 my-4"></div>
                <div class="flex justify-between items-center text-xl font-black text-slate-900">
                    <span>Total</span>
                    <span>$<span id="cart-total">{{ $total + $shipping }}</span></span>
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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        function updateBadge(count) {
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

        async function handleCartAction(e) {
            e.preventDefault();
            const link = e.currentTarget;
            if (link.classList.contains('disabled')) return;

            link.classList.add('disabled', 'opacity-50');

            try {
                const response = await fetch(link.href, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });

                if (response.ok) {
                    const data = await response.json();

                    if (data.is_empty) {
                        window.location.reload();
                        return;
                    }

                    updateBadge(data.cart_count);

                    if (link.classList.contains('cart-remove')) {
                        const row = document.getElementById('cart-item-' + link.href.split('/').pop()); 
                        const rowEl = link.closest('[id^="cart-item-"]');
                        if (rowEl) {
                            rowEl.style.transition = 'all 0.3s ease';
                            rowEl.style.opacity = '0';
                            rowEl.style.transform = 'translateX(20px)';
                            setTimeout(() => rowEl.remove(), 300);
                        }
                    } else {
                        if (data.item_id) {
                            const qtyEl = document.getElementById('qty-' + data.item_id);
                            const totalEl = document.getElementById('total-' + data.item_id);
                            if (qtyEl) qtyEl.textContent = data.item_quantity;
                            if (totalEl) totalEl.textContent = data.item_total;
                        }
                    }

                    const subtotalEl = document.getElementById('cart-subtotal');
                    const totalEl = document.getElementById('cart-total');
                    if (subtotalEl) subtotalEl.textContent = data.subtotal;
                    if (totalEl) totalEl.textContent = data.total;

                    const shippingContainer = document.getElementById('cart-shipping-container');
                    const note = document.getElementById('free-shipping-note');

                    if (data.shipping == 0) {
                        if (shippingContainer) shippingContainer.innerHTML = '<span class="text-green-600 font-bold">Free</span>';
                        if (note) note.classList.add('hidden');
                    } else {
                        if (shippingContainer) shippingContainer.innerHTML = '<span class="text-slate-900 font-bold display-shipping">$<span id="cart-shipping">' + data.shipping + '</span></span>';
                        if (note) {
                            note.classList.remove('hidden');
                            const diffEl = document.getElementById('shipping-diff');
                            if (diffEl) diffEl.textContent = (200 - data.subtotal);
                        }
                    }
                }
            } catch (error) {
                console.error("Cart Error", error);
            } finally {
                link.classList.remove('disabled', 'opacity-50');
            }
        }

        document.querySelectorAll('.cart-control, .cart-remove').forEach(btn => {
            btn.addEventListener('click', handleCartAction);
        });
    });
</script>
@endsection