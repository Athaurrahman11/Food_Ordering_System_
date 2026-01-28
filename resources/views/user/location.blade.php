@extends('layouts.app')
@section('content')
<div class="flex flex-col gap-6 p-8">
    @foreach($branches as $branch)
    <div class="bg-white dark:bg-slate-900 rounded-[2rem] p-6 border-2 {{ $branch['active'] ? 'border-primary' : 'border-transparent shadow-sm' }}">
        <h3 class="text-xl font-extrabold">{{ $branch['name'] }}</h3>
        <p class="text-sm text-slate-400 mb-6">{{ $branch['address'] }}</p>

        <div class="flex gap-3">
            <a href="{{ route('shop') }}" class="flex-1 h-12 flex items-center justify-center rounded-2xl {{ $branch['active'] ? 'bg-primary text-white' : 'bg-orange-50 text-primary' }} text-xs font-black transition-all">
                ORDER HERE
            </a>
            <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($branch['address']) }}" target="_blank" class="px-6 h-12 flex items-center justify-center rounded-2xl bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-white text-xs font-black transition-all">
                DIRECTIONS
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection
