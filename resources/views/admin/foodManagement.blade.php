@extends('admin.layout')
@section('content')
<main class="flex-1 flex flex-col overflow-hidden">
<div class="p-8 overflow-y-auto">
    <div>
        <h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">Food Management</h2>
        <p class="text-slate-500 dark:text-slate-400 mt-1 mb-4">Manage your menu items, stocks, and pricing.</p>
    </div>

<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
    <form action="{{ url('food') }}" method="GET" class="flex-1 max-w-2xl relative">
        <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">search</span>
        <input name="search" value="{{ request('search') }}" class="w-full bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl pl-12 pr-4 py-3 text-sm focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-shadow shadow-sm" placeholder="Search food items by name, category or price..." type="text"/>
    </form>
    <a href="{{ url('add_food') }}" class="flex items-center justify-center gap-2 bg-primary text-white px-6 py-3 rounded-xl font-bold text-sm shadow-lg hover:bg-primary/90 transition-all active:scale-95">
        <span class="material-symbols-outlined">add</span>
        Add New Food
    </a>
</div>

<div class="flex flex-wrap gap-2 mb-8">
    <a href="{{ url('food') }}" class="px-4 py-2 rounded-full text-sm font-semibold transition-colors {{ !request('category') || request('category') == 'All' ? 'bg-primary text-white shadow-md' : 'bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-400 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
        All Items
    </a>
    @foreach($categories as $cat)
    <a href="{{ url('food') }}?category={{ $cat->category }}{{ request('search') ? '&search='.request('search') : '' }}" class="px-4 py-2 rounded-full text-sm font-semibold transition-colors {{ request('category') == $cat->category ? 'bg-primary text-white shadow-md' : 'bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-400 border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700' }}">
        {{ $cat->category }}
    </a>
    @endforeach
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach($food_items as $food)
    <div class="bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden group hover:shadow-xl transition-shadow">
        <div class="relative h-48 overflow-hidden">
            <div class="w-full h-full bg-cover bg-center transition-transform duration-500 group-hover:scale-105" style="background-image: url('{{ asset('Food_items/' . $food->image) }}')"></div>
            <div class="absolute top-3 left-3 px-2 py-1 bg-black/60 backdrop-blur-md rounded text-[10px] font-bold uppercase text-white tracking-widest">{{ $food->category }}</div>
        </div>
        <div class="p-5">
            <div class="flex justify-between items-start mb-2">
                <h3 class="font-bold text-lg leading-tight">{{ $food->name }}</h3>
                <span class="text-primary font-black">${{ $food->price }}</span>
            </div>
            <div class="flex items-center gap-2 mb-6">
                <span class="material-symbols-outlined text-sm text-gray-400">inventory_2</span>
                <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Stock: <span class="text-green-500 font-bold">{{ $food->stock }} items</span></span>
            </div>
            <div class="flex gap-2 pt-4 border-t border-gray-100 dark:border-gray-800">
                <a href="{{ url('edit_food/'.$food->id) }}" class="flex-1 flex items-center justify-center gap-2 px-4 py-2 bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-lg text-sm font-bold hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors">
                    <span class="material-symbols-outlined text-lg">edit</span>
                    Edit
                </a>
                <a href="{{ url('delete_food/'.$food->id) }}" class="flex items-center justify-center p-2 bg-red-50 dark:bg-red-900/20 text-red-500 rounded-lg hover:bg-red-500 hover:text-white transition-all">
                    <span class="material-symbols-outlined">delete</span>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-8">
    {{ $food_items->appends(request()->query())->links() }}
</div>
</div>
</main>


@endsection