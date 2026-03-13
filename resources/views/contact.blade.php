@extends('layouts.app')

@section('title', 'İletişim - Diblong')

@section('content')
    {{-- Hero --}}
    <section class="relative overflow-hidden py-20">
        <div class="absolute inset-0 bg-gradient-to-b from-purple-950/20 via-dark to-dark"></div>
        <div class="absolute top-1/3 left-1/3 w-[400px] h-[400px] bg-yellow-600/5 rounded-full blur-[120px]"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block text-gold text-xs font-bold tracking-widest uppercase mb-4 reveal">İletişim</span>
            <h1 class="text-4xl md:text-5xl font-black font-playfair mb-4 reveal" data-delay="100">
                <span class="gold-text-gradient">Bizimle İletişime Geçin</span>
            </h1>
            <p class="text-gray-500 max-w-xl mx-auto reveal" data-delay="200">
                Sorularınız, önerileriniz veya işbirliği talepleriniz için bize ulaşın. En kısa sürede dönüş yapacağız.
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24 -mt-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Contact Info Cards --}}
            <div class="space-y-5">
                <div class="reveal" data-delay="0">
                    <div class="bg-dark-light rounded-2xl border border-white/5 p-6 group hover:border-yellow-900/30 transition-all duration-500">
                        <div class="w-12 h-12 gold-gradient rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 shadow-lg shadow-yellow-900/20">
                            <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold mb-1">E-posta</h3>
                        <p class="text-gray-500 text-sm">diblongmacun@gmail.com</p>
                    </div>
                </div>

                <div class="reveal" data-delay="100">
                    <div class="bg-dark-light rounded-2xl border border-white/5 p-6 group hover:border-yellow-900/30 transition-all duration-500">
                        <div class="w-12 h-12 gold-gradient rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 shadow-lg shadow-yellow-900/20">
                            <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold mb-1">WhatsApp Sipariş Hattı</h3>
                        <p class="text-gray-500 text-sm">0533 323 18 70</p>
                    </div>
                </div>

                <div class="reveal" data-delay="200">
                    <div class="bg-dark-light rounded-2xl border border-white/5 p-6 group hover:border-yellow-900/30 transition-all duration-500">
                        <div class="w-12 h-12 gold-gradient rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 shadow-lg shadow-yellow-900/20">
                            <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold mb-1">Adres</h3>
                        <p class="text-gray-500 text-sm">İstanbul, Türkiye</p>
                    </div>
                </div>

            </div>

            {{-- Contact Form --}}
            <div class="lg:col-span-2 reveal-right" data-delay="100">
                <div class="bg-dark-light rounded-2xl border border-white/5 p-8 gradient-border">
                    <h2 class="text-xl font-bold font-playfair mb-6">
                        <span class="gold-text-gradient">Mesaj Gönderin</span>
                    </h2>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm text-gray-400 mb-1.5">Ad Soyad *</label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                       class="w-full bg-dark border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition-colors duration-300 placeholder-gray-600"
                                       placeholder="Adınız Soyadınız">
                                @error('name') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-1.5">E-posta *</label>
                                <input type="email" name="email" value="{{ old('email') }}" required
                                       class="w-full bg-dark border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition-colors duration-300 placeholder-gray-600"
                                       placeholder="ornek@email.com">
                                @error('email') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-1.5">Telefon</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}"
                                       class="w-full bg-dark border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition-colors duration-300 placeholder-gray-600"
                                       placeholder="05XX XXX XX XX">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-1.5">Konu *</label>
                                <select name="subject" required
                                        class="w-full bg-dark border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition-colors duration-300">
                                    <option value="" class="text-gray-600">Konu seçin...</option>
                                    <option value="Genel Bilgi" {{ old('subject') == 'Genel Bilgi' ? 'selected' : '' }}>Genel Bilgi</option>
                                    <option value="Sipariş Takibi" {{ old('subject') == 'Sipariş Takibi' ? 'selected' : '' }}>Sipariş Takibi</option>
                                    <option value="İade / Değişim" {{ old('subject') == 'İade / Değişim' ? 'selected' : '' }}>İade / Değişim</option>
                                    <option value="Ürün Bilgisi" {{ old('subject') == 'Ürün Bilgisi' ? 'selected' : '' }}>Ürün Bilgisi</option>
                                    <option value="İş Birliği" {{ old('subject') == 'İş Birliği' ? 'selected' : '' }}>İş Birliği</option>
                                    <option value="Diğer" {{ old('subject') == 'Diğer' ? 'selected' : '' }}>Diğer</option>
                                </select>
                                @error('subject') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm text-gray-400 mb-1.5">Mesajınız *</label>
                            <textarea name="message" rows="5" required
                                      class="w-full bg-dark border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition-colors duration-300 placeholder-gray-600 resize-none"
                                      placeholder="Mesajınızı buraya yazın...">{{ old('message') }}</textarea>
                            @error('message') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="btn-shimmer gold-gradient text-black font-bold px-8 py-3.5 rounded-full hover:scale-105 transition-transform duration-300 tracking-wide">
                            Mesaj Gönder
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
