@extends('home.layouts.app')
@section('content')
<div class="fixed inset-0 z-0 pointer-events-none opacity-40">
    <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-orange-100/40 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-[800px] h-[800px] bg-blue-100/40 rounded-full blur-[100px] translate-y-1/2 -translate-x-1/2"></div>
</div>
<section class="relative min-h-[50vh] flex items-center justify-center pt-32 pb-20 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/contact_image.avif') }}" class="w-full h-full object-cover scale-105 animate-pulse" style="animation-duration: 20s">
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-[2px]"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#fffbf7] via-transparent to-transparent"></div>
    </div>

    <div class="relative z-10 text-center max-w-4xl mx-auto px-6 animate-float">
        <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md px-4 py-2 rounded-full shadow-lg border border-white/20 mb-6 hover:bg-white/20 transition-colors cursor-pointer">
            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
            <span class="text-xs font-bold text-white uppercase tracking-wide">We're Online</span>
        </div>

        <h1 class="text-5xl lg:text-7xl font-black text-white tracking-tight mb-6 drop-shadow-2xl">
            Get in <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f48c25] to-yellow-400">Touch</span>
        </h1>
        <p class="text-xl text-slate-200 font-body max-w-xl mx-auto leading-relaxed drop-shadow-md">
            Have a question, feedback, or an issue with an order? We’re here to help you.
        </p>
    </div>
</section>

