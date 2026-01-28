@extends('admin.layout')

@section('content')


<main class="flex-1 flex flex-col min-w-0 overflow-hidden">






    <div class="p-8 overflow-y-auto">
        <div>
            <h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">Order Management</h2>
            <p class="text-slate-500 dark:text-slate-400 mt-1 mb-4">Real-time control over all incoming and active food orders.</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
            <div class="bg-white dark:bg-card-dark p-6 rounded-xl border border-slate-200 dark:border-border-dark">
                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Orders</p>
                <div class="flex items-end justify-between mt-2">
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white leading-none">{{ number_format($total_orders) }}</h3>
                </div>
            </div>
            <div class="bg-white dark:bg-card-dark p-6 rounded-xl border border-slate-200 dark:border-border-dark">
                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Pending</p>
                <div class="flex items-end justify-between mt-2">
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white leading-none">{{ number_format($pending_orders) }}</h3>
                </div>
            </div>
            <div class="bg-white dark:bg-card-dark p-6 rounded-xl border border-slate-200 dark:border-border-dark">
                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">In Progress</p>
                <div class="flex items-end justify-between mt-2">
                    <!-- Assuming 'Preparing' is considered In Progress for stats -->
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white leading-none">{{ number_format($in_progress_orders) }}</h3>
                </div>
            </div>
        </div>


        <div>



            <div class="mt-8 bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between">
                    <h3 class="font-bold text-lg">All Orders</h3>
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
                                <th class="px-6 py-3 text-center">Actions</th>
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
                                <td class="px-6 py-4 text-slate-500">{{ $order->created_at?->format('M d, Y') ?? 'N/A' }}</td>
                                <td class="px-3 py-4 text-right">
                                    <a href="{{ url('order_status/'.$order->id.'/Delivered') }}" class="inline-block mx-1 rounded-md text-xs font-medium bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400 px-3 py-2 hover:opacity-80">
                                        Delivered
                                    </a>

                                    <a href="{{ url('order_status/'.$order->id.'/Preparing') }}" class="inline-block mx-1 rounded-md text-xs font-medium bg-primary/10 text-primary dark:bg-primary/20 dark:text-primary px-3 py-2 hover:opacity-80">
                                        Preparing
                                    </a>

                                    <a href="{{ url('order_status/'.$order->id.'/Pending') }}" class="inline-block mx-1 rounded-md text-xs font-medium bg-yellow-100 text-yellow-700 dark:bg-yellow-900/30 dark:text-yellow-400 px-3 py-2 hover:opacity-80">
                                        Pending
                                    </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</main>

@endsection