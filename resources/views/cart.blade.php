@extends('layouts.app')

@section('title', 'Sepet - Diblong')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold font-playfair mb-8">
            <span class="gold-text-gradient">Sepetim</span>
        </h1>

        @if(count($cartItems) > 0)
            <div class="space-y-4 mb-8">
                @foreach($cartItems as $item)
                    <div class="bg-dark-light rounded-xl border border-gray-800 p-4 flex items-center gap-4">
                        <a href="{{ route('product.detail', $item['product']->slug) }}" class="flex-shrink-0">
                            <img src="{{ $item['product']->image_url }}" alt="{{ $item['product']->name }}"
                                 class="w-20 h-20 object-cover rounded-lg bg-gray-100">
                        </a>
                        <div class="flex-1 min-w-0">
                            <a href="{{ route('product.detail', $item['product']->slug) }}"
                               class="font-semibold hover:text-gold transition block truncate">{{ $item['product']->name }}</a>
                            <span class="text-gold font-bold">{{ number_format($item['product']->price, 2) }} TL</span>
                        </div>
                        <form action="{{ route('cart.update') }}" method="POST" class="flex items-center gap-2">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item['product']->id }}">
                            <select name="quantity" onchange="this.form.submit()"
                                    class="bg-dark border border-gray-700 rounded-lg px-3 py-2 text-white text-sm focus:outline-none focus:border-gold">
                                @for($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}" {{ $item['quantity'] == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </form>
                        <div class="text-right min-w-[80px]">
                            <span class="text-white font-semibold">{{ number_format($item['subtotal'], 2) }} TL</span>
                        </div>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item['product']->id }}">
                            <button type="submit" class="text-gray-500 hover:text-red-500 transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            {{-- Summary --}}
            <div class="bg-dark-light rounded-xl border border-gray-800 p-6">
                <div class="flex justify-between items-center mb-6">
                    <span class="text-xl font-semibold">Toplam</span>
                    <span class="text-2xl font-bold text-gold">{{ number_format($total, 2) }} TL</span>
                </div>
                <a href="{{ route('checkout.index') }}"
                   class="block w-full gold-gradient text-black font-semibold py-4 rounded-lg hover:opacity-90 transition text-lg text-center">
                    Ödemeye Geç
                </a>
                <a href="{{ route('home') }}#urunler" class="block text-center text-gray-400 hover:text-gold transition mt-4 text-sm">
                    Alışverişe Devam Et
                </a>
            </div>
        @else
            <div class="text-center py-20">
                <svg class="w-24 h-24 text-gray-700 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>
                </svg>
                <h2 class="text-xl text-gray-400 mb-4">Sepetiniz boş</h2>
                <a href="{{ route('home') }}#urunler" class="inline-block gold-gradient text-black font-semibold px-8 py-3 rounded-lg hover:opacity-90 transition">
                    Ürünleri Keşfet
                </a>
            </div>
        @endif
    </div>
@endsection
