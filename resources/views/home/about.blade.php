@extends('home.layouts.app')

@section('content')
<section class="relative min-h-[60vh] flex items-center justify-center pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1556910103-1c02745a30bf?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-slate-950/80 backdrop-blur-[2px]"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-slate-950/90 via-slate-900/80 to-[#f48c25]/20"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#fffbf7] via-transparent to-transparent"></div>
    </div>

    <div class="relative z-10 text-center max-w-4xl mx-auto px-6">
        <span class="bg-[#f48c25] text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest shadow-lg shadow-orange-500/30 mb-6 inline-block animate-bounce">Est. 2015</span>
        <h1 class="text-6xl lg:text-8xl font-black text-white tracking-tight mb-6 drop-shadow-lg">
            Taste the <br /><span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f48c25] to-yellow-400">Legacy</span>
        </h1>
        <p class="text-xl text-slate-200 font-body max-w-2xl mx-auto leading-relaxed">
            More than just food, it's a culinary journey rooted in tradition, passion, and the relentless pursuit of perfection.
        </p>
    </div>
</section>

<section class="py-20 px-6 lg:px-20 max-w-[1440px] mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 lg:gap-24">
        <div class="bg-white p-10 rounded-[3rem] shadow-[0_20px_50px_-10px_rgba(0,0,0,0.05)] border border-slate-100 hover:border-[#f48c25]/30 transition-all group relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-orange-50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-orange-100 transition-colors"></div>
            <div class="relative z-10">
                <div class="w-16 h-16 bg-[#f48c25]/10 rounded-2xl flex items-center justify-center text-[#f48c25] mb-8">
                    <span class="material-symbols-outlined text-4xl">rocket_launch</span>
                </div>
                <h2 class="text-3xl font-black text-slate-900 mb-4">Our Mission</h2>
                <p class="text-slate-500 text-lg font-body leading-relaxed">
                    To bring the world's most authentic flavors to your doorstep. We believe that great food has the power to connect people, create memories, and spark joy in everyday life.
                </p>
            </div>
        </div>

        <div class="bg-white p-10 rounded-[3rem] shadow-[0_20px_50px_-10px_rgba(0,0,0,0.05)] border border-slate-100 hover:border-[#f48c25]/30 transition-all group relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-blue-50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-blue-100 transition-colors"></div>
            <div class="relative z-10">
                <div class="w-16 h-16 bg-blue-500/10 rounded-2xl flex items-center justify-center text-blue-600 mb-8">
                    <span class="material-symbols-outlined text-4xl">visibility</span>
                </div>
                <h2 class="text-3xl font-black text-slate-900 mb-4">Our Vision</h2>
                <p class="text-slate-500 text-lg font-body leading-relaxed">
                    To become the global benchmark for culinary excellence and sustainable dining. We envision a future where every meal is a celebration of health, taste, and community.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-slate-900 text-white overflow-hidden relative">
    <div class="absolute top-0 left-0 w-full h-full opacity-10 pointer-events-none" style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-[#f48c25] rounded-full blur-[150px] opacity-20"></div>

    <div class="max-w-[1440px] mx-auto px-6 lg:px-20 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div class="order-2 lg:order-1">
                <div class="relative">
                    <img src="{{ asset('images/story_image.avif') }}" class="rounded-[3rem] shadow-2xl rotate-[-3deg] border-4 border-white/10 hover:rotate-0 transition-transform duration-500">
                    <div class="absolute -bottom-10 -right-10 bg-white p-6 rounded-[2rem] shadow-xl hidden md:block animate-bounce">
                        <div class="text-slate-900 font-black text-4xl">100%</div>
                        <div class="text-[#f48c25] font-bold uppercase tracking-wider text-xs">Organic</div>
                    </div>
                </div>
            </div>

            <div class="order-1 lg:order-2">
                <span class="text-[#f48c25] font-bold uppercase tracking-widest text-sm mb-4 block">Why Choose Us</span>
                <h2 class="text-5xl lg:text-6xl font-black mb-8 leading-tight">Crafting <span class="text-[#f48c25]">Masterpieces</span>, Not Just Meals</h2>
                <p class="text-slate-400 text-lg font-body mb-10 leading-relaxed">
                    Every dish that leaves our kitchen is a work of art. We strictly adhere to farm-to-table principles, ensuring that only the freshest, locally sourced ingredients make it to your plate.
                </p>

                <div class="space-y-6">
                    <div class="flex items-center gap-6 group">
                        <div class="w-14 h-14 bg-white/10 rounded-full flex items-center justify-center group-hover:bg-[#f48c25] transition-colors">
                            <span class="material-symbols-outlined text-2xl">eco</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl mb-1">Sustainable Sourcing</h4>
                            <p class="text-slate-400 text-sm">We support local farmers and eco-friendly practices.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-6 group">
                        <div class="w-14 h-14 bg-white/10 rounded-full flex items-center justify-center group-hover:bg-[#f48c25] transition-colors">
                            <span class="material-symbols-outlined text-2xl">local_shipping</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl mb-1">Express Delivery</h4>
                            <p class="text-slate-400 text-sm">Hot and fresh, delivered in under 30 minutes.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-6 group">
                        <div class="w-14 h-14 bg-white/10 rounded-full flex items-center justify-center group-hover:bg-[#f48c25] transition-colors">
                            <span class="material-symbols-outlined text-2xl">verified</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl mb-1">Quality Guarantee</h4>
                            <p class="text-slate-400 text-sm">If you don't love it, we'll replace it. No questions asked.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-20 px-6 lg:px-20 max-w-[1440px] mx-auto">
    <div class="text-center mb-16">
        <span class="text-[#f48c25] font-bold uppercase tracking-widest text-xs mb-3 block">Meet the Minds</span>
        <h2 class="text-4xl lg:text-5xl font-black text-slate-900">Our Culinary <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f48c25] to-red-600">Heroes</span></h2>
        <div class="w-80 h-1.5 bg-[#f48c25] rounded-full mt-4 mx-auto"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <!-- Team Member 1 -->
        <div class="group relative">
            <div class="h-[400px] rounded-[2.5rem] overflow-hidden relative">
                <img src="{{ asset('images/Chefs/Chef1.png') }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-80"></div>

                <div class="absolute bottom-0 left-0 w-full p-8 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                    <h3 class="text-white font-black text-2xl mb-1">Marco Di Angelo</h3>
                    <p class="text-[#f48c25] font-bold uppercase tracking-widest text-xs mb-4">Executive Chef</p>
                    <p class="text-slate-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                        3-time Michelin Star winner with a passion for fusion cuisine.
                    </p>
                </div>
            </div>
        </div>

        <div class="group relative mt-12 md:mt-0">
            <div class="h-[400px] rounded-[2.5rem] overflow-hidden relative">
                <img src="{{ asset('images/Chefs/Chef2.png') }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-80"></div>

                <div class="absolute bottom-0 left-0 w-full p-8 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                    <h3 class="text-white font-black text-2xl mb-1">Daniel Moretti</h3>
                    <p class="text-[#f48c25] font-bold uppercase tracking-widest text-xs mb-4">CULINARY DIRECTOR</p>
                    <p class="text-slate-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                        2-time Global Food Award winner specializing in contemporary fusion cuisine.
                    </p>
                </div>
            </div>
        </div>

        <div class="group relative">
            <div class="h-[400px] rounded-[2.5rem] overflow-hidden relative">
                <img src="{{ asset('images/Chefs/Chef3.jpg') }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-80"></div>

                <div class="absolute bottom-0 left-0 w-full p-8 translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                    <h3 class="text-white font-black text-2xl mb-1">Arjun Patel</h3>
                    <p class="text-[#f48c25] font-bold uppercase tracking-widest text-xs mb-4">Sous Chef</p>
                    <p class="text-slate-300 text-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-100">
                        Master of knives and flavors, bringing energy to the line.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection