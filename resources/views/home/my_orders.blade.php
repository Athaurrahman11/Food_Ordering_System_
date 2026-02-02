@extends('home.layouts.app')

@section('content')
<div class="relative min-h-screen pt-32 pb-20 px-6 lg:px-20 max-w-[1440px] mx-auto">
    
    <!-- Background Elements -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-orange-100/40 rounded-full blur-[100px] -translate-y-1/2 translate-x-1/2 -z-10"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-blue-100/30 rounded-full blur-[80px] translate-y-1/3 -translate-x-1/4 -z-10"></div>

    <div class="text-center mb-12">
        <span class="text-[#f48c25] font-bold uppercase tracking-widest text-xs mb-3 block">Your History</span>
        <h1 class="text-4xl lg:text-5xl font-black text-slate-900">My Orders</h1>
        <div class="w-24 h-1.5 bg-[#f48c25] rounded-full mt-4 mx-auto"></div>
    </div>

    @if($orders->count() > 0)
    <div class="bg-white rounded-[2.5rem] shadow-xl border border-slate-100 overflow-hidden relative">
        <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-orange-50 to-transparent rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
        
        <div class="overflow-x-auto relative z-10">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-100 bg-slate-50/50">
                        <th class="p-6 font-black text-slate-900 text-sm uppercase tracking-wider">Order ID</th>
                        <th class="p-6 font-black text-slate-900 text-sm uppercase tracking-wider">Phone</th>
                        <th class="p-6 font-black text-slate-900 text-sm uppercase tracking-wider">Address</th>
                        <th class="p-6 font-black text-slate-900 text-sm uppercase tracking-wider">Amount</th>
                        <th class="p-6 font-black text-slate-900 text-sm uppercase tracking-wider">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">


                    @foreach($orders as $order)
                    <tr class="group hover:bg-slate-50 transition-colors">
                        <td class="p-6 font-bold text-slate-900">
                            #{{ $order->id }}
                        </td>
                        <td class="p-6 font-bold text-slate-900">
                            {{ $order->phone }}
                        </td>
                        <td class="p-6 font-bold text-slate-900">
                            {{ $order->address }}
                        </td>
                        
                        <td class="p-6 font-bold text-[#f48c25]">
                            ${{ number_format($order->price, 2) }}
                        </td>

                       
                        <td class="p-6">
                            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wide
                                {{ $order->status == 'Pending' ? 'bg-amber-100 text-amber-600' : '' }}
                                {{ $order->status == 'Paid' || $order->status == 'Confirmed' ? 'bg-green-100 text-green-600' : '' }}
                                {{ $order->status == 'Delivered' ? 'bg-blue-100 text-blue-600' : '' }}
                                {{ $order->status == 'Preparing' ? 'bg-purple-100 text-purple-600' : '' }}
                            ">
                                @if($order->status == 'Pending')
                                    <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                                @elseif($order->status == 'Paid' || $order->status == 'Confirmed')
                                    <span class="material-symbols-outlined text-sm">check_circle</span>
                                @elseif($order->status == 'Delivered')
                                    <span class="material-symbols-outlined text-sm">local_shipping</span>
                                @elseif($order->status == 'Preparing')
                                    <span class="material-symbols-outlined text-sm">soup_kitchen</span>
                                @endif
                                {{ $order->status }}
                            </span>
                        </td>
                        <td class="p-6 text-right">
                            <a href="{{ route('cancel_order', $order->id) }}" onclick="return confirm('Are you sure you want to delete this order?')" class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-slate-100 text-slate-400 hover:bg-red-500 hover:text-white transition-all shadow-sm hover:shadow-red-500/30">
                                <span class="material-symbols-outlined text-xl">close</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                
                
                </tbody>
            </table>
        </div>
    </div>
    @else
    <div class="text-center py-20 bg-white rounded-[2.5rem] shadow-xl border border-slate-100">
        <div class="w-24 h-24 bg-orange-50 rounded-full flex items-center justify-center mx-auto mb-6 text-[#f48c25]">
            <span class="material-symbols-outlined text-5xl">receipt_long</span>
        </div>
        <h3 class="text-2xl font-black text-slate-900 mb-2">No Orders Yet</h3>
        <p class="text-slate-500 mb-8 max-w-sm mx-auto">Looks like you haven't placed any orders yet. Start exploring our delicious menu!</p>
        <a href="{{ route('shop') }}" class="inline-flex items-center gap-2 bg-[#f48c25] text-white px-8 py-4 rounded-full font-bold uppercase tracking-widest hover:bg-orange-600 hover:scale-[1.02] transition-all shadow-lg shadow-orange-500/30">
            <span>Browse Menu</span>
            <span class="material-symbols-outlined">arrow_forward</span>
        </a>
    </div>
    @endif
</div>
@endsection
