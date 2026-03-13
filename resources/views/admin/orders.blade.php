@extends('admin.layout')

@section('title', 'Siparişler')

@section('content')
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Siparişler</h1>

        <form action="{{ route('admin.orders') }}" method="GET" class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Sipariş no, isim, e-posta..."
                   class="border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-yellow-500 w-64">
            <select name="status" onchange="this.form.submit()"
                    class="border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-yellow-500">
                <option value="">Tüm Durumlar</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Beklemede</option>
                <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Onaylandı</option>
                <option value="preparing" {{ request('status') == 'preparing' ? 'selected' : '' }}>Hazırlanıyor</option>
                <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Kargoda</option>
                <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Teslim Edildi</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>İptal</option>
            </select>
            <button type="submit" class="bg-yellow-500 text-black px-4 py-2 rounded-lg text-sm font-medium hover:bg-yellow-400 transition">Ara</button>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-x-auto">
        @if($orders->count())
            <table class="w-full">
                <thead>
                    <tr class="text-left text-sm text-gray-500 border-b border-gray-100">
                        <th class="px-6 py-3 font-medium">Sipariş No</th>
                        <th class="px-6 py-3 font-medium">Müşteri</th>
                        <th class="px-6 py-3 font-medium">Telefon</th>
                        <th class="px-6 py-3 font-medium">Şehir</th>
                        <th class="px-6 py-3 font-medium">Tutar</th>
                        <th class="px-6 py-3 font-medium">Durum</th>
                        <th class="px-6 py-3 font-medium">Tarih</th>
                        <th class="px-6 py-3 font-medium"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="border-b border-gray-50 hover:bg-gray-50">
                            <td class="px-6 py-4 font-mono text-sm font-medium">{{ $order->order_number }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-800">{{ $order->full_name }}</div>
                                <div class="text-xs text-gray-500">{{ $order->email }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm">{{ $order->phone }}</td>
                            <td class="px-6 py-4 text-sm">{{ $order->city }}</td>
                            <td class="px-6 py-4 font-semibold">{{ number_format($order->total, 2) }} TL</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                    {{ $order->status_color === 'green' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $order->status_color === 'yellow' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $order->status_color === 'blue' ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ $order->status_color === 'indigo' ? 'bg-indigo-100 text-indigo-800' : '' }}
                                    {{ $order->status_color === 'purple' ? 'bg-purple-100 text-purple-800' : '' }}
                                    {{ $order->status_color === 'red' ? 'bg-red-100 text-red-800' : '' }}
                                ">{{ $order->status_label }}</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $order->created_at->format('d.m.Y H:i') }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.order.detail', $order) }}" class="text-yellow-600 hover:text-yellow-700 text-sm font-medium">Detay</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="p-4">
                {{ $orders->withQueryString()->links() }}
            </div>
        @else
            <div class="p-12 text-center text-gray-400">Sipariş bulunamadı.</div>
        @endif
    </div>
@endsection
