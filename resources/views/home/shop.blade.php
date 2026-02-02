@extends('home.layouts.app')
@section('content')
<div class="fixed inset-0 z-0 pointer-events-none opacity-40">
    <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-orange-100/40 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[800px] h-[800px] bg-blue-100/40 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/2"></div>
</div>


<section class="relative min-h-[50vh] flex items-center justify-center pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/menu_image.avif') }}" class="w-full h-full object-cover animate-pulse" style="animation-duration: 20s">
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
            <div class="bg-white p-6 rounded-[2rem] shadow-xl shadow-slate-200/60 border border-slate-100">
                <h3 class="font-black text-lg mb-4 text-slate-800">Search</h3>
                <div class="relative group">
                    <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-[#f48c25] transition-colors">search</span>
                    <input type="text" placeholder="Search pizza, burgers..." class="w-full pl-12 pr-4 py-4 bg-slate-50 rounded-2xl text-xs font-bold outline-none border border-slate-100 focus:border-[#f48c25] focus:bg-white focus:shadow-[0_0_0_4px_rgba(244,140,37,0.1)] transition-all placeholder:text-slate-400 text-slate-800">
                </div>
            </div>

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
                    'chicken' => 'egg_alt', 
                    'coffee' => 'coffee',
                    ];
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


        <section class="flex-1">
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

            <div id="food-grid-container" class="transition-opacity duration-300">
                @include('home.partials.food_grid')
            </div>
        </section>

    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.getElementById('food-grid-container');

        async function fetchGrid(url) {
            container.style.opacity = '0.5';

            try {
                const response = await fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });

                if (response.ok) {
                    const html = await response.text();
                    container.innerHTML = html;
                    history.pushState(null, '', url);
                }
            } catch (error) {
                console.error('Error fetching grid:', error);
            } finally {
                container.style.opacity = '1';
                if (window.innerWidth < 1024) {
                    container.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        }

        const categoryLinks = document.querySelectorAll('aside a[href^="{{ route("shop") }}"]');
        categoryLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                categoryLinks.forEach(l => {
                    l.classList.remove('bg-[#f48c25]', 'text-white', 'shadow-lg');
                    l.classList.add('hover:bg-slate-50', 'text-slate-600');

                    const iconDiv = l.querySelector('.w-10');
                    if (iconDiv) {
                        iconDiv.classList.remove('bg-white/20');
                        iconDiv.classList.add('bg-white', 'shadow-sm');
                    }
                });

                this.classList.remove('hover:bg-slate-50', 'text-slate-600');
                this.classList.add('bg-[#f48c25]', 'text-white', 'shadow-lg');

                const activeIconDiv = this.querySelector('.w-10');
                if (activeIconDiv) {
                    activeIconDiv.classList.remove('bg-white', 'shadow-sm');
                    activeIconDiv.classList.add('bg-white/20');
                }

                fetchGrid(this.href);
            });
        });

        container.addEventListener('click', function(e) {
            const link = e.target.closest('.pagination a') || e.target.closest('a[href*="page="]');
            if (link) {
                e.preventDefault();
                fetchGrid(link.href);
            }
        });

        window.addEventListener('popstate', () => {
            fetchGrid(window.location.href);
        });
    });
</script>
@endsection