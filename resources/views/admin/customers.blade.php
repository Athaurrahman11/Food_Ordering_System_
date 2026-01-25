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



        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
<div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-card-dark border border-slate-200 dark:border-border-dark shadow-sm">
<div class="flex items-center justify-between">
<p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Total Customers</p>
<span class="material-symbols-outlined text-primary text-xl">group</span>
</div>
<p class="text-3xl font-bold">12,842</p>
<div class="flex items-center gap-1 text-xs text-emerald-500 font-medium">
<span class="material-symbols-outlined text-sm">trending_up</span>
<span>12% increase</span>
</div>
</div>
<div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-card-dark border border-slate-200 dark:border-border-dark shadow-sm">
<div class="flex items-center justify-between">
<p class="text-slate-500 dark:text-slate-400 text-sm font-medium">Active Users</p>
<span class="material-symbols-outlined text-emerald-500 text-xl">person_check</span>
</div>
<p class="text-3xl font-bold">11,201</p>
<div class="flex items-center gap-1 text-xs text-emerald-500 font-medium">
<span class="material-symbols-outlined text-sm">trending_up</span>
<span>5.4% increase</span>
</div>
</div>
<div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-card-dark border border-slate-200 dark:border-border-dark shadow-sm">
<div class="flex items-center justify-between">
<p class="text-slate-500 dark:text-slate-400 text-sm font-medium">New This Month</p>
<span class="material-symbols-outlined text-amber-500 text-xl">new_releases</span>
</div>
<p class="text-3xl font-bold">+425</p>
<div class="flex items-center gap-1 text-xs text-slate-400 font-medium">
<span class="material-symbols-outlined text-sm">schedule</span>
<span>Across 28 days</span>
</div>
</div>
</div>

        <!-- Stats Grid -->
        <div class="bg-white dark:bg-card-dark rounded-xl border border-slate-200 dark:border-border-dark overflow-hidden shadow-sm">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-slate-50 dark:bg-slate-800/50 border-bottom border-slate-200 dark:border-border-dark">
<th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">
<div class="flex items-center gap-1 cursor-pointer">
                                            Customer Name
                                            <span class="material-symbols-outlined text-sm">unfold_more</span>
</div>
</th>
<th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Email</th>
<th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">
<div class="flex items-center gap-1 cursor-pointer">
                                            Total Orders
                                            <span class="material-symbols-outlined text-sm">expand_more</span>
</div>
</th>
<th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">
<div class="flex items-center gap-1 cursor-pointer">
                                            Total Spend
                                            <span class="material-symbols-outlined text-sm">unfold_more</span>
</div>
</th>
<th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Join Date</th>
<th class="px-6 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Status</th>
<th class="px-6 py-4"></th>
</tr>
</thead>
<tbody class="divide-y divide-slate-200 dark:divide-border-dark">
<!-- Row 1 -->
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-3">
<div class="size-10 rounded-full bg-cover bg-center ring-2 ring-slate-100 dark:ring-slate-700" data-alt="portrait photo of a male customer" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCIw6WOMb_3pBja3IQpzt1x-cRcN_X6BwY1wMfjXMh73v654mz8FwW3yWskhtw1yJRzIvIKrdkRHluPglaBlRVotuHrGpD12aa_FRoFs5fO4Cvg-YuMlMOmVp0tg4PmYi-wVd-VGq9F-6EWfHsRdIKF1r6-9QBr1zs_fTAL4amoCEey7uFuBfPqvQMKVqtcyeuSflcUvVYOSR7bWhGlkdrgCgclbsbm58Fa0F3kvPu8pbfLQGh95QYrb7bQ3wPPeUytC9cpOrEVVDPa')"></div>
<span class="text-sm font-semibold">John Doe</span>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">john.doe@email.com</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">45</td>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900 dark:text-white">$1,240.50</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">Oct 12, 2023</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800">
                                            Active
                                        </span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-right text-slate-400">
<button class="hover:text-primary transition-colors">
<span class="material-symbols-outlined">more_vert</span>
</button>
</td>
</tr>
<!-- Row 2 -->
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-3">
<div class="size-10 rounded-full bg-cover bg-center ring-2 ring-slate-100 dark:ring-slate-700" data-alt="portrait photo of a female customer" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuAdBTk-8wOYY51QZMLzknF0ZyLEKzIuMl4dNtm3vdrSb_x9J576bhKxcco2xgsTZffV0ghej4qtPi7-F4Jz5V97Zq5itfa4hE1nzQTHA5dR5nJOmBPo_i1sUkDw-qCSzbO-sT41GwUsONjQA19Q-bRmTKQUEuZlaGxfKXKWcuuvCos6R9TZB0RdmX4_BAUkagdozxIOYmGp5zMkWz-r4AE_TMrwjg6niXL0gke2tP4r5bdUZrnZfb8AVD325qdc-tNSz1hu5kxDUl29')"></div>
<span class="text-sm font-semibold">Jane Smith</span>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">jane.smith@email.com</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">12</td>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900 dark:text-white">$320.15</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">Nov 05, 2023</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800">
                                            Active
                                        </span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-right text-slate-400">
