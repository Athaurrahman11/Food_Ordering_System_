@extends('admin.layout')
@section('content')
<main class="flex-1 flex flex-col overflow-hidden">
<header class="h-16 border-b border-gray-200 dark:border-gray-800 bg-white dark:bg-background-dark flex items-center justify-between px-8">
<div class="flex items-center gap-4">
<h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">Food Management</h2>
</div>

</header>




<div class="flex-1 overflow-y-auto p-8">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
<div class="flex-1 max-w-2xl relative">
<span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">search</span>
<input class="w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl pl-12 pr-4 py-3 text-sm focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-shadow shadow-sm" placeholder="Search menu items by name, category or price..." type="text"/>
</div>
<button class="flex items-center justify-center gap-2 bg-primary text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg hover:bg-primary/90 transition-all active:scale-95">
<span class="material-symbols-outlined">add</span>
                    Add New Item
                </button>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
<div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden group hover:shadow-xl transition-shadow">
<div class="relative h-48 overflow-hidden">
<div class="w-full h-full bg-cover bg-center transition-transform duration-500 group-hover:scale-105" style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBL8j_Uf8JeVlMpnuOpPLSiX0FIBXaz6Qw8U6MMsQfmsZ8qTVa7Etpc8RyI_Aq-FK1-IopoYy0ZtpjaUiinbwtQdx0NHE65adZQaBzb-TJ2oOQBLNEGkY99CC3oNjl-puqjV_Tuo-KtO280FRQsEnGHGl91d_a2dpKIyAv3ZKFCkrHn0D1ztGIm4sVb3cBmIMqbvd3Kow0JB87oNmveEsyjFrF2h6uFYRn1Bt3YXHvW-QHfx4zgWVNOBTHi9t-SfM-EU72ixVGRFFm4')"></div>
<div class="absolute top-3 left-3 px-2 py-1 bg-black/60 backdrop-blur-md rounded text-[10px] font-bold uppercase text-white tracking-widest">Main Course</div>
</div>
<div class="p-5">
<div class="flex justify-between items-start mb-2">
<h3 class="font-bold text-lg leading-tight">Classic Cheeseburger</h3>
<span class="text-primary font-black">$12.50</span>
</div>
<div class="flex items-center gap-2 mb-6">
<span class="material-symbols-outlined text-sm text-gray-400">inventory_2</span>
<span class="text-xs font-medium text-gray-500 dark:text-gray-400">Stock: <span class="text-green-500 font-bold">42 items</span></span>
</div>
<div class="flex gap-2 pt-4 border-t border-gray-100 dark:border-gray-800">
<button class="flex-1 flex items-center justify-center gap-2 px-4 py-2 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-bold hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
<span class="material-symbols-outlined text-lg">edit</span>
                                Edit
                            </button>
<button class="flex items-center justify-center p-2 bg-red-50 dark:bg-red-900/20 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition-all">
<span class="material-symbols-outlined">delete</span>
</button>
</div>
</div>
</div>

</div>
</main>


@endsection