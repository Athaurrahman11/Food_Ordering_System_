<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/><meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Track Order - FoodieSystem</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-[#fcfaf8] min-h-screen pb-12">
        @if(session('success'))
        <div id="success-popup" class="fixed top-10 left-1/2 -translate-x-1/2 z-50 bg-[#1c140d] text-white px-8 py-4 rounded-3xl shadow-2xl flex items-center gap-4 animate-bounce">
            <div class="bg-[#f48c25] p-1 rounded-full">
                <span class="material-symbols-outlined text-sm">check</span>
            </div>
            <p class="font-bold text-sm">{{ session('success') }}</p>
            <button onclick="document.getElementById('success-popup').remove()" class="ml-4 opacity-50 hover:opacity-100">
                <span class="material-symbols-outlined text-sm">close</span>
            </button>
        </div>
    @endif

    <header class="px-6 py-6 lg:px-20 flex justify-between items-center bg-white border-b border-slate-100 mb-10">
        <div class="flex items-center gap-2">
            <div class="bg-[#f48c25] p-2 rounded-xl text-white shadow-lg shadow-[#f48c25]/30">
                <span class="material-symbols-outlined">restaurant</span>
            </div>
            <span class="text-xl font-bold text-[#1c140d]">FoodieSystem</span>
        </div>
        <a href="{{ route('home') }}" class="text-sm font-bold text-slate-400 hover:text-[#f48c25] transition-colors flex items-center gap-1">
            <span class="material-symbols-outlined text-base">arrow_back</span> Back to Home
        </a>
    </header>

    <main class="max-w-[500px] mx-auto px-6">
        <div class="bg-[#1c140d] rounded-[2.5rem] p-8 text-white mb-6 shadow-2xl shadow-slate-900/20 relative overflow-hidden">
            <div class="relative z-10">
                <div class="flex justify-between items-start mb-4">
                    <p class="text-[10px] font-black uppercase tracking-[0.2em] text-[#f48c25]">Order #FD-8829</p>
                    <span class="bg-white/10 px-3 py-1 rounded-full text-[10px] font-bold">On the way</span>
                </div>
                <h1 class="text-3xl font-extrabold mb-1">Arriving in 25 mins</h1>
                <p class="text-sm opacity-60 font-medium">Sit tight! Your food is traveling fast.</p>
            </div>
            <div class="absolute -right-4 -bottom-4 opacity-10 rotate-12">
                <span class="material-symbols-outlined text-[140px]">delivery_dining</span>
            </div>
        </div>

        <div class="bg-white rounded-[2.5rem] border border-slate-200 shadow-sm p-10">
            <h2 class="text-lg font-extrabold text-[#1c140d] mb-10">Tracking History</h2>

            <div class="space-y-10 relative">
                <div class="absolute left-[19px] top-2 bottom-2 w-[2px] bg-slate-100"></div>

                <div class="flex items-start gap-6 relative group">
                    <div class="w-10 h-10 rounded-full bg-[#f48c25] text-white flex items-center justify-center z-10 shadow-lg shadow-[#f48c25]/30 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-xl">check_circle</span>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-[#1c140d]">Order Confirmed</h4>
                        <p class="text-[11px] text-slate-400 font-bold uppercase mt-1">Today at 12:30 PM</p>
                    </div>
                </div>

                <div class="flex items-start gap-6 relative group">
                    <div class="w-10 h-10 rounded-full bg-[#f48c25] text-white flex items-center justify-center z-10 shadow-lg shadow-[#f48c25]/30 group-hover:scale-110 transition-transform">
                        <span class="material-symbols-outlined text-xl">cooking</span>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-[#1c140d]">Preparing your meal</h4>
                        <p class="text-[11px] text-slate-400 font-bold uppercase mt-1">12:45 PM</p>
                    </div>
                </div>

                <div class="flex items-start gap-6 relative group">
                    <div class="w-10 h-10 rounded-full bg-white border-4 border-[#f48c25] text-[#f48c25] flex items-center justify-center z-10 animate-pulse">
                        <span class="material-symbols-outlined text-xl">delivery_dining</span>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-[#1c140d]">Driver is near your location</h4>
                        <p class="text-[11px] text-[#f48c25] font-black uppercase mt-1 tracking-wider">In Progress</p>
                    </div>
                </div>

                <div class="flex items-start gap-6 relative opacity-30">
                    <div class="w-10 h-10 rounded-full bg-slate-50 text-slate-400 flex items-center justify-center z-10 border border-slate-200">
                        <span class="material-symbols-outlined text-xl">home</span>
                    </div>
                    <div>
                        <h4 class="font-extrabold text-slate-400">Successfully Delivered</h4>
                        <p class="text-[11px] text-slate-300 font-bold uppercase mt-1 tracking-wider">Upcoming</p>
                    </div>
                </div>
            </div>

            <a href="{{ route('contact') }}" class="w-full mt-12 py-4 bg-[#fcfaf8] border border-slate-100 rounded-2xl text-slate-600 font-black text-xs hover:bg-[#f48c25] hover:text-white hover:border-[#f48c25] transition-all flex items-center justify-center gap-2 uppercase tracking-widest shadow-sm">
                <span class="material-symbols-outlined text-lg">headset_mic</span>
                Contact Support
            </a>
        </div>
    </main>
</body>
</html>
