<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Your Cart - Foodie</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .font-body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
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
                <a href="{{ route('shop') }}" class="hover:text-[#f48c25] transition-colors relative group">
                    Menu
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#f48c25] transition-all group-hover:w-full"></span>
                </a>
                <a href="#" class="text-[#f48c25] font-bold relative group">
                    Cart
                    <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-[#f48c25] transition-all"></span>
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
                    @if(session('cart'))
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold border-2 border-white animate-bounce">
                        {{ count(session('cart')) }}
                    </span>
                    @endif
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="relative z-10 pt-32 pb-20 px-6 lg:px-20 max-w-[1440px] mx-auto w-full min-h-screen">
        
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl lg:text-5xl font-black text-slate-900 mb-4 tracking-tight">Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f48c25] to-orange-400">Delicious Picks</span></h1>
            <p class="text-slate-500 font-body text-lg">Review your items and proceed to checkout</p>
        </div>

        @if(session('cart') && count(session('cart')) > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            
            <!-- Cart Items List (Left 2 Cols) -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Table Header (Desktop) -->
                <div class="hidden md:grid grid-cols-12 gap-4 px-6 py-3 text-xs font-bold text-slate-400 uppercase tracking-widest border-b border-slate-200/60 pb-4 mx-2">
                    <div class="col-span-6">Product</div>
                    <div class="col-span-2 text-center">Price</div>
                    <div class="col-span-2 text-center">Quantity</div>
                    <div class="col-span-2 text-right">Total</div>
                </div>

                @php $total = 0; @endphp
                @foreach(session('cart') as $id => $details)
                    @php $subtotal = $details['price'] * $details['quantity']; $total += $subtotal; @endphp
                    
                    <div class="glass-card p-4 rounded-[2rem] flex flex-col md:grid md:grid-cols-12 gap-6 items-center hover:shadow-[0_10px_30px_rgba(244,140,37,0.1)] transition-shadow duration-300 group relative overflow-hidden">
                        
                        <!-- Remove Button Absolute -->
                        <a href="{{ route('cart.remove', $id) }}" class="absolute top-4 right-4 md:hidden text-slate-300 hover:text-red-500 p-2">
                            <span class="material-symbols-outlined">delete</span>
                        </a>

                        <!-- Product Info -->
                        <div class="col-span-6 w-full flex items-center gap-6">
                             <div class="w-20 h-20 bg-slate-100 rounded-2xl flex-shrink-0 flex items-center justify-center text-3xl shadow-inner">
                                 <!-- Placeholder Icon if no image in session, otherwise img -->
                                 <span class="material-symbols-outlined text-slate-300 text-4xl">fastfood</span>
                             </div>
                             <div>
                                 <h3 class="font-extrabold text-lg text-slate-900 mb-1 group-hover:text-[#f48c25] transition-colors">{{ $details['name'] }}</h3>
                                 <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">Classic</p>
                                 <a href="{{ route('cart.remove', $id) }}" class="hidden md:inline-flex items-center gap-1 text-xs font-bold text-red-500 mt-2 hover:bg-red-50 px-2 py-1 rounded-lg transition-colors -ml-2">
                                     <span class="material-symbols-outlined text-[14px]">delete</span> Remove
                                 </a>
                             </div>
                        </div>

                        <!-- Price -->
                        <div class="col-span-2 text-center w-full md:w-auto flex justify-between md:block px-4 md:px-0">
                            <span class="md:hidden text-slate-400 font-bold text-sm">Price:</span>
                            <span class="font-bold text-slate-600">${{ $details['price'] }}</span>
                        </div>

                        <!-- Quantity -->
                        <div class="col-span-2 flex justify-center w-full md:w-auto px-4 md:px-0">
                            <div class="flex items-center gap-3 bg-slate-50 rounded-xl px-3 py-1.5 border border-slate-100">
                                <span class="font-bold text-slate-900">{{ $details['quantity'] }}</span>
                            </div>
                        </div>

                        <!-- Subtotal -->
                        <div class="col-span-2 text-right w-full md:w-auto flex justify-between md:block px-4 md:px-0 border-t md:border-t-0 border-slate-100 pt-4 md:pt-0 mt-2 md:mt-0">
                             <span class="md:hidden text-slate-400 font-bold text-sm">Subtotal:</span>
                             <span class="font-black text-lg text-[#f48c25]">${{ $subtotal }}</span>
                        </div>
                    </div>
                @endforeach
                
                <div class="flex justify-between items-center pt-6 px-2">
                    <a href="{{ route('shop') }}" class="flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-[#f48c25] transition-colors group">
                        <span class="material-symbols-outlined text-lg group-hover:-translate-x-1 transition-transform">arrow_back</span>
                        Continue Shopping
                    </a>
                </div>
            </div>

            <!-- Order Summary Sidebar (Right 1 Col) -->
            <div class="lg:col-span-1">
                <div class="glass-card p-8 rounded-[2.5rem] sticky top-32">
                    <h2 class="font-black text-xl text-slate-900 mb-8 border-b border-slate-100 pb-4">Order Summary</h2>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between text-slate-600 font-medium text-sm">
                            <span>Subtotal</span>
                            <span class="font-bold text-slate-900">${{ $total }}</span>
                        </div>
                        <div class="flex justify-between text-slate-600 font-medium text-sm">
                            <span>Delivery Fee</span>
                            <span class="font-bold text-green-600">Free</span>
                        </div>
                        <div class="flex justify-between text-slate-600 font-medium text-sm">
                            <span>Tax (5%)</span>
                            <span class="font-bold text-slate-900">${{ number_format($total * 0.05, 2) }}</span>
                        </div>
                    </div>
                    
                    <div class="flex justify-between items-center pt-6 border-t border-dashed border-slate-200 mb-8">
                        <span class="font-black text-lg text-slate-900">Total</span>
                        <span class="font-black text-2xl text-[#f48c25]">${{ number_format($total * 1.05, 2) }}</span>
                    </div>
                    
                    <a href="{{ route('checkout') }}" class="w-full bg-gradient-to-r from-slate-900 to-slate-800 text-white py-4 rounded-2xl font-black text-sm uppercase tracking-widest hover:from-[#f48c25] hover:to-orange-600 hover:shadow-xl hover:shadow-[#f48c25]/30 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2 group relative overflow-hidden">
                        <span class="relative z-10">Checkout</span> 
                        <span class="material-symbols-outlined relative z-10 group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                    
                    <div class="mt-6 text-center">
                        <p class="text-xs text-slate-400 font-bold flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-sm">lock</span> Secure Checkout
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
        @else
        <!-- Empty State -->
        <div class="glass-card max-w-lg mx-auto p-12 rounded-[3rem] text-center">
            <div class="w-32 h-32 bg-orange-50 rounded-full flex items-center justify-center mx-auto mb-8 animate-pulse text-orange-200">
                <span class="material-symbols-outlined text-6xl text-[#f48c25]">shopping_basket</span>
            </div>
            <h2 class="font-black text-2xl text-slate-900 mb-4">Your Cart is Empty</h2>
            <p class="text-slate-500 font-body mb-8 leading-relaxed">Looks like you haven't added any delicious meals yet. Browse our menu to satisfy your cravings!</p>
            <a href="{{ route('shop') }}" class="inline-flex items-center gap-2 bg-[#f48c25] text-white px-8 py-4 rounded-2xl font-bold uppercase tracking-widest hover:bg-orange-600 hover:shadow-lg hover:-translate-y-1 transition-all">
                Browse Menu <span class="material-symbols-outlined text-sm">restaurant_menu</span>
            </a>
        </div>
        @endif

    </main>
    
    @include('partials.footer')

</body>
</html>
