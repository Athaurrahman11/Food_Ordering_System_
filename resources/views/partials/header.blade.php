<header class="sticky top-0 z-50 bg-white/80 backdrop-blur-lg px-6 py-4 lg:px-20 border-b border-slate-100/50 flex justify-between items-center transition-all duration-300">

    <a href="{{ route('home') }}" class="flex items-center gap-3 group">
        <img src="{{ asset('images/logo.svg') }}" class="w-10 h-10 rounded-full shadow-lg shadow-orange-500/20 group-hover:scale-110 transition-transform">
        <span class="text-2xl font-black text-[#1c140d] tracking-tight">DineNexus</span>
    </a>

    <nav class="hidden md:flex items-center gap-10 text-sm font-bold">
        <a href="{{ route('user.home') }}" class="text-[#f48c25] relative after:content-[''] after:absolute after:-bottom-1 after:left-0 after:w-full after:h-0.5 after:bg-[#f48c25] after:rounded-full">Home</a>
        <a href="{{ route('shop') }}" class="text-slate-500 hover:text-[#f48c25] transition-colors duration-200">Shop</a>
        <a href="{{ route('about')}}" class="text-slate-500 hover:text-[#f48c25] transition-colors duration-200">About</a>
        <a href="{{ route('contact') }}" class="text-slate-500 hover:text-[#f48c25] transition-colors duration-200">Contact</a>
        <a href="{{ route('tracking') }}" class="text-slate-500 hover:text-[#f48c25] transition-colors duration-200">Tracking</a>
    </nav>

    <div class="flex items-center gap-6">
        <a href="{{ route('login') }}" class="text-sm font-bold text-[#f48c25] hover:opacity-70 transition-opacity">Login</a>

        <a href="{{ route('cart.view') }}" class="bg-[#f48c25] text-white px-6 py-2.5 rounded-2xl font-bold text-sm flex items-center gap-2 shadow-xl shadow-[#f48c25]/20 hover:scale-[1.03] active:scale-[0.97] transition-all">
            <span class="material-symbols-outlined text-xl">shopping_cart</span>
            <span>Cart</span>
        </a>

        <button class="md:hidden text-slate-600">
            <span class="material-symbols-outlined text-3xl">menu</span>
        </button>
    </div>
</header>
