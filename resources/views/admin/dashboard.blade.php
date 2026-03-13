@extends('admin.layout')

@section('title', 'Panel')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-8">Panel</h1>

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="text-sm text-gray-500 mb-1">Toplam Sipariş</div>
            <div class="text-3xl font-bold text-gray-800">{{ $totalOrders }}</div>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="text-sm text-gray-500 mb-1">Bekleyen Sipariş</div>
            <div class="text-3xl font-bold text-yellow-600">{{ $pendingOrders }}</div>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="text-sm text-gray-500 mb-1">Onaylanan Sipariş</div>
            <div class="text-3xl font-bold text-green-600">{{ $confirmedOrders }}</div>
        </div>
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="text-sm text-gray-500 mb-1">Toplam Gelir</div>
            <div class="text-3xl font-bold text-gray-800">{{ number_format($totalRevenue, 2) }} <span class="text-lg">TL</span></div>
        </div>
    </div>

    {{-- Recent Orders --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-100">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-800">Son Siparişler</h2>
            <a href="{{ route('admin.orders') }}" class="text-yellow-600 hover:text-yellow-700 text-sm font-medium">Tümünü Gör</a>
        </div>

        @if($recentOrders->count())
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-sm text-gray-500 border-b border-gray-100">
                            <th class="px-6 py-3 font-medium">Sipariş No</th>
                            <th class="px-6 py-3 font-medium">Müşteri</th>
                            <th class="px-6 py-3 font-medium">Tutar</th>
                            <th class="px-6 py-3 font-medium">Durum</th>
                            <th class="px-6 py-3 font-medium">Tarih</th>
                            <th class="px-6 py-3 font-medium"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $order)
                            <tr class="border-b border-gray-50 hover:bg-gray-50">
                                <td class="px-6 py-4 font-mono text-sm font-medium">{{ $order->order_number }}</td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-800">{{ $order->full_name }}</div>
                                    <div class="text-xs text-gray-500">{{ $order->email }}</div>
                                </td>
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
                                    <a href="{{ route('admin.order.detail', $order) }}" class="text-yellow-600 hover:text-yellow-700 text-sm">Detay</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-12 text-center text-gray-400">Henüz sipariş bulunmuyor.</div>
        @endif
    </div>
@endsection
