<footer class="bg-white border-t border-[#f4ede7] pt-16 pb-8 mt-auto">
    <div class="max-w-7xl mx-auto px-6 lg:px-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-y-12 gap-x-8 mb-16">

            <div class="space-y-5">
                <div class="flex items-center gap-2">
                    <div class="bg-[#f48c25] p-1.5 rounded-lg text-white">
                        <span class="material-symbols-outlined text-xl">restaurant</span>
                    </div>
                    <span class="text-xl font-extrabold text-[#1c140d]">FoodieDash</span>
                </div>
                <p class="text-slate-500 text-sm leading-relaxed pr-4">
                    Delicious meals from your favorite restaurants delivered straight to your door. Energetic, fast, and always fresh.
                </p>
            </div>

            <div>
                <h4 class="text-[#1c140d] font-bold text-sm mb-6 uppercase tracking-wider">Explore</h4>
                <ul class="space-y-3 text-sm font-semibold text-slate-500">
                    <li><a href="#" class="hover:text-[#f48c25] transition-all">Offers Near Me</a></li>
                    <li><a href="#" class="hover:text-[#f48c25] transition-all">Popular Restaurants</a></li>
                    <li><a href="#" class="hover:text-[#f48c25] transition-all">New on FoodieDash</a></li>
                    <li><a href="#" class="hover:text-[#f48c25] transition-all">Gift Cards</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-[#1c140d] font-bold text-sm mb-6 uppercase tracking-wider">Support</h4>
                <ul class="space-y-3 text-sm font-semibold text-slate-500">
                    <li><a href="{{ route('contact') }}" class="hover:text-[#f48c25] transition-all">Help Center</a></li>
                    <li><a href="#" class="hover:text-[#f48c25] transition-all">Safety Information</a></li>
                    <li><a href="#" class="hover:text-[#f48c25] transition-all">Cancellation Options</a></li>
                    <li><a href="#" class="hover:text-[#f48c25] transition-all">Refund Policy</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-[#1c140d] font-bold text-sm mb-6 uppercase tracking-wider">Join Us</h4>
                <ul class="space-y-3 text-sm font-semibold text-slate-500">
                    <li><a href="#" class="hover:text-[#f48c25] transition-all">Become a Driver</a></li>
                    <li><a href="#" class="hover:text-[#f48c25] transition-all">Add your Restaurant</a></li>
                    <li><a href="#" class="hover:text-[#f48c25] transition-all">Business Accounts</a></li>
                    <li><a href="#" class="hover:text-[#f48c25] transition-all">Careers</a></li>
                </ul>
            </div>
        </div>

        <div class="pt-8 border-t border-[#f4ede7] flex flex-col md:flex-row justify-between items-center gap-6">
            <p class="text-slate-400 text-[11px] font-bold tracking-tight">
                © {{ date('Y') }} FoodieDash Inc. All rights reserved.
            </p>

            <div class="flex items-center gap-5 text-slate-400">
                <a href="#" class="hover:text-[#f48c25] transition-colors"><span class="material-symbols-outlined text-lg">language</span></a>
                <a href="#" class="hover:text-[#f48c25] transition-colors"><span class="material-symbols-outlined text-lg">share</span></a>
                <a href="#" class="hover:text-[#f48c25] transition-colors"><span class="material-symbols-outlined text-lg">alternate_email</span></a>
            </div>
        </div>
    </div>
</footer>
