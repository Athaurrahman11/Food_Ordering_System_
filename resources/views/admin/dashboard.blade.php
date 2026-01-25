@extends('admin.layout')

@section('content')

<!-- Main Content -->
<main class="flex-1 flex flex-col min-w-0 overflow-hidden">
    <!-- TopNavBar -->
    
    <!-- Dashboard Content -->
    <div class="p-8 overflow-y-auto">
        <div class="mb-8">
            <h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">Dashboard Overview</h2>
            <p class="text-slate-500 dark:text-slate-400 mt-1 mb-4">Welcome back, here's what's happening with your store today.</p>
        </div>
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white dark:bg-slate-800 p-6 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-primary/10 rounded-lg text-primary">
                        <span class="material-symbols-outlined">payments</span>
                    </div>
                    <span class="text-emerald-500 text-xs font-bold flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">trending_up</span> 12.5%
                    </span>
                </div>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Revenue</p>
                <h3 class="text-2xl font-bold mt-1">$12,450.00</h3>
            </div>
            <div class="bg-white dark:bg-slate-800 p-6 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-orange-500/10 rounded-lg text-orange-500">
                        <span class="material-symbols-outlined">shopping_cart</span>
                    </div>
                    <span class="text-emerald-500 text-xs font-bold flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">trending_up</span> 8.2%
                    </span>
                </div>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Orders</p>
                <h3 class="text-2xl font-bold mt-1">1,280</h3>
            </div>
            <div class="bg-white dark:bg-slate-800 p-6 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-blue-500/10 rounded-lg text-blue-500">
                        <span class="material-symbols-outlined">person_add</span>
                    </div>
                    <span class="text-emerald-500 text-xs font-bold flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">trending_up</span> 5.1%
                    </span>
                </div>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Active Customers</p>
                <h3 class="text-2xl font-bold mt-1">842</h3>
            </div>
            <div class="bg-white dark:bg-slate-800 p-6 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-yellow-500/10 rounded-lg text-yellow-500">
                        <span class="material-symbols-outlined">star</span>
                    </div>
                    <span class="text-emerald-500 text-xs font-bold flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">trending_up</span> 0.3%
                    </span>
                </div>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">New Reviews</p>
                <h3 class="text-2xl font-bold mt-1">4.8/5</h3>
            </div>
        </div>
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            <!-- Chart Section -->
            <div class="xl:col-span-2 bg-white dark:bg-slate-800 p-6 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="font-bold text-lg">Order Trends</h3>
                        <p class="text-slate-500 text-sm">Visualizing performance over the last 30 days</p>
                    </div>
                    <select class="bg-slate-100 dark:bg-slate-700 border-none text-xs font-medium rounded-lg px-3 py-2 outline-none">
                        <option>Last 30 Days</option>
                        <option>Last 7 Days</option>
                        <option>This Year</option>
                    </select>
                </div>
                <div class="h-[300px] w-full relative">
                    <!-- SVG Chart Simulation -->
                    <svg class="w-full h-full" preserveaspectratio="none" viewbox="0 0 800 300">
                        <defs>
                            <lineargradient id="chartGradient" x1="0" x2="0" y1="0" y2="1">
                                <stop offset="0%" stop-color="#197fe6" stop-opacity="0.2"></stop>
                                <stop offset="100%" stop-color="#197fe6" stop-opacity="0"></stop>
                            </lineargradient>
                        </defs>
                        <path d="M0 250 Q 100 200 200 230 T 400 150 T 600 100 T 800 50 V 300 H 0 Z" fill="url(#chartGradient)"></path>
                        <path d="M0 250 Q 100 200 200 230 T 400 150 T 600 100 T 800 50" fill="none" stroke="#197fe6" stroke-width="3"></path>
                        <!-- Grid Lines -->
                        <line stroke="currentColor" stroke-opacity="0.05" x1="0" x2="800" y1="50" y2="50"></line>
                        <line stroke="currentColor" stroke-opacity="0.05" x1="0" x2="800" y1="110" y2="110"></line>
                        <line stroke="currentColor" stroke-opacity="0.05" x1="0" x2="800" y1="170" y2="170"></line>
                        <line stroke="currentColor" stroke-opacity="0.05" x1="0" x2="800" y1="230" y2="230"></line>
                    </svg>
                    <div class="flex justify-between mt-4 text-xs font-medium text-slate-400">
                        <span>Week 1</span>
                        <span>Week 2</span>
                        <span>Week 3</span>
                        <span>Week 4</span>
                    </div>
                </div>
            </div>
            <!-- Right Column Info Card -->
            <div class="bg-white dark:bg-slate-800 p-6 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm flex flex-col justify-between">
                <div>
                    <h3 class="font-bold text-lg mb-4">Top Categories</h3>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <div class="size-10 rounded-lg bg-orange-100 dark:bg-orange-900/30 flex items-center justify-center text-orange-600">
                                <span class="material-symbols-outlined">fastfood</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between text-sm font-medium mb-1">
                                    <span>Burgers &amp; Sides</span>
                                    <span>42%</span>
                                </div>
                                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full">
                                    <div class="bg-orange-500 h-full rounded-full" style="width: 42%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="size-10 rounded-lg bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-blue-600">
                                <span class="material-symbols-outlined">local_pizza</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between text-sm font-medium mb-1">
                                    <span>Pizzas</span>
                                    <span>28%</span>
                                </div>
                                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full">
                                    <div class="bg-blue-500 h-full rounded-full" style="width: 28%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="size-10 rounded-lg bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center text-emerald-600">
                                <span class="material-symbols-outlined">eco</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between text-sm font-medium mb-1">
                                    <span>Salads &amp; Healthy</span>
                                    <span>15%</span>
                                </div>
                                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full">
                                    <div class="bg-emerald-500 h-full rounded-full" style="width: 15%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="w-full mt-6 py-3 border border-slate-200 dark:border-slate-700 rounded-lg text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors">
                    View Detailed Reports
                </button>
            </div>
        </div>
        <!-- Recent Orders Table -->
        <div class="mt-8 bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between">
                <h3 class="font-bold text-lg">Recent Orders</h3>
                <button class="text-primary text-sm font-bold hover:underline">View All Orders</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 dark:bg-slate-900/50 text-slate-500 text-xs uppercase tracking-wider font-semibold">
                        <tr>
                            <th class="px-6 py-3">Order ID</th>
                            <th class="px-6 py-3">Customer</th>
                            <th class="px-6 py-3">Status</th>
                            <th class="px-6 py-3">Price</th>
                            <th class="px-6 py-3">Date</th>
                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700 text-sm">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-900/20 transition-colors">
                            <td class="px-6 py-4 font-mono font-medium">#ORD-3942</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="size-6 rounded-full bg-slate-100 flex items-center justify-center text-[10px] font-bold">JD</div>
                                    <span>Jane Doe</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">
                                    Delivered
                                </span>
                            </td>
                            <td class="px-6 py-4 font-semibold">$34.50</td>
                            <td class="px-6 py-4 text-slate-500">2 mins ago</td>
                            <td class="px-6 py-4 text-right">
                             <button class="mx-4 rounded-md text-base font-medium bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400 p-3">
                                        Delivered
                                    </button>

                                    <button class="mx-4 rounded-md text-base font-medium bg-primary/10 text-primary dark:bg-primary/20 dark:text-primary p-3">
                                        Preparing
                                    </button>

                                    <button class="mx-4 rounded-md text-base font-medium bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400 p-3">
                                        Pending
                                    </button>
