@extends('admin.layout')
@section('content')

<main class="flex-1 flex flex-col overflow-hidden">

    <div class="flex-1 overflow-y-auto p-8">

        <header class="h-16 border-b border-gray-200 dark:border-gray-800 bg-white dark:bg-background-dark flex items-center justify-between px-8">
            <div class="flex items-center gap-4">
                <h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">Add New Menu Item</h2>
            </div>

        </header>



        <div class="max-w-3xl mx-auto">
            <div class="bg-white dark:bg-gray-900 rounded-xl shadow-sm border border-gray-200 dark:border-gray-800 overflow-hidden">
                <form action="{{ url('menu_store') }}" class="p-8 space-y-8" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-3">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Menu Image</label>
                        <div class="flex flex-col items-center gap-4 rounded-xl border-2 border-dashed border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/50 px-6 py-12 transition-colors hover:border-primary/50">
                            <div class="flex flex-col items-center text-center gap-2">
                                <div class="size-12 rounded-full bg-primary/10 flex items-center justify-center text-primary mb-2">
                                    <span class="material-symbols-outlined text-3xl">cloud_upload</span>
                                </div>
                                <p class="text-gray-900 dark:text-white text-lg font-bold">Upload Menu Image</p>
                            </div>
                            <input type="file" class="px-6 py-2.5 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg text-sm font-bold shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors @error('image') border-red-500 @enderror" name="image" required />
                            @error('image')
                                <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">



                        <div class="md:col-span-2 space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Category</label>
                            <div class="relative">
                                <input type="text" placeholder="e.g. Pizza" name="category" value="{{ old('category') }}" required class="w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all pl-10 @error('category') border-red-500 @enderror" />
                                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">category</span>
                            </div>
                            @error('category')
                                <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2 space-y-2">
                            <label class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">Description</label>
                            <textarea name="description" rows="4" placeholder="Describe this category..." required class="w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all resize-none @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-100 dark:border-gray-800">
                        <a href="{{ url('menu') }}" class="px-6 py-2.5 rounded-lg text-sm font-bold text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors" type="button">
                            Cancel
                        </a>
                        <button class="px-8 py-2.5 bg-primary text-white rounded-lg text-sm font-bold shadow-md hover:bg-primary/90 transition-colors flex items-center gap-2" type="submit">
                            <i class="material-symbols-outlined text-sm">save</i>
                            Save Item
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>


@endsection