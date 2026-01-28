<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/><meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Contact Support - FoodieSystem</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-[#fcfaf8] h-screen overflow-hidden flex flex-col">

    <div class="flex-none">
        @include('partials.header')
    </div>

    <div class="flex flex-1 overflow-hidden">

        <div class="hidden lg:flex lg:w-1/2 bg-[#1c140d] relative items-center justify-center p-12 overflow-hidden">
            <div class="absolute inset-0 opacity-30" style="background-image: url('https://images.unsplash.com/photo-1534536281715-e28d76689b4d?w=1200'); background-size: cover;"></div>
            <div class="relative z-10 text-white max-w-md">
                <div class="flex items-center gap-2 mb-6">
                    <div class="bg-[#f48c25] p-2 rounded-xl text-white">
                        <span class="material-symbols-outlined">headset_mic</span>
                    </div>
                    <span class="text-xl font-bold">FoodieHelp</span>
                </div>
                <h1 class="text-5xl font-black leading-tight mb-4 tracking-tight">We're here to help.</h1>
                <p class="text-lg opacity-70 mb-8">Order issues? Refunds? We respond faster than your pizza gets cold.</p>

                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center border border-white/20">
                        <span class="material-symbols-outlined text-sm">call</span>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-[#f48c25] uppercase tracking-widest">Call Us</p>
                        <p class="font-bold text-sm">+1 (555) 123-4567</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex flex-col items-center justify-center p-6 bg-[#fcfaf8] overflow-y-auto no-scrollbar">
            <div class="max-w-[460px] w-full bg-white rounded-[2.5rem] border border-slate-200 shadow-sm p-8 md:p-10">

                <div class="mb-6 text-center">
                    <h2 class="text-2xl font-extrabold text-[#1c140d] tracking-tight">Send a Message</h2>
                    <p class="text-slate-400 text-[10px] mt-1 font-semibold uppercase tracking-wider">Estimated reply: 15 mins</p>
                </div>

                <form action="#" method="POST" class="space-y-4">
                    @csrf
                    <div class="space-y-1">
                        <label class="text-[11px] font-bold text-slate-500 ml-1">Topic</label>
                        <div class="relative">
                            <select class="w-full pl-4 pr-10 py-3.5 rounded-xl bg-[#fdfcfb] border border-[#f4ede7] outline-none focus:border-[#f48c25] appearance-none font-medium text-sm">
                                <option>Current order issue</option>
                                <option>Payment/Refund</option>
                                <option>Account help</option>
                            </select>
                            <span class="material-symbols-outlined absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">expand_more</span>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="text-[11px] font-bold text-slate-500 ml-1">Message</label>
                        <textarea rows="3" placeholder="Describe your issue..."
                                  class="w-full p-4 rounded-xl bg-[#fdfcfb] border border-[#f4ede7] outline-none focus:border-[#f48c25] transition-all font-medium text-sm resize-none"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-[#1c140d] text-white font-black py-4 rounded-xl shadow-lg hover:bg-[#f48c25] transition-all text-sm mt-2 flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-lg">send</span>
                        Send Message
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <a href="{{ route('home') }}" class="text-[11px] font-bold text-slate-400 hover:text-[#f48c25] flex items-center justify-center gap-1 uppercase tracking-widest">
                        <span class="material-symbols-outlined text-base">arrow_back</span>
                        Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