<button class="hover:text-primary transition-colors">
<span class="material-symbols-outlined">more_vert</span>
</button>
</td>
</tr>
<!-- Row 3 -->
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-3">
<div class="size-10 rounded-full bg-cover bg-center ring-2 ring-slate-100 dark:ring-slate-700" data-alt="portrait photo of a professional male" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuD0vZHRnvLXViUwFJ2GGsLZGkACccXpJUbMTXAl3bn3qyVm5_Y1iaj6CNHVfPLu4wovmU7ybv3pKm5nVT_S2Jr9AEtpXUATeZsT7xDtK1FLMK15KbVv57qm5EGmc_5vfOURrgmMXNH5truMvzTEKEc2OXNce5a0Mqrp00eZvMMnWVX6oK5PzCq0XJoE5c6aJKwuS9JBSAOTuhe7af56rkw8IVS4xk63Gk1OMZ8dR8aurUqjw93Sd5n8AT55xzGrVuKYxhhqA6MT8UCu')"></div>
<span class="text-sm font-semibold">Robert Brown</span>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">robert.b@email.com</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">0</td>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900 dark:text-white">$0.00</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">Dec 01, 2023</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400 border border-red-200 dark:border-red-800">
                                            Suspended
                                        </span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-right text-slate-400">
<button class="hover:text-primary transition-colors">
<span class="material-symbols-outlined">more_vert</span>
</button>
</td>
</tr>
<!-- Row 4 -->
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-3">
<div class="size-10 rounded-full bg-cover bg-center ring-2 ring-slate-100 dark:ring-slate-700" data-alt="portrait photo of a smiling female" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCVl0bJwt7-pmPi27GvWNt8LlWR0-v98egyePk9aSAAZPBEba4FmIBnGAVbvFaY6AzOJ-v53eoUwKlS9zS-tzHo3iv0fjHeDSH63EAy9h--eNBT1OO3iBHhdjSJTlrW0XIS-8reLQbOYBzgME8rDUzfONPywdrOo7qu4-1AJKYyLaagnRqE5jDJlKpc7kTpdNSvxIPUgnbdwPDGgKm3EpWgV16-4eFpFUpVdG_bunoepAedlI7uOyjwPvT7KZMa09Di-vGLQJ2C3VCU')"></div>
<span class="text-sm font-semibold">Emily Davis</span>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">emily.d@email.com</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">82</td>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900 dark:text-white">$2,150.00</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">Jan 15, 2023</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800">
                                            Active
                                        </span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-right text-slate-400">
<button class="hover:text-primary transition-colors">
<span class="material-symbols-outlined">more_vert</span>
</button>
</td>
</tr>
<!-- Row 5 -->
<tr class="hover:bg-slate-50 dark:hover:bg-slate-800/30 transition-colors">
<td class="px-6 py-4 whitespace-nowrap">
<div class="flex items-center gap-3">
<div class="size-10 rounded-full bg-cover bg-center ring-2 ring-slate-100 dark:ring-slate-700" data-alt="portrait photo of a young male" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCe8ys_Etgy09uFhuh1JFjAChPCSmS89jPxFvy9F5dHVMPxJwQeniQGTy6p8bdZftgBzK2FPD9gokil8a_XprwR933023TILbHkVw5JVoYQUH1pUG1myrAvCL7MVme9AyCPY22afTNohf5iJNktDkzA2mYXk-YkubCJN98RLJhnigGfCHuOd6t9PC01ND0CePI5T2A1URrtRc1LeBaqqQYOjltpc8GjH1ri1hdXAFN9PSpPAE1I4qMtiznzM2_5WmQnU9FpEzKDWybA')"></div>
<span class="text-sm font-semibold">Michael Wilson</span>
</div>
</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">m.wilson@email.com</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">29</td>
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900 dark:text-white">$745.20</td>
<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500 dark:text-slate-400">Feb 20, 2023</td>
<td class="px-6 py-4 whitespace-nowrap">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800">
                                            Active
                                        </span>
</td>
<td class="px-6 py-4 whitespace-nowrap text-right text-slate-400">
<button class="hover:text-primary transition-colors">
<span class="material-symbols-outlined">more_vert</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination Footer -->
<div class="px-6 py-4 bg-slate-50 dark:bg-slate-800/50 border-t border-slate-200 dark:border-border-dark flex items-center justify-between">
<p class="text-sm text-slate-500 dark:text-slate-400">
                            Showing <span class="font-medium text-slate-900 dark:text-white">1</span> to <span class="font-medium text-slate-900 dark:text-white">5</span> of <span class="font-medium text-slate-900 dark:text-white">12,842</span> results
                        </p>
<div class="flex gap-2">
<button class="px-3 py-1 rounded border border-slate-200 dark:border-border-dark text-sm bg-white dark:bg-card-dark text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700 disabled:opacity-50" disabled="">
                                Previous
                            </button>
<button class="px-3 py-1 rounded border border-slate-200 dark:border-border-dark text-sm bg-primary text-white font-medium">1</button>
<button class="px-3 py-1 rounded border border-slate-200 dark:border-border-dark text-sm bg-white dark:bg-card-dark text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700">2</button>
<button class="px-3 py-1 rounded border border-slate-200 dark:border-border-dark text-sm bg-white dark:bg-card-dark text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700">3</button>
<button class="px-3 py-1 rounded border border-slate-200 dark:border-border-dark text-sm bg-white dark:bg-card-dark text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700">
                                Next
                            </button>
</div>
</div>
</div>
</main>

@endsection