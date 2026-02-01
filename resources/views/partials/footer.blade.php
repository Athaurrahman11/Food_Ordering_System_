<footer class="bg-[#1c140d] text-white/80 border-t border-white/5 pt-20 pb-10 mt-auto font-body">
    <div class="max-w-[1440px] mx-auto px-6 lg:px-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-y-12 gap-x-8 mb-20">

             <!-- Brand -->
            <div class="lg:col-span-4 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="bg-gradient-to-br from-orange-500 to-red-600 p-2.5 rounded-xl text-white shadow-lg shadow-orange-900/20">
                        <span class="material-symbols-outlined text-2xl">restaurant</span>
                    </div>
                    <span class="text-3xl font-black text-white tracking-tight">Foodie<span class="text-orange-500">.</span></span>
                </div>
                <p class="text-slate-400 text-lg leading-relaxed pr-6 max-w-sm">
                    Delicious meals from your favorite local restaurants delivered straight to your door. Energetic, fast, and always fresh.
                </p>
                <div class="flex items-center gap-4 pt-4">
                     <a href="#" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center hover:bg-orange-600 hover:border-orange-600 hover:text-white transition-all duration-300">
                         <span class="material-symbols-outlined text-lg">facebook</span>
                     </a>
                     <a href="#" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center hover:bg-orange-600 hover:border-orange-600 hover:text-white transition-all duration-300">
                         <span class="material-symbols-outlined text-lg">public</span>
                     </a>
                     <a href="#" class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center hover:bg-orange-600 hover:border-orange-600 hover:text-white transition-all duration-300">
                         <span class="material-symbols-outlined text-lg">alternate_email</span>
                     </a>
                </div>
            </div>

            <!-- Links 1 -->
            <div class="lg:col-span-2 lg:col-start-6">
                <h4 class="text-white font-bold text-lg mb-8">Explore</h4>
                <ul class="space-y-4 font-medium text-slate-400">
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Offers Near Me</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Popular Restaurants</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> New on Foodie</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Gift Cards</a></li>
                </ul>
            </div>

            <!-- Links 2 -->
            <div class="lg:col-span-2">
                <h4 class="text-white font-bold text-lg mb-8">Support</h4>
                <ul class="space-y-4 font-medium text-slate-400">
                    <li><a href="{{ route('contact') }}" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Help Center</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Safety Information</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Cancellation Options</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Refund Policy</a></li>
                </ul>
            </div>

            <!-- Links 3 -->
             <div class="lg:col-span-2">
                <h4 class="text-white font-bold text-lg mb-8">Join Us</h4>
                <ul class="space-y-4 font-medium text-slate-400">
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Become a Driver</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Add your Restaurant</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Business Accounts</a></li>
                    <li><a href="#" class="hover:text-orange-500 transition-colors flex items-center gap-2 group"><span class="w-1.5 h-1.5 rounded-full bg-orange-500 opacity-0 group-hover:opacity-100 transition-opacity"></span> Careers</a></li>
                </ul>
            </div>
        </div>

        <div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-slate-500 text-sm font-medium">
                © {{ date('Y') }} Foodie Inc. All rights reserved.
            </p>
            <div class="flex items-center gap-8 text-sm font-medium text-slate-500">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-white transition-colors">Cookies Settings</a>
            </div>
        </div>
    </div>
</footer>
