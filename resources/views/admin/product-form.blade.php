@extends('admin.layout')

@section('title', $product ? 'Ürün Düzenle' : 'Yeni Ürün Ekle')

@section('content')
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.products') }}" class="text-gray-400 hover:text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-gray-800">{{ $product ? 'Ürün Düzenle' : 'Yeni Ürün Ekle' }}</h1>
    </div>

    <form action="{{ $product ? route('admin.product.update', $product) : route('admin.product.store') }}"
          method="POST" enctype="multipart/form-data" class="max-w-4xl">
        @csrf
        @if($product)
            @method('PUT')
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Genel Bilgiler</h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ürün Adı *</label>
                    <input type="text" name="name" value="{{ old('name', $product?->name) }}" required
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-yellow-500">
                    @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kısa Açıklama</label>
                    <input type="text" name="short_description" value="{{ old('short_description', $product?->short_description) }}"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-yellow-500"
                           placeholder="Ürün listesinde görünecek kısa açıklama">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Açıklama *</label>
                    <textarea name="description" rows="6" required
                              class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-yellow-500">{{ old('description', $product?->description) }}</textarea>
                    @error('description') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kategori *</label>
                    <select name="category" required
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-yellow-500">
                        <option value="erkek" {{ old('category', $product?->category) == 'erkek' ? 'selected' : '' }}>Erkek</option>
                        <option value="kadin" {{ old('category', $product?->category) == 'kadin' ? 'selected' : '' }}>Kadın</option>
                        <option value="genel" {{ old('category', $product?->category) == 'genel' ? 'selected' : '' }}>Genel</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Fiyat & Stok</h2>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Fiyat (TL) *</label>
                    <input type="number" name="price" value="{{ old('price', $product?->price) }}" step="0.01" min="0" required
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-yellow-500">
                    @error('price') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Eski Fiyat (TL)</label>
                    <input type="number" name="old_price" value="{{ old('old_price', $product?->old_price) }}" step="0.01" min="0"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-yellow-500"
                           placeholder="Boş = indirim yok">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Stok *</label>
                    <input type="number" name="stock" value="{{ old('stock', $product?->stock ?? 100) }}" min="0" required
                           class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-yellow-500">
                    @error('stock') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Görseller</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ana Görsel {{ $product ? '' : '*' }}</label>
                    @if($product && $product->image)
                        <div class="mb-2">
                            <img src="{{ $product->image_url }}" alt="" class="w-32 h-32 object-cover rounded-lg bg-gray-100">
                        </div>
                    @endif
                    <input type="file" name="image_file" accept="image/*" {{ $product ? '' : 'required' }}
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm file:mr-3 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100">
                    @error('image_file') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">İkinci Görsel</label>
                    @if($product && $product->image2)
                        <div class="mb-2">
                            <img src="{{ $product->image2_url }}" alt="" class="w-32 h-32 object-cover rounded-lg bg-gray-100">
                        </div>
                    @endif
                    <input type="file" name="image2_file" accept="image/*"
                           class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm file:mr-3 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100">
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <label class="flex items-center gap-3">
                <input type="checkbox" name="is_active" value="1"
                       {{ old('is_active', $product?->is_active ?? true) ? 'checked' : '' }}
                       class="rounded border-gray-300 text-yellow-500 focus:ring-yellow-500 w-5 h-5">
                <span class="text-sm font-medium text-gray-700">Ürün aktif (sitede görünsün)</span>
            </label>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="bg-yellow-500 text-black font-semibold px-8 py-3 rounded-lg hover:bg-yellow-400 transition">
                {{ $product ? 'Değişiklikleri Kaydet' : 'Ürünü Ekle' }}
            </button>
            <a href="{{ route('admin.products') }}" class="text-gray-500 hover:text-gray-700 text-sm">İptal</a>
        </div>
    </form>
@endsection
