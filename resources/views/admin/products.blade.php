@extends('admin.layout')

@section('title', 'Ürünler')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Ürünler</h1>
        <a href="{{ route('admin.product.create') }}" class="bg-yellow-500 text-black font-semibold px-5 py-2.5 rounded-lg hover:bg-yellow-400 transition flex items-center gap-2 text-sm">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Yeni Ürün Ekle
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="text-left text-sm text-gray-500 border-b border-gray-100">
                    <th class="px-6 py-3 font-medium">Görsel</th>
                    <th class="px-6 py-3 font-medium">Ürün</th>
                    <th class="px-6 py-3 font-medium">Fiyat</th>
                    <th class="px-6 py-3 font-medium">İndirim</th>
                    <th class="px-6 py-3 font-medium">Stok</th>
                    <th class="px-6 py-3 font-medium">Durum</th>
                    <th class="px-6 py-3 font-medium"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr class="border-b border-gray-50 hover:bg-gray-50">
                        <td class="px-6 py-3">
                            <img src="{{ $product->image_url }}" alt="" class="w-14 h-14 object-cover rounded-lg bg-gray-100">
                        </td>
                        <td class="px-6 py-3">
                            <div class="text-sm font-medium text-gray-800">{{ $product->name }}</div>
                            <div class="text-xs text-gray-400">{{ $product->category }}</div>
                        </td>
                        <td class="px-6 py-3 font-semibold text-sm">{{ number_format($product->price, 2) }} TL</td>
                        <td class="px-6 py-3 text-sm">
                            @if($product->old_price && $product->old_price > $product->price)
                                <span class="text-red-500 font-medium">%{{ round((($product->old_price - $product->price) / $product->old_price) * 100) }}</span>
                                <span class="text-gray-400 text-xs line-through ml-1">{{ number_format($product->old_price, 2) }}</span>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-3 text-sm">{{ $product->stock }}</td>
                        <td class="px-6 py-3">
                            @if($product->is_active)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Aktif</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">Pasif</span>
                            @endif
                        </td>
                        <td class="px-6 py-3">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.product.edit', $product) }}" class="text-yellow-600 hover:text-yellow-700 text-sm font-medium">Düzenle</a>
                                <form action="{{ route('admin.product.delete', $product) }}" method="POST"
                                      onsubmit="return confirm('Bu ürünü silmek istediğinize emin misiniz?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium">Sil</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
