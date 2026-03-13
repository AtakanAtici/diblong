@extends('layouts.app')

@section('title', $product->name . ' - Diblong')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        {{-- Breadcrumb --}}
        <nav class="text-sm mb-8">
            <a href="{{ route('home') }}" class="text-gray-400 hover:text-gold transition">Ana Sayfa</a>
            <span class="text-gray-600 mx-2">/</span>
            <a href="{{ route('home') }}#urunler" class="text-gray-400 hover:text-gold transition">Ürünler</a>
            <span class="text-gray-600 mx-2">/</span>
            <span class="text-gold">{{ $product->name }}</span>
        </nav>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            {{-- Images --}}
            <div class="space-y-4">
                <div class="bg-gray-100 rounded-xl overflow-hidden aspect-square">
                    <img id="main-image" src="{{ $product->image_url }}" alt="{{ $product->name }}"
                         class="w-full h-full object-cover">
                </div>
                @if($product->image2)
                    <div class="flex gap-3">
                        <button onclick="document.getElementById('main-image').src='{{ $product->image_url }}'"
                                class="w-20 h-20 rounded-lg overflow-hidden border-2 border-gold bg-gray-100">
                            <img src="{{ $product->image_url }}" alt="" class="w-full h-full object-cover">
                        </button>
                        <button onclick="document.getElementById('main-image').src='{{ $product->image2_url }}'"
                                class="w-20 h-20 rounded-lg overflow-hidden border-2 border-gray-700 hover:border-gold bg-gray-100 transition">
                            <img src="{{ $product->image2_url }}" alt="" class="w-full h-full object-cover">
                        </button>
                    </div>
                @endif
            </div>

            {{-- Details --}}
            <div>
                <h1 class="text-3xl md:text-4xl font-bold font-playfair mb-4">{{ $product->name }}</h1>

                <div class="flex items-center gap-4 mb-6">
                    @if($product->old_price)
                        <span class="text-gray-500 line-through text-xl">{{ number_format($product->old_price, 2) }} TL</span>
                    @endif
                    <span class="text-gold font-bold text-3xl">{{ number_format($product->price, 2) }} TL</span>
                    @if($product->old_price)
                        <span class="bg-red-600 text-white text-sm px-2 py-1 rounded">
                            %{{ round((($product->old_price - $product->price) / $product->old_price) * 100) }} İndirim
                        </span>
                    @endif
                </div>

                <div class="text-gray-300 leading-relaxed mb-8 whitespace-pre-line">{{ $product->description }}</div>

                <form action="{{ route('cart.add') }}" method="POST" class="flex items-center gap-4 mb-8">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex items-center border border-gray-700 rounded-lg">
                        <button type="button" onclick="changeQty(-1)" class="px-4 py-3 text-gray-400 hover:text-white transition">-</button>
                        <input type="number" name="quantity" id="qty" value="1" min="1" max="10"
                               class="w-16 text-center bg-transparent border-x border-gray-700 py-3 text-white focus:outline-none">
                        <button type="button" onclick="changeQty(1)" class="px-4 py-3 text-gray-400 hover:text-white transition">+</button>
                    </div>
                    <button type="submit" class="flex-1 gold-gradient text-black font-semibold py-3 rounded-lg hover:opacity-90 transition text-lg">
                        Sepete Ekle
                    </button>
                </form>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex items-center gap-3 bg-dark-light rounded-lg p-4 border border-gray-800">
                        <svg class="w-5 h-5 text-gold flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-sm text-gray-300">%100 Doğal</span>
                    </div>
                    <div class="flex items-center gap-3 bg-dark-light rounded-lg p-4 border border-gray-800">
                        <svg class="w-5 h-5 text-gold flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-sm text-gray-300">Hızlı Teslimat</span>
                    </div>
                    <div class="flex items-center gap-3 bg-dark-light rounded-lg p-4 border border-gray-800">
                        <svg class="w-5 h-5 text-gold flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                        <span class="text-sm text-gray-300">Güvenli Ödeme</span>
                    </div>
                    <div class="flex items-center gap-3 bg-dark-light rounded-lg p-4 border border-gray-800">
                        <svg class="w-5 h-5 text-gold flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                        </svg>
                        <span class="text-sm text-gray-300">Gizli Paketleme</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Related Products --}}
        @if($relatedProducts->count())
            <div class="mt-20">
                <h2 class="text-2xl font-bold font-playfair mb-8">
                    <span class="gold-text-gradient">Diğer Ürünler</span>
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $related)
                        <div class="bg-dark-light rounded-xl overflow-hidden border border-gray-800 card-hover">
                            <a href="{{ route('product.detail', $related->slug) }}">
                                <div class="aspect-square overflow-hidden bg-gray-100">
                                    <img src="{{ $related->image_url }}" alt="{{ $related->name }}"
                                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                                </div>
                            </a>
                            <div class="p-4">
                                <a href="{{ route('product.detail', $related->slug) }}" class="font-semibold hover:text-gold transition block mb-2">{{ $related->name }}</a>
                                <span class="text-gold font-bold">{{ number_format($related->price, 2) }} TL</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection

@push('scripts')
<script>
    function changeQty(delta) {
        const input = document.getElementById('qty');
        let val = parseInt(input.value) + delta;
        if (val < 1) val = 1;
        if (val > 10) val = 10;
        input.value = val;
    }
</script>
@endpush
