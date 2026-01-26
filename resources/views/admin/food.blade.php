@extends('admin.layout')
@section('content')

<main class="flex-1 flex flex-col overflow-hidden">

<div class="flex-1 overflow-y-auto p-8">

<header class="h-16 border-b border-gray-200 dark:border-gray-800 bg-white dark:bg-background-dark flex items-center justify-between px-8">
<div class="flex items-center gap-4">
<h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">Add New Food Item</h2>
</div>

</header>



<div class="max-w-3xl mx-auto">
<div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 overflow-hidden">
<form action="#" class="p-8 space-y-8">

<div class="space-y-3">
<label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Food Image</label>
<div class="flex flex-col items-center gap-4 rounded-xl border-2 border-dashed border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 px-6 py-12 transition-colors hover:border-primary/50">
<div class="flex flex-col items-center text-center gap-2">
<div class="size-12 rounded-full bg-primary/10 flex items-center justify-center text-primary mb-2">
<span class="material-symbols-outlined text-3xl">cloud_upload</span>
</div>
<p class="text-gray-900 dark:text-white text-lg font-bold">Upload Food Image</p>
<p class="text-gray-500 dark:text-gray-400 text-sm max-w-xs">Drag and drop your image here, or click to browse (PNG, JPG up to 10MB)</p>
</div>
<button class="px-6 py-2.5 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg text-sm font-bold shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors" type="button">
                                        Browse Files
                                    </button>
</div>
</div>


<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

<div class="md:col-span-2 space-y-2">
<label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Food Name</label>
<input class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-primary focus:border-transparent text-sm" placeholder="e.g., Spicy Tuna Roll" type="text"/>
</div>

<div class="space-y-2">
<label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Category</label>
<div class="relative">
<select class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg px-4 py-2.5 appearance-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
<option disabled="" selected="" value="">Select Category</option>
<option value="appetizers">Appetizers</option>
<option value="main-course">Main Course</option>
<option value="desserts">Desserts</option>
<option value="beverages">Beverages</option>
</select>
<span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-gray-500">expand_more</span>
</div>
</div>
<!-- Price -->
<div class="space-y-2">
<label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Price</label>
<div class="relative">
<span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">$</span>
<input class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg pl-8 pr-4 py-2.5 focus:ring-2 focus:ring-primary focus:border-transparent text-sm" placeholder="0.00" step="0.01" type="number"/>
</div>
</div>
<!-- Quantity / Stock -->
<div class="md:col-span-2 space-y-2">
<label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Quantity / Stock</label>
<input class="w-full bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-primary focus:border-transparent text-sm" placeholder="0" type="number"/>
</div>
</div>
<!-- Action Buttons -->
<div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-100 dark:border-gray-800">
<button class="px-6 py-2.5 rounded-lg text-sm font-bold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors" type="button">
                                    Cancel
                                </button>
<button class="px-8 py-2.5 bg-primary text-white rounded-lg text-sm font-bold shadow-md hover:bg-primary/90 transition-colors flex items-center gap-2" type="submit">
<span class="material-symbols-outlined text-sm">save</span>
                                    Save Item
                                </button>
</div>
</form>
</div>
</div>
</div>
</main>


@endsection