<main class="max-w-[1440px] mx-auto px-6 pb-24 lg:px-20 w-full relative z-10 -mt-20">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

        <div class="lg:col-span-7">
            <div class="bg-white shadow-xl border border-slate-100 p-8 lg:p-12 rounded-[3rem] relative overflow-hidden group">
                <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-orange-100/50 to-transparent rounded-full blur-3xl -translate-y-1/2 translate-x-1/3 group-hover:bg-orange-200/50 transition-colors duration-700"></div>

                <h2 class="font-black text-3xl text-slate-900 mb-8 flex items-center gap-3 relative z-10">
                    Send a Message
                </h2>

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6 relative z-10">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2 group/input">
                            <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1 group-focus-within/input:text-[#f48c25] transition-colors">Your Name</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within/input:text-[#f48c25] transition-colors">person</span>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="John Doe" required class="w-full bg-slate-50/50 border border-slate-200 rounded-2xl pl-14 pr-5 py-4.5 outline-none focus:border-[#f48c25] focus:bg-white focus:shadow-[0_10px_30px_-10px_rgba(244,140,37,0.2)] transition-all font-bold text-slate-800 placeholder:font-medium placeholder:text-slate-400 @error('name') border-red-500 @enderror">
                            </div>
                            @error('name')
                                <p class="text-red-500 text-xs mt-1 font-bold ml-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="space-y-2 group/input">
                            <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1 group-focus-within/input:text-[#f48c25] transition-colors">Email Address</label>
                            <div class="relative">
                                <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within/input:text-[#f48c25] transition-colors">mail</span>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="john@example.com" required class="w-full bg-slate-50/50 border border-slate-200 rounded-2xl pl-14 pr-5 py-4.5 outline-none focus:border-[#f48c25] focus:bg-white focus:shadow-[0_10px_30px_-10px_rgba(244,140,37,0.2)] transition-all font-bold text-slate-800 placeholder:font-medium placeholder:text-slate-400 @error('email') border-red-500 @enderror">
                            </div>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1 font-bold ml-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="space-y-2 group/input">
                        <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1 group-focus-within/input:text-[#f48c25] transition-colors">Phone Number</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within/input:text-[#f48c25] transition-colors">call</span>
                            <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+1 (555) 000-0000" class="w-full bg-slate-50/50 border border-slate-200 rounded-2xl pl-14 pr-5 py-4.5 outline-none focus:border-[#f48c25] focus:bg-white focus:shadow-[0_10px_30px_-10px_rgba(244,140,37,0.2)] transition-all font-bold text-slate-800 placeholder:font-medium placeholder:text-slate-400 @error('phone') border-red-500 @enderror">
                        </div>
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1 font-bold ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2 group/input">
                        <label class="text-xs font-black text-slate-400 uppercase tracking-widest ml-1 group-focus-within/input:text-[#f48c25] transition-colors">Message</label>
                        <div class="relative">
                            <span class="material-symbols-outlined absolute left-5 top-6 text-slate-400 group-focus-within/input:text-[#f48c25] transition-colors">chat</span>
                            <textarea name="message" rows="5" placeholder="How can we help you?" required class="w-full bg-slate-50/50 border border-slate-200 rounded-2xl pl-14 pr-5 py-4.5 outline-none focus:border-[#f48c25] focus:bg-white focus:shadow-[0_10px_30px_-10px_rgba(244,140,37,0.2)] transition-all font-bold text-slate-800 placeholder:font-medium placeholder:text-slate-400 resize-none @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                        </div>
                        @error('message')
                            <p class="text-red-500 text-xs mt-1 font-bold ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-slate-900 to-slate-800 text-white py-5 rounded-2xl font-black text-sm uppercase tracking-widest hover:from-[#f48c25] hover:to-orange-600 hover:shadow-xl hover:shadow-[#f48c25]/30 hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2 group/btn relative overflow-hidden">
                        <div class="absolute inset-0 bg-white/20 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-300"></div>
                        <span class="relative z-10">Send Message</span>
                        <span class="material-symbols-outlined relative z-10 group-hover/btn:translate-x-1 transition-transform">send</span>
                    </button>


                </form>
            </div>

            <div class="mt-8">
                <h3 class="font-black text-xl text-slate-900 mb-6 px-4">Frequently Asked Questions</h3>
                <div class="space-y-4">
                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 hover:shadow-lg hover:shadow-slate-200/50 transition-all duration-300">
                        <h4 class="font-bold text-slate-900 text-sm mb-2 flex items-center gap-2">
                            <span class="material-symbols-outlined text-[#f48c25] text-lg">schedule</span>
                            What are your operating hours?
                        </h4>
                        <p class="text-slate-500 text-sm font-body leading-relaxed pl-7">We are open from 10:00 AM to 11:00 PM, Monday through Sunday. Holiday hours may vary.</p>
                    </div>

                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 hover:shadow-lg hover:shadow-slate-200/50 transition-all duration-300">
                        <h4 class="font-bold text-slate-900 text-sm mb-2 flex items-center gap-2">
                            <span class="material-symbols-outlined text-[#f48c25] text-lg">local_shipping</span>
                            How can I track my order?
                        </h4>
                        <p class="text-slate-500 text-sm font-body leading-relaxed pl-7">You can track your order in real-time through the "My Orders" section in your dashboard or via the mobile app.</p>
                    </div>

                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100 hover:shadow-lg hover:shadow-slate-200/50 transition-all duration-300">
                        <h4 class="font-bold text-slate-900 text-sm mb-2 flex items-center gap-2">
                            <span class="material-symbols-outlined text-[#f48c25] text-lg">currency_exchange</span>
                            Do you offer refunds?
                        </h4>
                        <p class="text-slate-500 text-sm font-body leading-relaxed pl-7">Yes, if there is an issue with your order (missing items, wrong dish), please contact us within 30 minutes for a resolution.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:col-span-5 space-y-6">

            <div class="bg-white shadow-xl border border-slate-100 p-8 rounded-[2.5rem] relative overflow-hidden">
                <h3 class="font-black text-xl text-slate-900 mb-8">Contact Details</h3>

                <ul class="space-y-6 relative z-10">
                    <li class="flex items-start gap-5 group">
                        <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-[#f48c25] flex-shrink-0 shadow-sm border border-slate-100 group-hover:bg-[#f48c25] group-hover:text-white transition-all duration-300 group-hover:scale-110">
                            <span class="material-symbols-outlined text-xl">location_on</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm mb-1">Our Location</h4>
                            <p class="text-slate-500 text-sm font-body">123 Galle Road,<br>Colombo 03, Sri Lanka</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-5 group">
                        <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-[#f48c25] flex-shrink-0 shadow-sm border border-slate-100 group-hover:bg-[#f48c25] group-hover:text-white transition-all duration-300 group-hover:scale-110">
                            <span class="material-symbols-outlined text-xl">call</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm mb-1">Phone Number</h4>
                            <p class="text-slate-500 text-sm font-body">+1 (555) 123-4567</p>
                        </div>
                    </li>
                    <li class="flex items-start gap-5 group">
                        <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-[#f48c25] flex-shrink-0 shadow-sm border border-slate-100 group-hover:bg-[#f48c25] group-hover:text-white transition-all duration-300 group-hover:scale-110">
                            <span class="material-symbols-outlined text-xl">mail</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm mb-1">Email Address</h4>
                            <p class="text-slate-500 text-sm font-body">support@dinenexus.com</p>
                        </div>
                    </li>
                </ul>

                <div class="h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent my-8"></div>

                <h4 class="font-black text-xs text-slate-400 uppercase tracking-widest mb-4">Quick Actions</h4>
                <div class="grid grid-cols-3 gap-3">
                    <a href="tel:+15551234567" class="flex flex-col items-center justify-center gap-2 bg-white border border-slate-100 p-4 rounded-2xl hover:border-[#f48c25] hover:shadow-lg hover:shadow-[#f48c25]/10 hover:-translate-y-1 transition-all group" title="Call Now">
                        <span class="material-symbols-outlined text-slate-600 group-hover:text-[#f48c25]">call</span>
                        <span class="text-[10px] font-bold text-slate-600 group-hover:text-[#f48c25] uppercase">Call</span>
                    </a>
                    <a href="mailto:support@dinenexus.com" class="flex flex-col items-center justify-center gap-2 bg-white border border-slate-100 p-4 rounded-2xl hover:border-[#f48c25] hover:shadow-lg hover:shadow-[#f48c25]/10 hover:-translate-y-1 transition-all group" title="Email Support">
                        <span class="material-symbols-outlined text-slate-600 group-hover:text-[#f48c25]">mail</span>
                        <span class="text-[10px] font-bold text-slate-600 group-hover:text-[#f48c25] uppercase">Email</span>
                    </a>
                    <a href="https://maps.google.com" target="_blank" class="flex flex-col items-center justify-center gap-2 bg-white border border-slate-100 p-4 rounded-2xl hover:border-[#f48c25] hover:shadow-lg hover:shadow-[#f48c25]/10 hover:-translate-y-1 transition-all group" title="Get Directions">
                        <span class="material-symbols-outlined text-slate-600 group-hover:text-[#f48c25]">map</span>
                        <span class="text-[10px] font-bold text-slate-600 group-hover:text-[#f48c25] uppercase">Map</span>
                    </a>
                </div>
            </div>

            <div class="bg-slate-900 p-8 rounded-[2.5rem] shadow-xl shadow-slate-900/20 text-white relative overflow-hidden group hover:scale-[1.02] transition-transform duration-500">
                <div class="absolute top-0 right-0 w-40 h-40 bg-[#f48c25] rounded-full blur-[60px] opacity-20 group-hover:opacity-40 transition-opacity duration-700"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-6">
                        <div class="inline-flex items-center gap-2 bg-white/10 px-3 py-1 rounded-full backdrop-blur-sm">
                            <span class="relative flex h-2.5 w-2.5">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500"></span>
                            </span>
                            <span class="font-bold text-[10px] tracking-widest uppercase">Support Online</span>
                        </div>
                    </div>
                    <h3 class="font-black text-2xl mb-2">Need help?</h3>
                    <p class="text-slate-400 text-sm font-body mb-8 leading-relaxed">Our support team is just a click away to assist you with your order.</p>
                    <button class="w-full bg-[#f48c25] text-white py-4 rounded-xl font-black text-xs uppercase tracking-widest hover:bg-white hover:text-[#f48c25] transition-all shadow-lg hover:shadow-[#f48c25]/40 active:scale-95 flex items-center justify-center gap-2">
                        <span>Start Live Chat</span>
                        <span class="material-symbols-outlined text-sm">chat</span>
                    </button>
                </div>
            </div>

            <div class="flex justify-center gap-4">
                <a href="#" class="w-14 h-14 bg-white rounded-full flex items-center justify-center text-slate-400 border border-slate-100 shadow-sm hover:scale-110 hover:border-[#f48c25] hover:text-[#f48c25] hover:shadow-lg hover:shadow-[#f48c25]/20 transition-all duration-300">
                    <i class="fa fa-facebook text-xl font-bold">f</i>
                </a>
                <a href="#" class="w-14 h-14 bg-white rounded-full flex items-center justify-center text-slate-400 border border-slate-100 shadow-sm hover:scale-110 hover:border-[#f48c25] hover:text-[#f48c25] hover:shadow-lg hover:shadow-[#f48c25]/20 transition-all duration-300">
                    <i class="fa fa-instagram text-xl font-bold">in</i>
                </a>
                <a href="#" class="w-14 h-14 bg-white rounded-full flex items-center justify-center text-slate-400 border border-slate-100 shadow-sm hover:scale-110 hover:border-[#f48c25] hover:text-[#f48c25] hover:shadow-lg hover:shadow-[#f48c25]/20 transition-all duration-300">
                    <i class="fa fa-twitter text-xl font-bold">x</i>
                </a>
            </div>

        </div>
    </div>
</main>

<section class="max-w-[1440px] mx-auto px-6 pb-12 lg:px-20 w-full relative z-10">
    <div class="relative w-full h-[450px] rounded-[3rem] overflow-hidden shadow-2xl shadow-slate-200/50 border border-white group">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63371.80392150338!2d79.8211861053406!3d6.921837369650275!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae253d10f7a7003%3A0x320b2e4d32d3838d!2sColombo%2C%20Sri%20Lanka!5e0!3m2!1sen!2slk!4v1689531234567!5m2!1sen!2slk" width="100%" height="100%" style="border:0; filter: grayscale(100%) invert(0%) contrast(1.1) opacity(0.9);" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="group-hover:filter-none transition-all duration-1000 mx-auto scale-100 group-hover:scale-105"></iframe>

        <div class="absolute bottom-8 left-8 bg-white/95 backdrop-blur-md p-6 rounded-[2rem] shadow-[0_20px_50px_-10px_rgba(0,0,0,0.2)] border border-white/50 max-w-xs animate-fade-in-up hover:scale-105 transition-transform duration-300">
            <div class="flex items-center gap-3 mb-3">
                <span class="w-10 h-10 rounded-full bg-orange-50 flex items-center justify-center text-[#f48c25]">
                    <span class="material-symbols-outlined text-xl filled">storefront</span>
                </span>
                <div>
                    <h4 class="font-black text-slate-900 leading-tight">Main Branch</h4>
                    <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wide">Headquarters</span>
                </div>
            </div>
            <p class="text-xs text-slate-500 font-body mb-4 pl-1">123 Galle Road, Colombo 03, Sri Lanka</p>
            <span class="inline-flex items-center gap-1.5 bg-green-100 text-green-700 px-3 py-1.5 rounded-full text-[10px] font-black uppercase tracking-wide">
                <span class="w-1.5 h-1.5 rounded-full bg-green-600 animate-pulse"></span> Open Now
            </span>
        </div>
    </div>
</section>

<button class="lg:hidden fixed bottom-6 right-6 z-50 bg-[#f48c25] text-white p-4 rounded-full shadow-2xl shadow-orange-500/40 hover:scale-110 transition-transform duration-300 active:scale-90">
    <span class="material-symbols-outlined text-2xl">chat</span>
    <span class="absolute top-0 right-0 flex h-3 w-3">
        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
        <span class="relative inline-flex rounded-full h-3 w-3 bg-green-400 border-2 border-[#f48c25]"></span>
    </span>
</button>

@endsection