</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-900/20 transition-colors">
                            <td class="px-6 py-4 font-mono font-medium">#ORD-3941</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="size-6 rounded-full bg-slate-100 flex items-center justify-center text-[10px] font-bold">MK</div>
                                    <span>Michael K.</span>
                                </div>
                            </td>

                            

                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary/10 text-primary dark:bg-primary/20 dark:text-primary">
                                    Preparing
                                </span>
                            </td>
                            <td class="px-6 py-4 font-semibold">$12.20</td>
                            <td class="px-6 py-4 text-slate-500">15 mins ago</td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-slate-400 hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-xl">more_vert</span>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-900/20 transition-colors">
                            <td class="px-6 py-4 font-mono font-medium">#ORD-3940</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="size-6 rounded-full bg-slate-100 flex items-center justify-center text-[10px] font-bold">SL</div>
                                    <span>Sarah Lee</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400">
                                    Pending
                                </span>
                            </td>
                            <td class="px-6 py-4 font-semibold">$89.15</td>
                            <td class="px-6 py-4 text-slate-500">42 mins ago</td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-slate-400 hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-xl">more_vert</span>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-900/20 transition-colors">
                            <td class="px-6 py-4 font-mono font-medium">#ORD-3939</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="size-6 rounded-full bg-slate-100 flex items-center justify-center text-[10px] font-bold">RB</div>
                                    <span>Robert B.</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400">
                                    Delivered
                                </span>
                            </td>
                            <td class="px-6 py-4 font-semibold">$45.00</td>
                            <td class="px-6 py-4 text-slate-500">1 hour ago</td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-slate-400 hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined text-xl">more_vert</span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection