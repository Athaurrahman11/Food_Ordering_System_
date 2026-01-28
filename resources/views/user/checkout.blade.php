@extends('layouts.app')
@section('content')
<div class="max-w-4xl mx-auto px-6 py-20">
    <h2 class="text-4xl font-black mb-10">Finish Your Order</h2>
    <div class="grid md:grid-cols-2 gap-10">
        <div class="space-y-4">
            <input type="text" placeholder="Address" class="w-full p-4 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-600 outline-none">
            <input type="text" placeholder="Phone" class="w-full p-4 rounded-xl border border-gray-200 focus:ring-2 focus:ring-orange-600 outline-none">
            <button class="w-full bg-gray-900 text-white py-4 rounded-xl font-bold">Complete Purchase</button>
        </div>
        <div class="bg-orange-50 p-8 rounded-3xl h-fit">
            <h3 class="font-bold mb-4">Summary</h3>
            <div class="flex justify-between font-bold text-xl pt-4 border-t border-orange-200">
                <span>Total</span><span>$15.00</span>
            </div>
        </div>
    </div>
</div>
@endsection
