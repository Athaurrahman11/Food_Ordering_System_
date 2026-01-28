<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/><meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>About Us - FoodieSystem</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-[#fcfaf8] text-[#1c140d]">

    @include('partials.header')

    <section class="px-6 lg:px-20 py-12">
        <div class="rounded-[3rem] bg-[#1c140d] min-h-[400px] flex items-center justify-center text-center p-8 text-white relative overflow-hidden shadow-2xl"
             style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1556910103-1c02745aae4d?w=1200'); background-size: cover;">
            <div class="max-w-3xl relative z-10">
                <h1 class="text-4xl lg:text-6xl font-black mb-4">Crafting Culinary Experiences</h1>
                <p class="text-base opacity-80 mb-8 max-w-xl mx-auto">Great food is the foundation of great moments. Since 2014, we've brought high-quality ingredients to your table.</p>
            </div>
        </div>
    </section>

    <section class="px-6 lg:px-20 py-12">
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white py-8 px-6 rounded-3xl border border-slate-100 shadow-sm flex flex-col items-center text-center hover:shadow-md transition-shadow">
                <div class="text-[#f48c25] mb-3"><span class="material-symbols-outlined text-3xl">local_shipping</span></div>
                <h3 class="text-3xl font-black text-[#1c140d]">50k+</h3>
                <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest mt-1">Orders Delivered</p>
            </div>
            <div class="bg-white py-8 px-6 rounded-3xl border border-slate-100 shadow-sm flex flex-col items-center text-center hover:shadow-md transition-shadow">
                <div class="text-[#f48c25] mb-3"><span class="material-symbols-outlined text-3xl">history_edu</span></div>
                <h3 class="text-3xl font-black text-[#1c140d]">10+</h3>
                <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest mt-1">Years Experience</p>
            </div>
            <div class="bg-white py-8 px-6 rounded-3xl border border-slate-100 shadow-sm flex flex-col items-center text-center hover:shadow-md transition-shadow">
                <div class="text-[#f48c25] mb-3"><span class="material-symbols-outlined text-3xl">handshake</span></div>
                <h3 class="text-3xl font-black text-[#1c140d]">100+</h3>
                <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest mt-1">Local Partners</p>
            </div>
        </div>
    </section>

    <section class="px-6 lg:px-20 py-20 text-center">
        <p class="text-[#f48c25] font-black uppercase tracking-[0.3em] text-[10px] mb-3">Our Values</p>
        <h2 class="text-3xl font-black mb-16 text-[#1c140d]">What Drives Us Forward</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 max-w-5xl mx-auto">
            <div class="flex flex-col items-center">
                <div class="w-14 h-14 bg-white rounded-2xl shadow-sm border border-slate-50 flex items-center justify-center text-[#1c140d] mb-6">
                    <span class="material-symbols-outlined">verified</span>
                </div>
                <h4 class="font-bold text-lg mb-3">Quality First</h4>
                <p class="text-slate-500 text-sm leading-relaxed max-w-[250px]">We source only the freshest ingredients from local suppliers for a perfect bite.</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-14 h-14 bg-white rounded-2xl shadow-sm border border-slate-50 flex items-center justify-center text-[#1c140d] mb-6">
                    <span class="material-symbols-outlined">lightbulb</span>
                </div>
                <h4 class="font-bold text-lg mb-3">Innovation</h4>
                <p class="text-slate-500 text-sm leading-relaxed max-w-[250px]">Proprietary tech that makes ordering and tracking your favorite meals faster.</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-14 h-14 bg-white rounded-2xl shadow-sm border border-slate-50 flex items-center justify-center text-[#1c140d] mb-6">
                    <span class="material-symbols-outlined">favorite</span>
                </div>
                <h4 class="font-bold text-lg mb-3">Community</h4>
                <p class="text-slate-500 text-sm leading-relaxed max-w-[250px]">Supporting our local economy by partnering with independent farmers.</p>
            </div>
        </div>
    </section>

    <section class="px-6 lg:px-20 py-20 bg-white rounded-[4rem]">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-black mb-12">Meet the Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="group cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=500&h=600&fit=crop" class="rounded-3xl h-80 w-full object-cover mb-6 group-hover:grayscale transition-all duration-500" alt="Sarah">
                    <h4 class="font-black text-xl mb-1">Sarah Jenkins</h4>
                    <p class="text-[#f48c25] text-[10px] font-black uppercase tracking-widest">Founder & CEO</p>
                </div>
                <div class="group cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1583394293235-4815c47e62ee?w=500&h=600&fit=crop" class="rounded-3xl h-80 w-full object-cover mb-6 group-hover:grayscale transition-all duration-500" alt="Marcus">
                    <h4 class="font-black text-xl mb-1">Marcus Chen</h4>
                    <p class="text-[#f48c25] text-[10px] font-black uppercase tracking-widest">Executive Chef</p>
                </div>
                <div class="group cursor-pointer">
                    <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=500&h=600&fit=crop" class="rounded-3xl h-80 w-full object-cover mb-6 group-hover:grayscale transition-all duration-500" alt="David">
                    <h4 class="font-black text-xl mb-1">David Miller</h4>
                    <p class="text-[#f48c25] text-[10px] font-black uppercase tracking-widest">Head of Operations</p>
                </div>
            </div>
        </div>
    </section>

    <section class="px-6 lg:px-20 py-20">
        <div class="bg-[#f48c25] rounded-[3rem] p-12 text-center text-white shadow-xl shadow-[#f48c25]/20">
            <h2 class="text-3xl font-black mb-4">Ready to Taste the Difference?</h2>
            <div class="flex justify-center gap-4 mt-8">
                <a href="{{ route('shop') }}" class="bg-[#1c140d] px-8 py-3 rounded-xl font-bold text-sm">Explore Menu</a>
                <a href="{{ route('shop') }}" class="bg-white text-[#f48c25] px-8 py-3 rounded-xl font-bold text-sm">Order Now</a>
            </div>
        </div>
    </section>

    @include('partials.footer')

</body>
</html>
