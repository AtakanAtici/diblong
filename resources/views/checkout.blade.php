@extends('layouts.app')

@section('title', 'Ödeme - Diblong')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold font-playfair mb-8">
            <span class="gold-text-gradient">Ödeme</span>
        </h1>

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Form --}}
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-dark-light rounded-xl border border-gray-800 p-6">
                        <h2 class="text-lg font-semibold mb-4 text-gold">Teslimat Bilgileri</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm text-gray-400 mb-1">Ad *</label>
                                <input type="text" name="first_name" value="{{ old('first_name') }}" required
                                       class="w-full bg-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gold transition">
                                @error('first_name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-1">Soyad *</label>
                                <input type="text" name="last_name" value="{{ old('last_name') }}" required
                                       class="w-full bg-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gold transition">
                                @error('last_name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-1">E-posta *</label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                       class="w-full bg-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gold transition">
                                @error('email') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-1">Telefon *</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" required
                                       class="w-full bg-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gold transition">
                                @error('phone') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-1">İl *</label>
                                <input type="text" name="city" value="{{ old('city') }}" required
                                       class="w-full bg-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gold transition">
                                @error('city') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-1">İlçe</label>
                                <input type="text" name="district" value="{{ old('district') }}"
                                       class="w-full bg-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gold transition">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-sm text-gray-400 mb-1">Adres *</label>
                                <textarea name="address" rows="3" required
                                          class="w-full bg-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gold transition">{{ old('address') }}</textarea>
                                @error('address') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-1">Posta Kodu</label>
                                <input type="text" name="postal_code" value="{{ old('postal_code') }}"
                                       class="w-full bg-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gold transition">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-1">Sipariş Notu</label>
                                <input type="text" name="note" value="{{ old('note') }}"
                                       class="w-full bg-dark border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gold transition">
                            </div>
                        </div>
                    </div>

                    <div class="bg-dark-light rounded-xl border border-gray-800 p-6">
                        <h2 class="text-lg font-semibold mb-4 text-gold">Ödeme Bilgileri</h2>
                        <div class="bg-dark rounded-lg border border-yellow-900/50 p-4">
                            <p class="text-yellow-500/80 text-sm flex items-center gap-2">
                                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Kapıda ödeme seçeneği aktiftir. Sanal pos yakında eklenecektir.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Order Summary --}}
                <div>
                    <div class="bg-dark-light rounded-xl border border-gray-800 p-6 sticky top-24">
                        <h2 class="text-lg font-semibold mb-4 text-gold">Sipariş Özeti</h2>
                        <div class="space-y-3 mb-4">
                            @foreach($cartItems as $item)
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-400">{{ $item['product']->name }} x{{ $item['quantity'] }}</span>
                                    <span class="text-white">{{ number_format($item['subtotal'], 2) }} TL</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="border-t border-gray-700 pt-4 mb-6">
                            <div class="flex justify-between">
                                <span class="font-semibold">Toplam</span>
                                <span class="text-xl font-bold text-gold">{{ number_format($total, 2) }} TL</span>
                            </div>
                        </div>
                        <button type="submit" class="w-full gold-gradient text-black font-semibold py-4 rounded-lg hover:opacity-90 transition text-lg">
                            Siparişi Onayla
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
