@extends('layouts.app')

@section('title', 'Sipariş Onayı - Diblong')

@section('content')
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center mb-10">
            <div class="w-20 h-20 gold-gradient rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h1 class="text-3xl font-bold font-playfair mb-2">
                <span class="gold-text-gradient">Siparişiniz Onaylandı!</span>
            </h1>
            <p class="text-gray-400">Teşekkür ederiz. Siparişiniz başarıyla oluşturuldu.</p>
        </div>

        <div class="bg-dark-light rounded-xl border border-gray-800 p-6 mb-6">
            <div class="grid grid-cols-2 gap-4 text-sm mb-6">
                <div>
                    <span class="text-gray-500">Sipariş No</span>
                    <p class="text-gold font-bold text-lg">{{ $order->order_number }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Tarih</span>
                    <p class="text-white">{{ $order->created_at->format('d.m.Y H:i') }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Ad Soyad</span>
                    <p class="text-white">{{ $order->full_name }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Durum</span>
                    <p class="text-green-400 font-semibold">{{ $order->status_label }}</p>
                </div>
            </div>

            <div class="border-t border-gray-700 pt-4">
                <h3 class="font-semibold mb-3 text-gold">Ürünler</h3>
                @foreach($order->items as $item)
                    <div class="flex justify-between py-2 text-sm">
                        <span class="text-gray-300">{{ $item->product_name }} x{{ $item->quantity }}</span>
                        <span class="text-white">{{ number_format($item->subtotal, 2) }} TL</span>
                    </div>
                @endforeach
                <div class="border-t border-gray-700 mt-3 pt-3 flex justify-between">
                    <span class="font-semibold">Toplam</span>
                    <span class="text-gold font-bold text-xl">{{ number_format($order->total, 2) }} TL</span>
                </div>
            </div>
        </div>

        <div class="bg-dark-light rounded-xl border border-gray-800 p-6 mb-8">
            <h3 class="font-semibold mb-3 text-gold">Teslimat Adresi</h3>
            <p class="text-gray-300 text-sm">
                {{ $order->address }}<br>
                {{ $order->district ? $order->district . ', ' : '' }}{{ $order->city }}
                {{ $order->postal_code ? '- ' . $order->postal_code : '' }}
            </p>
        </div>

        <div class="text-center">
            <a href="{{ route('home') }}" class="inline-block gold-gradient text-black font-semibold px-8 py-3 rounded-lg hover:opacity-90 transition">
                Ana Sayfaya Dön
            </a>
        </div>
    </div>
@endsection
