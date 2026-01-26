@extends('admin.layout')
@section('content')

<main class="flex-1 overflow-y-auto p-6 lg:p-10">
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
            <div>
                <h2 class="text-3xl font-black text-slate-900 dark:text-white tracking-tight">Menu Management</h2>
                <p class="text-slate-500 dark:text-slate-400 mt-1">Real-time control over all incoming and active food orders.</p>
            </div>
            <div class="flex items-center gap-3">

                <a href="{{ uri('add_menu') }}" class="flex items-center gap-2 px-4 py-2 bg-primary text-white rounded-lg text-sm font-bold hover:bg-primary/90 transition-all shadow-lg shadow-primary/20 cursor-pointer" >
                    <span class="material-symbols-outlined text-sm">add</span>
                    Add Item for menu
                </a>
            </div>
        </div>
        <div class="mt-6 border-b border-slate-200 dark:border-slate-800 flex gap-8">
            <a class="flex items-center gap-2 border-b-2 border-primary text-primary pb-3 text-sm font-bold" href="#">
                <span>All Items</span>
                <span class="bg-primary/10 px-2 py-0.5 rounded text-[10px]">3</span>
            </a>
         
        </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-6">


        @foreach ($menuitems as $menuitem)
        <div class="group bg-white dark:bg-slate-900 rounded-xl overflow-hidden border border-slate-200 dark:border-slate-800 hover:shadow-xl transition-all duration-300 flex flex-col">
            <div class="relative w-full aspect-[4/3] overflow-hidden">
                <div class="absolute inset-0 bg-center bg-no-repeat bg-cover group-hover:scale-110 transition-transform duration-500" style="background-image: url('{{ asset('Menu_items/' . $menuitem->image) }}');"></div>
                <div class="absolute top-3 right-3 flex gap-2">
                    <button class="p-2 bg-white/90 dark:bg-black/60 rounded-lg text-primary backdrop-blur-sm hover:bg-primary hover:text-white transition-colors">
                        <a href="{{ uri('edit_menu/'.$menuitem->id) }}" class="material-symbols-outlined text-sm filled-icon">edit</a>
                    </button>
                    <button class="p-2 bg-white/90 dark:bg-black/60 rounded-lg text-red-500 backdrop-blur-sm hover:bg-red-500 hover:text-white transition-colors">
                        <a href="{{ uri('delete_menu/'.$menuitem->id) }}" class="delete-btn material-symbols-outlined text-sm filled-icon ">delete</a>
                    </button>
                </div>

            </div>
            <div class="p-4 flex flex-col flex-1">
                <div class="flex justify-between items-start mb-1">
                    <span class="text-primary font-black text-xl">{{ $menuitem->category }}</span>
                </div>
                <div class="mt-auto pt-3 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between">
                    <div class="flex items-center gap-1 text-[10px] text-slate-400 uppercase tracking-widest font-bold text-justify">
                        <span>{{ $menuitem->description }}</span>


                    </div>

                </div>
            </div>
        </div>
        @endforeach

      




        <button class="group border-2 border-dashed border-slate-200 dark:border-slate-800 rounded-xl p-8 flex flex-col items-center justify-center gap-4 hover:border-primary hover:bg-primary/5 transition-all">
            <div class="size-12 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center group-hover:bg-primary group-hover:text-white transition-colors">
                <a href="{{ uri('add_menu') }}" class="material-symbols-outlined text-2xl">add_circle</a>
            </div>
            <div class="text-center">
                <p class="font-bold text-slate-700 dark:text-slate-300">Add New Food Item</p>
                <p class="text-xs text-slate-400">Click to expand menu</p>
            </div>
        </button>
    </div>



</main>


@endsection

