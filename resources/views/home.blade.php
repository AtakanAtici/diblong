@extends('layouts.app')

@section('title', 'Diblong - Doğal Güç Arttırıcı Takviye')

@section('content')
    {{-- Hero Section --}}
    <section class="relative overflow-hidden min-h-[90vh] flex items-center">
        {{-- Background effects --}}
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-br from-purple-950/40 via-dark to-dark"></div>
            <div class="absolute top-1/4 left-1/4 w-[500px] h-[500px] bg-purple-600/10 rounded-full blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-[400px] h-[400px] bg-yellow-600/10 rounded-full blur-[120px]" style="animation: pulse 3s ease-in-out infinite 1s;"></div>
        </div>

        {{-- Particles --}}
        <div class="particle w-2 h-2" style="top:15%; left:10%; animation-delay:0s;"></div>
        <div class="particle w-3 h-3" style="top:60%; left:85%; animation-delay:2s;"></div>
        <div class="particle w-1.5 h-1.5" style="top:30%; left:70%; animation-delay:1s;"></div>
        <div class="particle w-2 h-2" style="top:75%; left:25%; animation-delay:3s;"></div>
        <div class="particle w-1 h-1" style="top:45%; left:50%; animation-delay:1.5s;"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24 w-full">
            <div class="flex flex-col md:flex-row items-center gap-12 lg:gap-20">
                {{-- Text --}}
                <div class="flex-1 text-center md:text-left">
                    <div class="reveal" data-delay="0">
                        <span class="inline-block gold-gradient text-black text-xs font-bold px-4 py-1.5 rounded-full mb-6 tracking-widest uppercase">
                            %100 Doğal Bitkisel Takviye
                        </span>
                    </div>
                    <h1 class="text-5xl md:text-7xl font-black font-playfair mb-6 leading-tight reveal" data-delay="100">
                        <span class="gold-text-gradient">Doğal Güç,</span><br>
                        <span class="text-white">Gerçek Etki.</span>
                    </h1>
                    <p class="text-gray-400 text-lg md:text-xl mb-10 max-w-xl leading-relaxed reveal" data-delay="200">
                        Doğanın derinliklerinde saklı kalan kadim kuvvet sırlarını modern bilimle harmanlıyoruz.
                        <span class="text-gold">Güvenli & hızlı</span> adresinize kadar teslim!
                    </p>
                    <div class="flex flex-col sm:flex-row items-center gap-4 reveal" data-delay="300">
                        <a href="#urunler" class="btn-shimmer gold-gradient text-black font-bold px-10 py-4 rounded-full text-lg glow-pulse hover:scale-105 transition-transform duration-300 w-full sm:w-auto text-center">
                            Ürünleri Keşfet
                        </a>
                        <a href="#hakkimizda" class="text-gray-400 hover:text-gold transition-colors duration-300 flex items-center gap-2 group">
                            <span class="w-10 h-10 rounded-full border border-gray-700 flex items-center justify-center group-hover:border-gold transition-colors duration-300">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </span>
                            Daha Fazla Bilgi
                        </a>
                    </div>
                </div>

                {{-- Hero Image --}}
                <div class="flex-1 flex justify-center reveal-scale" data-delay="200">
                    <div class="relative">
                        {{-- Glow ring behind --}}
                        <div class="absolute inset-0 m-auto w-72 h-72 md:w-96 md:h-96 rounded-full bg-gradient-to-br from-purple-600/20 via-yellow-600/10 to-transparent blur-2xl"></div>
                        <img src="{{ asset('assets/hero_bull.jpeg') }}" alt="Diblong"
                             class="relative w-72 md:w-[26rem] rounded-2xl float shadow-2xl shadow-purple-900/30">
                    </div>
                </div>
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 reveal" data-delay="600">
            <div class="w-6 h-10 border-2 border-gray-700 rounded-full flex justify-center pt-2">
                <div class="w-1 h-2 bg-gold rounded-full" style="animation: scrollBounce 1.5s ease-in-out infinite;"></div>
            </div>
        </div>
    </section>

    {{-- Trust bar --}}
    <section class="border-y border-white/5 bg-dark-light/50 backdrop-blur reveal">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="reveal" data-delay="0">
                    <div class="text-2xl md:text-3xl font-bold text-gold counter" data-target="5000">0</div>
                    <div class="text-gray-500 text-xs mt-1 uppercase tracking-wider">Mutlu Müşteri</div>
                </div>
                <div class="reveal" data-delay="100">
                    <div class="text-2xl md:text-3xl font-bold text-gold counter" data-target="8">0</div>
                    <div class="text-gray-500 text-xs mt-1 uppercase tracking-wider">Ürün Çeşidi</div>
                </div>
                <div class="reveal" data-delay="200">
                    <div class="text-2xl md:text-3xl font-bold text-white">%100</div>
                    <div class="text-gray-500 text-xs mt-1 uppercase tracking-wider">Doğal İçerik</div>
                </div>
                <div class="reveal" data-delay="300">
                    <div class="text-2xl md:text-3xl font-bold text-gold flex items-center justify-center gap-1">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        4.9
                    </div>
                    <div class="text-gray-500 text-xs mt-1 uppercase tracking-wider">Müşteri Puanı</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Banner --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 reveal-scale" data-delay="100">
        <div class="relative rounded-2xl overflow-hidden group">
            <img src="{{ asset('assets/banner.jpeg') }}" alt="Diblong Banner" class="w-full transition-transform duration-700 group-hover:scale-105">
            <div class="absolute inset-0 bg-gradient-to-r from-black/30 via-transparent to-black/30"></div>
        </div>
    </section>

    {{-- Products Section --}}
    <section id="urunler" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center mb-16 reveal">
            <span class="inline-block text-gold text-xs font-bold tracking-widest uppercase mb-4">Koleksiyon</span>
            <h2 class="text-4xl md:text-5xl font-black font-playfair mb-5">
                <span class="gold-text-gradient">Ürünlerimiz</span>
            </h2>
            <p class="text-gray-500 max-w-2xl mx-auto leading-relaxed">
                En seçkin doğal bileşenlerin bir araya gelmesiyle oluşan, saf kuvvet ve dayanıklılık odaklı özel formülasyonlar.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-7">
            @foreach($products as $index => $product)
                <div class="reveal h-full" data-delay="{{ $index * 80 }}">
                    <div class="bg-dark-light rounded-2xl overflow-hidden border border-white/5 card-hover gradient-border group flex flex-col h-full">
                        <a href="{{ route('product.detail', $product->slug) }}" class="block relative flex-shrink-0">
                            <div class="aspect-square overflow-hidden bg-gray-100">
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                     class="w-full h-full object-contain transition-transform duration-700 group-hover:scale-110">
                            </div>
                            @if($product->old_price)
                                <span class="absolute top-3 left-3 bg-red-500 text-white text-[10px] font-bold px-2.5 py-1 rounded-full tracking-wide">
                                    %{{ round((($product->old_price - $product->price) / $product->old_price) * 100) }} İNDİRİM
                                </span>
                            @endif
                        </a>
                        <div class="p-5 flex flex-col flex-1">
                            <a href="{{ route('product.detail', $product->slug) }}" class="block">
                                <h3 class="font-semibold text-[15px] mb-2 group-hover:text-gold transition-colors duration-300 line-clamp-1">{{ $product->name }}</h3>
                            </a>
                            <p class="text-gray-500 text-xs mb-4 line-clamp-2 leading-relaxed">{{ $product->short_description }}</p>
                            <div class="flex items-end justify-between mt-auto">
                                <div class="flex flex-col">
                                    @if($product->old_price)
                                        <span class="text-gray-600 line-through text-xs">{{ number_format($product->old_price, 2) }} TL</span>
                                    @endif
                                    <span class="text-gold font-bold text-lg">{{ number_format($product->price, 2) }} TL</span>
                                </div>
                                <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn-shimmer gold-gradient text-black px-4 py-2.5 rounded-full text-xs font-bold hover:scale-105 transition-transform duration-300 tracking-wide uppercase">
                                        Sepete Ekle
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Features Section --}}
    <section class="relative overflow-hidden py-24">
        <div class="absolute inset-0 bg-dark-light"></div>
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-1/3 w-80 h-80 bg-yellow-500 rounded-full blur-[100px]"></div>
            <div class="absolute bottom-0 right-1/3 w-60 h-60 bg-purple-500 rounded-full blur-[100px]"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 reveal">
                <span class="inline-block text-gold text-xs font-bold tracking-widest uppercase mb-4">Avantajlar</span>
                <h2 class="text-4xl md:text-5xl font-black font-playfair">
                    <span class="gold-text-gradient">Neden Diblong?</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="reveal" data-delay="0">
                    <div class="bg-dark/60 backdrop-blur rounded-2xl p-7 border border-white/5 text-center group hover:border-yellow-900/30 transition-all duration-500 h-full">
                        <div class="w-16 h-16 gold-gradient rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 shadow-lg shadow-yellow-900/20">
                            <svg class="w-7 h-7 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold mb-2">%100 Doğal</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Tüm ürünlerimiz doğal bitkisel bileşenlerden üretilmektedir.</p>
                    </div>
                </div>
                <div class="reveal" data-delay="100">
                    <div class="bg-dark/60 backdrop-blur rounded-2xl p-7 border border-white/5 text-center group hover:border-yellow-900/30 transition-all duration-500 h-full">
                        <div class="w-16 h-16 gold-gradient rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 shadow-lg shadow-yellow-900/20">
                            <svg class="w-7 h-7 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold mb-2">Hızlı Etki</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Özel formülasyonumuz sayesinde hızlı ve uzun süreli etki sağlar.</p>
                    </div>
                </div>
                <div class="reveal" data-delay="200">
                    <div class="bg-dark/60 backdrop-blur rounded-2xl p-7 border border-white/5 text-center group hover:border-yellow-900/30 transition-all duration-500 h-full">
                        <div class="w-16 h-16 gold-gradient rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 shadow-lg shadow-yellow-900/20">
                            <svg class="w-7 h-7 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold mb-2">Gizli Paketleme</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Siparişleriniz gizlilik ilkesiyle, güvenli şekilde teslim edilir.</p>
                    </div>
                </div>
                <div class="reveal" data-delay="300">
                    <div class="bg-dark/60 backdrop-blur rounded-2xl p-7 border border-white/5 text-center group hover:border-yellow-900/30 transition-all duration-500 h-full">
                        <div class="w-16 h-16 gold-gradient rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 group-hover:rotate-3 transition-all duration-500 shadow-lg shadow-yellow-900/20">
                            <svg class="w-7 h-7 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <h3 class="text-white font-semibold mb-2">Kalite Garantisi</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">Sertifikalı üretim süreçleri ile en yüksek kalite standartları.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- About / CTA Section --}}
    <section id="hakkimizda" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div class="reveal-left">
                <div class="relative">
                    <div class="absolute -inset-4 bg-gradient-to-br from-yellow-600/20 to-purple-600/10 rounded-3xl blur-2xl"></div>
                    <img src="{{ asset('assets/logo_black.jpeg') }}" alt="Diblong"
                         class="relative w-full max-w-sm mx-auto rounded-2xl shadow-2xl">
                </div>
            </div>
            <div class="reveal-right">
                <span class="inline-block text-gold text-xs font-bold tracking-widest uppercase mb-4">Hakkımızda</span>
                <h2 class="text-3xl md:text-4xl font-black font-playfair mb-6 leading-tight">
                    Doğal Bileşenlerin Gücünü<br>
                    <span class="gold-text-gradient">Bilimle Birleştiriyoruz</span>
                </h2>
                <p class="text-gray-400 leading-relaxed mb-6">
                    Diblong, sadece bir takviye değil; potansiyelini zirveye taşıyan bir yaşam anahtarıdır.
                    Doğanın derinliklerinde saklı kalan kadim kuvvet sırlarını modern bilimle harmanlayarak,
                    size hayatın her anında ihtiyaç duyduğunuz o özel enerjiyi sunmak için yola çıktık.
                </p>
                <p class="text-gray-500 leading-relaxed mb-8">
                    Günün yorgunluğunu geride bırakmak, tutkularınızı yeniden canlandırmak ve kendinizin en güçlü
                    versiyonuyla tanışmak artık çok daha kolay. Şıklığı ve kaliteyi bir araya getiren prestijli
                    sunumumuzla, sizi sıradanlıktan uzaklaşıp zirveyi deneyimlemeye davet ediyoruz.
                </p>
                <a href="#urunler" class="btn-shimmer inline-flex items-center gap-3 gold-gradient text-black font-bold px-8 py-4 rounded-full hover:scale-105 transition-transform duration-300">
                    Hemen Keşfet
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- CTA Banner --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-20 reveal-scale">
        <div class="relative rounded-3xl overflow-hidden">
            <div class="absolute inset-0 gold-gradient opacity-90"></div>
            <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23000%22%20fill-opacity%3D%220.05%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-30"></div>
            <div class="relative text-center px-8 py-16 md:py-20">
                <h2 class="text-3xl md:text-4xl font-black font-playfair text-black mb-4">
                    Gücünüzü Keşfetmeye Hazır Mısınız?
                </h2>
                <p class="text-black/70 mb-8 max-w-lg mx-auto">
                    Unutmayın, gerçek güç; doğru enerjiyle buluştuğunda başlar.
                </p>
                <a href="#urunler" class="inline-block bg-black text-gold font-bold px-10 py-4 rounded-full hover:bg-gray-900 hover:scale-105 transition-all duration-300 shadow-xl">
                    Alışverişe Başla
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // Add to cart with animation
    document.querySelectorAll('.add-to-cart-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const btn = this.querySelector('button');
            const originalText = btn.textContent;

            btn.style.transform = 'scale(0.95)';
            btn.textContent = 'Eklendi!';

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    const counter = document.getElementById('cart-count');
                    counter.textContent = data.count;
                    counter.classList.remove('hidden');
                    counter.classList.add('cart-bounce');
                    setTimeout(() => counter.classList.remove('cart-bounce'), 500);
                }
                setTimeout(() => {
                    btn.textContent = originalText;
                    btn.style.transform = '';
                }, 1500);
            });
        });
    });

    // Counter animation
    const counters = document.querySelectorAll('.counter');
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.dataset.target);
                let current = 0;
                const step = target / 60;
                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        el.textContent = target.toLocaleString('tr-TR') + '+';
                        clearInterval(timer);
                    } else {
                        el.textContent = Math.floor(current).toLocaleString('tr-TR');
                    }
                }, 25);
                counterObserver.unobserve(el);
            }
        });
    }, { threshold: 0.5 });
    counters.forEach(c => counterObserver.observe(c));

    // Scroll indicator bounce
    const style = document.createElement('style');
    style.textContent = `
        @keyframes scrollBounce {
            0%, 100% { transform: translateY(0); opacity: 1; }
            50% { transform: translateY(6px); opacity: 0.3; }
        }
    `;
    document.head.appendChild(style);
</script>
@endpush
