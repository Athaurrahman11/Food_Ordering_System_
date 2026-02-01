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
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white dark:bg-slate-800 p-6 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-primary/10 rounded-lg text-primary">
                        <span class="material-symbols-outlined">payments</span>
                    </div>
                </div>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Revenue</p>
                <h3 class="text-2xl font-bold mt-1">${{ number_format($total_revenue, 2) }}</h3>
            </div>
            <div class="bg-white dark:bg-slate-800 p-6 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-orange-500/10 rounded-lg text-orange-500">
                        <span class="material-symbols-outlined">shopping_cart</span>
                    </div>
                </div>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Orders</p>
                <h3 class="text-2xl font-bold mt-1">{{ number_format($total_orders) }}</h3>
            </div>
            <div class="bg-white dark:bg-slate-800 p-6 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-blue-500/10 rounded-lg text-blue-500">
                        <span class="material-symbols-outlined">restaurant_menu</span>
                    </div>
                </div>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Food Items</p>
                <h3 class="text-2xl font-bold mt-1">{{ number_format($total_food_items) }}</h3>
            </div>
            <div class="bg-white dark:bg-slate-800 p-6 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm">
                <div class="flex justify-between items-start mb-4">
                    <div class="p-2 bg-yellow-500/10 rounded-lg text-yellow-500">
                        <span class="material-symbols-outlined">menu_book</span>
                    </div>
                </div>
                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Categories</p>
                <h3 class="text-2xl font-bold mt-1">{{ number_format($total_menu_items) }}</h3>
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
                        @foreach($top_categories as $cat)
                        <div class="flex items-center gap-3">
                            <div class="size-10 rounded-lg bg-slate-100 dark:bg-slate-700 flex items-center justify-center text-slate-600 dark:text-slate-400">
                                <span class="material-symbols-outlined">category</span>
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between text-sm font-medium mb-1">
                                    <span>{{ $cat->category }}</span>
                                    <span>{{ $cat->percentage }}%</span>
                                </div>
                                <div class="w-full bg-slate-100 dark:bg-slate-700 h-1.5 rounded-full">
                                    <div class="bg-primary h-full rounded-full" style="width: {{ $cat->percentage }}%"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
                            @foreach($orders as $order)
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-900/20 transition-colors">
                                <td class="px-6 py-4 font-mono font-medium">#ORD-{{ $order->id }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <div class="size-6 rounded-full bg-slate-100 flex items-center justify-center text-[10px] font-bold">{{ substr($order->customer_name, 0, 1) }}</div>
                                        <span>{{ $order->customer_name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                        {{ $order->status == 'Delivered' ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400' : 
                                           ($order->status == 'Pending' ? 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400' : 
                                           'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400') }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 font-semibold">${{ $order->price }}</td>
                                <td class="px-6 py-4 text-slate-500">{{ $order->created_at?->diffForHumans() ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ url('orders') }}" class="text-slate-400 hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined text-xl">visibility</span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            @if($orders->isEmpty())
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-slate-500">No recent orders found.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</main>

@endsection