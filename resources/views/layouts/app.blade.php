<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Foodie - Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f8f7f5] text-[#1c140d]">

    @include('partials.header')

    <section class="p-6 lg:px-20 lg:py-10">
        <div class="rounded-[2.5rem] bg-[#1c140d] min-h-[550px] flex items-center p-8 lg:p-16 text-white relative overflow-hidden"
             style="background-image: linear-gradient(to right, rgba(0,0,0,0.7), transparent), url('https://images.unsplash.com/photo-1544025162-d76694265947?w=1200'); background-size: cover;">
            <div class="max-w-xl relative z-10">
                <h1 class="text-5xl lg:text-7xl font-black mb-6 leading-tight">Crave It.<br>Order It.<br><span class="text-[#f48c25]">Enjoy It.</span></h1>
                <p class="text-lg mb-8 opacity-90">Delicious meals from your favorite local restaurants delivered straight to your door. Fresh, fast, and always flavorful.</p>
                <a href="{{ route('shop') }}" class="bg-[#f48c25] px-8 py-4 rounded-2xl font-extrabold flex items-center w-fit gap-2 hover:scale-105 transition-transform shadow-lg shadow-[#f48c25]/30">
                    Order Now <span class="material-symbols-outlined text-lg">arrow_forward</span>
                </a>
            </div>
        </div>
    </section>

    <section class="py-20 px-6 lg:px-20 text-center">
        <h2 class="text-3xl font-black mb-2">Why Choose Us</h2>
        <div class="h-1.5 w-12 bg-[#f48c25] mx-auto mb-6 rounded-full"></div>
        <p class="text-slate-500 max-w-2xl mx-auto mb-16">We're redefining food delivery with a focus on quality, speed, and your complete satisfaction.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-[1200px] mx-auto">
            <div class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                <div class="bg-[#f48c25]/10 w-14 h-14 rounded-2xl flex items-center justify-center mx-auto mb-6 text-[#f48c25]">
                    <span class="material-symbols-outlined text-3xl">local_shipping</span>
                </div>
                <h3 class="font-bold text-xl mb-3">Fast Delivery</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Our fleet of professional couriers ensures your food arrives hot and fresh to your doorstep in minutes.</p>
            </div>
            <div class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                <div class="bg-[#f48c25]/10 w-14 h-14 rounded-2xl flex items-center justify-center mx-auto mb-6 text-[#f48c25]">
                    <span class="material-symbols-outlined text-3xl">restaurant</span>
                </div>
                <h3 class="font-bold text-xl mb-3">Quality Food</h3>
                <p class="text-sm text-slate-500 leading-relaxed">We partner with top-rated local chefs who use only the finest ingredients to prepare your meals.</p>
            </div>
            <div class="bg-white p-10 rounded-[2.5rem] shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                <div class="bg-[#f48c25]/10 w-14 h-14 rounded-2xl flex items-center justify-center mx-auto mb-6 text-[#f48c25]">
                    <span class="material-symbols-outlined text-3xl">distance</span>
                </div>
                <h3 class="font-bold text-xl mb-3">Easy Tracking</h3>
                <p class="text-sm text-slate-500 leading-relaxed">Stay updated at every step. Follow your meal's journey from the kitchen to your table in real-time.</p>
            </div>
        </div>
    </section>

    <section class="px-6 lg:px-20 pb-20">
        <div class="bg-[#f48c25] rounded-[3rem] p-12 lg:p-24 text-center text-white relative overflow-hidden">
            <div class="relative z-10">
                <h2 class="text-4xl lg:text-5xl font-black mb-6">Ready to satisfy your hunger?</h2>
                <p class="mb-10 opacity-90 text-lg max-w-2xl mx-auto">Join thousands of food lovers and start ordering today. Your favorite meal is just a few clicks away.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('shop') }}" class="bg-white text-[#f48c25] px-10 py-4 rounded-2xl font-bold hover:bg-slate-50 transition-colors shadow-lg">Get Started</a>
                    <a href="{{ route('shop') }}" class="border-2 border-white/30 px-10 py-4 rounded-2xl font-bold hover:bg-white/10 transition-colors">View Menu</a>
                </div>
            </div>
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
        </div>
    </section>

    @include('partials.footer')

</body>
</html>
