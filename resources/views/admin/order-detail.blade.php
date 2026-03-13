@extends('admin.layout')

@section('title', 'Sipariş ' . $order->order_number)

@section('content')
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.orders') }}" class="text-gray-400 hover:text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Sipariş {{ $order->order_number }}</h1>
        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
            {{ $order->status_color === 'green' ? 'bg-green-100 text-green-800' : '' }}
            {{ $order->status_color === 'yellow' ? 'bg-yellow-100 text-yellow-800' : '' }}
            {{ $order->status_color === 'blue' ? 'bg-blue-100 text-blue-800' : '' }}
            {{ $order->status_color === 'indigo' ? 'bg-indigo-100 text-indigo-800' : '' }}
            {{ $order->status_color === 'purple' ? 'bg-purple-100 text-purple-800' : '' }}
            {{ $order->status_color === 'red' ? 'bg-red-100 text-red-800' : '' }}
        ">{{ $order->status_label }}</span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Order Info --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Items --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Ürünler</h2>
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-sm text-gray-500 border-b border-gray-100">
                            <th class="pb-3 font-medium">Ürün</th>
                            <th class="pb-3 font-medium">Fiyat</th>
                            <th class="pb-3 font-medium">Adet</th>
                            <th class="pb-3 font-medium text-right">Ara Toplam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr class="border-b border-gray-50">
                                <td class="py-3 font-medium text-gray-800">{{ $item->product_name }}</td>
                                <td class="py-3 text-gray-600">{{ number_format($item->price, 2) }} TL</td>
                                <td class="py-3 text-gray-600">{{ $item->quantity }}</td>
                                <td class="py-3 text-right font-semibold">{{ number_format($item->subtotal, 2) }} TL</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="pt-4 text-right font-semibold text-gray-800">Toplam:</td>
                            <td class="pt-4 text-right text-xl font-bold text-yellow-600">{{ number_format($order->total, 2) }} TL</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            {{-- Customer Info --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Müşteri Bilgileri</h2>
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <span class="text-gray-500">Ad Soyad</span>
                        <p class="font-medium text-gray-800">{{ $order->full_name }}</p>
                    </div>
                    <div>
                        <span class="text-gray-500">E-posta</span>
                        <p class="font-medium text-gray-800">{{ $order->email }}</p>
                    </div>
                    <div>
                        <span class="text-gray-500">Telefon</span>
                        <p class="font-medium text-gray-800">{{ $order->phone }}</p>
                    </div>
                    <div>
                        <span class="text-gray-500">Şehir</span>
                        <p class="font-medium text-gray-800">{{ $order->city }}{{ $order->district ? ', ' . $order->district : '' }}</p>
                    </div>
                    <div class="col-span-2">
                        <span class="text-gray-500">Adres</span>
                        <p class="font-medium text-gray-800">{{ $order->address }} {{ $order->postal_code }}</p>
                    </div>
                    @if($order->note)
                        <div class="col-span-2">
                            <span class="text-gray-500">Sipariş Notu</span>
                            <p class="font-medium text-gray-800">{{ $order->note }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Status Update --}}
        <div>
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sticky top-6">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Durumu Güncelle</h2>
                <form action="{{ route('admin.order.status', $order) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    <select name="status" class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:border-yellow-500">
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Beklemede</option>
                        <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Onaylandı</option>
                        <option value="preparing" {{ $order->status == 'preparing' ? 'selected' : '' }}>Hazırlanıyor</option>
                        <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Kargoya Verildi</option>
                        <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Teslim Edildi</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>İptal Edildi</option>
                    </select>
                    <button type="submit" class="w-full bg-yellow-500 text-black font-semibold py-3 rounded-lg hover:bg-yellow-400 transition">
                        Durumu Güncelle
                    </button>
                </form>

                <div class="mt-6 pt-6 border-t border-gray-100 text-sm text-gray-500">
                    <p>Oluşturulma: {{ $order->created_at->format('d.m.Y H:i') }}</p>
                    <p>Güncelleme: {{ $order->updated_at->format('d.m.Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
