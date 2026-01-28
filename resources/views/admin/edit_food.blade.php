@extends('admin.layout')
@section('content')

<main class="flex-1 flex flex-col overflow-hidden">
    <div class="flex-1 overflow-y-auto p-8">
        <header class="h-16 border-b border-gray-200 dark:border-gray-800 bg-white dark:bg-background-dark flex items-center justify-between px-8">
            <div class="flex items-center gap-4">
                <h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">Update Food Item</h2>
            </div>
        </header>

        <div class="max-w-3xl mx-auto">
            <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 overflow-hidden">
                <form action="{{ route('update_food', $food_item->id) }}" class="p-8 space-y-8" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="space-y-3">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Menu Image</label>
                        <div class="flex flex-col items-center gap-4 rounded-xl border-2 border-dashed border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 px-6 py-12 transition-colors hover:border-primary/50">
                            @if($food_item->image)
                                <img src="/Food/{{ $food_item->image }}" class="w-32 h-32 object-cover rounded-lg mb-2 shadow-md">
                            @endif
                            <input type="file" name="image" class="px-6 py-2.5 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg text-sm font-bold shadow-sm" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2 space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Food Name</label>
                            <input type="text" name="name" class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg px-4 py-2.5" value="{{ $food_item->name }}" />
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Category</label>
                            <div class="relative">
                                <select name="category" class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg px-4 py-2.5 appearance-none">
                                    @foreach ($menu as $item)
                                        <option value="{{ $item->category }}" {{ $food_item->category == $item->category ? 'selected' : '' }}>
                                            {{ $item->category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Price</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">$</span>
                                <input type="number" step="0.01" name="price" class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg pl-8 pr-4 py-2.5" value="{{ $food_item->price }}" />
                            </div>
                        </div>

                        <div class="md:col-span-2 space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Quantity / Stock</label>
                            <input type="number" name="stock" class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg px-4 py-2.5" value="{{ $food_item->stock }}"/>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-100 dark:border-gray-800">
                        <a href="{{ url('food') }}" class="px-6 py-2.5 rounded-lg text-sm font-bold text-gray-600 dark:text-gray-400 hover:bg-gray-100 transition-colors">Cancel</a>
                        
                        <button type="submit" class="px-8 py-2.5 bg-blue-600 text-white rounded-lg text-sm font-bold shadow-md hover:bg-blue-700 transition-colors flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">save</span>
                            Update Food
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection