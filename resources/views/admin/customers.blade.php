@extends('admin.layout')

@section('content')

<!-- Main Content -->
<main class="flex-1 flex flex-col min-w-0 overflow-hidden">

    <!-- TopNavBar -->
   


    <!-- Dashboard Content -->
    <div class="p-8 overflow-y-auto">
        <div class="flex flex-wrap justify-between items-end gap-4 mb-8">
<div class="flex flex-col gap-1">
<h2 class="text-3xl font-black tracking-tight">Customer Management</h2>
<p class="text-slate-500 dark:text-slate-400 text-base">Manage and monitor your registered user base and their activity.</p>
</div>
<div class="flex gap-3">
<button class="flex items-center gap-2 rounded-lg h-10 px-4 bg-white dark:bg-card-dark border border-slate-200 dark:border-border-dark text-slate-700 dark:text-white text-sm font-bold hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors shadow-sm">
<span class="material-symbols-outlined text-lg">file_download</span>
<span>Export</span>
</button>
<button class="flex items-center gap-2 rounded-lg h-10 px-4 bg-primary text-white text-sm font-bold hover:bg-primary/90 transition-colors shadow-sm shadow-primary/20">
<span class="material-symbols-outlined text-lg">person_add</span>
<span>Add Customer</span>
</button>
</div>
</div>



    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-card-dark border border-slate-200 dark:border-border-dark shadow-sm">
            <div class="flex items-center justify-between">
                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Customers</p>
                <span class="material-symbols-outlined text-primary text-xl">group</span>
            </div>
            <p class="text-3xl font-bold">{{ number_format($total_customers) }}</p>
        </div>
        <div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-card-dark border border-slate-200 dark:border-border-dark shadow-sm">
            <div class="flex items-center justify-between">
                <p class="text-slate-500 dark:text-slate-400 text-sm font-medium">New This Month</p>
                <span class="material-symbols-outlined text-amber-500 text-xl">new_releases</span>
            </div>
            <p class="text-3xl font-bold">+{{ number_format($new_customers_this_month) }}</p>
            <div class="flex items-center gap-1 text-xs text-slate-400 font-medium">
                <span class="material-symbols-outlined text-sm">schedule</span>
                <span>Last 30 days</span>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="bg-white dark:bg-card-dark rounded-xl border border-slate-200 dark:border-border-dark overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-slate-800/50 border-bottom border-slate-200 dark:border-border-dark">
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Customer Name</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Email</th>
                        <th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Join Date</th>
                        <th class="px-6 py-4"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-border-dark">
                    @foreach($customers as $customer)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center gap-3">
                                <div class="size-10 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 font-bold">
                                    {{ substr($customer->name, 0, 1) }}
                                </div>
                                <span class="text-sm font-semibold">{{ $customer->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">{{ $customer->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">{{ $customer->created_at?->format('M d, Y') ?? 'N/A' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-slate-400">
                            <button class="hover:text-primary transition-colors">
                                <span class="material-symbols-outlined">more_vert</span>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @if($customers->isEmpty())
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-slate-500">No customers found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- Pagination Footer -->
        <div class="px-6 py-4 bg-slate-50 dark:bg-slate-800/50 border-t border-slate-200 dark:border-border-dark flex items-center justify-between">
            <div class="mt-4">
                {{ $customers->links() }}
            </div>
        </div>
    </div>
</main>

@endsection