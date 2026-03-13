@extends('layouts.app')

@section('title', 'Sıkça Sorulan Sorular - Diblong')

@section('content')
    {{-- Hero --}}
    <section class="relative overflow-hidden py-20">
        <div class="absolute inset-0 bg-gradient-to-b from-purple-950/20 via-dark to-dark"></div>
        <div class="absolute top-1/3 right-1/4 w-[400px] h-[400px] bg-yellow-600/5 rounded-full blur-[120px]"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-block text-gold text-xs font-bold tracking-widest uppercase mb-4 reveal">SSS</span>
            <h1 class="text-4xl md:text-5xl font-black font-playfair mb-4 reveal" data-delay="100">
                <span class="gold-text-gradient">Sıkça Sorulan Sorular</span>
            </h1>
            <p class="text-gray-500 max-w-xl mx-auto reveal" data-delay="200">
                Merak ettiğiniz her şeyin cevabı burada. Aradığınızı bulamazsanız bize ulaşmaktan çekinmeyin.
            </p>
        </div>
    </section>

    <section class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pb-24 -mt-4">
        <div class="space-y-4">
            {{-- FAQ 1 --}}
            <div class="reveal" data-delay="0">
                <div class="faq-item bg-dark-light rounded-2xl border border-white/5 overflow-hidden transition-all duration-500 hover:border-yellow-900/30">
                    <button onclick="toggleFaq(this)" class="w-full flex items-center justify-between p-6 text-left group">
                        <span class="flex items-center gap-4">
                            <span class="flex-shrink-0 w-8 h-8 gold-gradient rounded-lg flex items-center justify-center text-black font-bold text-sm">1</span>
                            <span class="font-semibold text-white group-hover:text-gold transition-colors duration-300">Siparişim gizli gelecek mi? Kargo içeriği dışarıdan belli olur mu?</span>
                        </span>
                        <svg class="faq-icon w-5 h-5 text-gray-500 flex-shrink-0 ml-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="faq-answer" style="max-height:0; overflow:hidden; transition: max-height 0.4s cubic-bezier(0.4,0,0.2,1), padding 0.4s ease;">
                        <div class="px-6 pb-6 pl-[4.5rem] text-gray-400 leading-relaxed text-sm">
                            Kesinlikle hayır. <span class="text-gold">Gizliliğiniz bizim onur sözümüzdür.</span> Siparişleriniz, içeriği asla belli etmeyen çift katlı siyah kargo poşetlerinde ve üzerinde ürün adına dair hiçbir ibare yer almadan gönderilir. Kargo etiketinde sadece gönderici bilgisi ve "Gıda" gibi genel bir tanım yer alır. Paketi sizden başka hiç kimse tahmin edemez.
                        </div>
                    </div>
                </div>
            </div>

            {{-- FAQ 2 --}}
            <div class="reveal" data-delay="80">
                <div class="faq-item bg-dark-light rounded-2xl border border-white/5 overflow-hidden transition-all duration-500 hover:border-yellow-900/30">
                    <button onclick="toggleFaq(this)" class="w-full flex items-center justify-between p-6 text-left group">
                        <span class="flex items-center gap-4">
                            <span class="flex-shrink-0 w-8 h-8 gold-gradient rounded-lg flex items-center justify-center text-black font-bold text-sm">2</span>
                            <span class="font-semibold text-white group-hover:text-gold transition-colors duration-300">Ürünün orijinal olduğunu nasıl anlayabilirim?</span>
                        </span>
                        <svg class="faq-icon w-5 h-5 text-gray-500 flex-shrink-0 ml-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="faq-answer" style="max-height:0; overflow:hidden; transition: max-height 0.4s cubic-bezier(0.4,0,0.2,1), padding 0.4s ease;">
                        <div class="px-6 pb-6 pl-[4.5rem] text-gray-400 leading-relaxed text-sm space-y-3">
                            <p>Piyasada bulunan taklitlerden korunmanız için güvenliğinizi en üst seviyede tutuyoruz. Satışını yaptığımız tüm Diblong ürünleri:</p>
                            <ul class="space-y-2">
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-gold flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span><span class="text-white font-medium">Hologramlıdır:</span> Kutu üzerinde markaya özel, taklit edilemez güvenlik hologramı bulunur.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-gold flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span><span class="text-white font-medium">Seri Numarası Sorgulama:</span> Ürün üzerindeki özel kodlar ve barkod aracılığıyla orijinallik doğrulaması yapabilirsiniz.</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-gold flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span><span class="text-white font-medium">Yetkili Satış Noktası:</span> Doğrudan üretici bandrolü ile gelen, kapalı kutu orijinal ürünlerin gönderimini sağlıyoruz.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FAQ 3 --}}
            <div class="reveal" data-delay="160">
                <div class="faq-item bg-dark-light rounded-2xl border border-white/5 overflow-hidden transition-all duration-500 hover:border-yellow-900/30">
                    <button onclick="toggleFaq(this)" class="w-full flex items-center justify-between p-6 text-left group">
                        <span class="flex items-center gap-4">
                            <span class="flex-shrink-0 w-8 h-8 gold-gradient rounded-lg flex items-center justify-center text-black font-bold text-sm">3</span>
                            <span class="font-semibold text-white group-hover:text-gold transition-colors duration-300">Nasıl kullanmalıyım ve etkisini ne zaman gösterir?</span>
                        </span>
                        <svg class="faq-icon w-5 h-5 text-gray-500 flex-shrink-0 ml-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="faq-answer" style="max-height:0; overflow:hidden; transition: max-height 0.4s cubic-bezier(0.4,0,0.2,1), padding 0.4s ease;">
                        <div class="px-6 pb-6 pl-[4.5rem] text-gray-400 leading-relaxed text-sm">
                            Maksimum güç ve performans için, aktiviteden yaklaşık <span class="text-gold font-medium">30-45 dakika önce</span> bir tatlı kaşığı tüketmeniz yeterlidir. Ürünü tükettikten sonra bir bardak su içmeniz, formülün vücuda daha hızlı nüfuz etmesini ve enerjinin optimize edilmesini sağlar.
                        </div>
                    </div>
                </div>
            </div>

            {{-- FAQ 4 --}}
            <div class="reveal" data-delay="240">
                <div class="faq-item bg-dark-light rounded-2xl border border-white/5 overflow-hidden transition-all duration-500 hover:border-yellow-900/30">
                    <button onclick="toggleFaq(this)" class="w-full flex items-center justify-between p-6 text-left group">
                        <span class="flex items-center gap-4">
                            <span class="flex-shrink-0 w-8 h-8 gold-gradient rounded-lg flex items-center justify-center text-black font-bold text-sm">4</span>
                            <span class="font-semibold text-white group-hover:text-gold transition-colors duration-300">Kimler kullanırken dikkatli olmalı?</span>
                        </span>
                        <svg class="faq-icon w-5 h-5 text-gray-500 flex-shrink-0 ml-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="faq-answer" style="max-height:0; overflow:hidden; transition: max-height 0.4s cubic-bezier(0.4,0,0.2,1), padding 0.4s ease;">
                        <div class="px-6 pb-6 pl-[4.5rem] text-gray-400 leading-relaxed text-sm space-y-3">
                            <p>Ürünümüz bitkisel içerikli olsa da vücutta yoğun bir enerji ve kan akışı değişimi yaratır. Bu nedenle:</p>
                            <div class="bg-red-950/20 border border-red-900/20 rounded-xl p-4 space-y-2">
                                <p class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-red-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                                    <span><span class="text-red-400 font-medium">Kalp ve Tansiyon Hastaları:</span> Kronik kalp rahatsızlığı veya tansiyon problemi olan kişilerin kullanması kesinlikle önerilmez.</span>
                                </p>
                                <p class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-red-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                                    <span><span class="text-red-400 font-medium">Yaş Sınırı:</span> Ürünlerimiz sadece 18 yaş ve üzeri yetişkinlerin kullanımına uygundur.</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FAQ 5 --}}
            <div class="reveal" data-delay="320">
                <div class="faq-item bg-dark-light rounded-2xl border border-white/5 overflow-hidden transition-all duration-500 hover:border-yellow-900/30">
                    <button onclick="toggleFaq(this)" class="w-full flex items-center justify-between p-6 text-left group">
                        <span class="flex items-center gap-4">
                            <span class="flex-shrink-0 w-8 h-8 gold-gradient rounded-lg flex items-center justify-center text-black font-bold text-sm">5</span>
                            <span class="font-semibold text-white group-hover:text-gold transition-colors duration-300">Alkol ile birlikte tüketebilir miyim?</span>
                        </span>
                        <svg class="faq-icon w-5 h-5 text-gray-500 flex-shrink-0 ml-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="faq-answer" style="max-height:0; overflow:hidden; transition: max-height 0.4s cubic-bezier(0.4,0,0.2,1), padding 0.4s ease;">
                        <div class="px-6 pb-6 pl-[4.5rem] text-gray-400 leading-relaxed text-sm">
                            Diblong'un sunduğu o saf kuvveti tam verimle deneyimlemek için <span class="text-gold font-medium">alkol ile birlikte tüketilmesini önermiyoruz.</span> Alkol, formüldeki bileşenlerin etkisini zayıflatabilir veya baş ağrısı, çarpıntı gibi istenmeyen durumları tetikleyebilir. En yüksek performans için alkolsüz tüketim tavsiye edilir.
                        </div>
                    </div>
                </div>
            </div>

            {{-- FAQ 6 --}}
            <div class="reveal" data-delay="400">
                <div class="faq-item bg-dark-light rounded-2xl border border-white/5 overflow-hidden transition-all duration-500 hover:border-yellow-900/30">
                    <button onclick="toggleFaq(this)" class="w-full flex items-center justify-between p-6 text-left group">
                        <span class="flex items-center gap-4">
                            <span class="flex-shrink-0 w-8 h-8 gold-gradient rounded-lg flex items-center justify-center text-black font-bold text-sm">6</span>
                            <span class="font-semibold text-white group-hover:text-gold transition-colors duration-300">Herhangi bir yan etkisi var mı?</span>
                        </span>
                        <svg class="faq-icon w-5 h-5 text-gray-500 flex-shrink-0 ml-4 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="faq-answer" style="max-height:0; overflow:hidden; transition: max-height 0.4s cubic-bezier(0.4,0,0.2,1), padding 0.4s ease;">
                        <div class="px-6 pb-6 pl-[4.5rem] text-gray-400 leading-relaxed text-sm">
                            Önerilen kullanım miktarına (<span class="text-white font-medium">24 saatte en fazla 1 adet/porsiyon</span>) uyulduğu sürece güvenlidir. Vücudun anlık enerji artışına bağlı olarak hafif bir yüz kızarması veya kısa süreli bir sıcaklık hissi normaldir. Bol su tüketimi, vücudunuzun bu enerji artışına mükemmel uyum sağlamasına yardımcı olur.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- CTA --}}
        <div class="text-center mt-16 reveal" data-delay="200">
            <p class="text-gray-500 mb-4">Başka sorunuz mu var?</p>
            <a href="{{ route('contact') }}" class="btn-shimmer inline-flex items-center gap-2 gold-gradient text-black font-bold px-8 py-3.5 rounded-full hover:scale-105 transition-transform duration-300 tracking-wide">
                Bize Ulaşın
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    function toggleFaq(btn) {
        const item = btn.closest('.faq-item');
        const answer = item.querySelector('.faq-answer');
        const icon = item.querySelector('.faq-icon');
        const isOpen = answer.style.maxHeight !== '0px' && answer.style.maxHeight !== '';

        // Close all others
        document.querySelectorAll('.faq-item').forEach(other => {
            if (other !== item) {
                other.querySelector('.faq-answer').style.maxHeight = '0px';
                other.querySelector('.faq-icon').style.transform = 'rotate(0deg)';
                other.querySelector('.faq-answer > div').style.opacity = '0';
            }
        });

        if (isOpen) {
            answer.style.maxHeight = '0px';
            icon.style.transform = 'rotate(0deg)';
            answer.querySelector('div').style.opacity = '0';
        } else {
            answer.style.maxHeight = answer.scrollHeight + 'px';
            icon.style.transform = 'rotate(180deg)';
            setTimeout(() => answer.querySelector('div').style.opacity = '1', 100);
        }
    }

    // Add opacity transition to answer divs
    document.querySelectorAll('.faq-answer > div').forEach(div => {
        div.style.transition = 'opacity 0.3s ease';
        div.style.opacity = '0';
    });
</script>
@endpush
