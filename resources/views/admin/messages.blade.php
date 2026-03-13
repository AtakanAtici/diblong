@extends('admin.layout')

@section('title', 'Mesajlar')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-8">Mesajlar</h1>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-x-auto">
        @if($messages->count())
            <table class="w-full">
                <thead>
                    <tr class="text-left text-sm text-gray-500 border-b border-gray-100">
                        <th class="px-6 py-3 font-medium"></th>
                        <th class="px-6 py-3 font-medium">Gönderen</th>
                        <th class="px-6 py-3 font-medium">Konu</th>
                        <th class="px-6 py-3 font-medium">Tarih</th>
                        <th class="px-6 py-3 font-medium"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $msg)
                        <tr class="border-b border-gray-50 hover:bg-gray-50 {{ !$msg->is_read ? 'bg-yellow-50/50' : '' }}">
                            <td class="px-6 py-4 w-4">
                                @if(!$msg->is_read)
                                    <span class="w-2.5 h-2.5 bg-yellow-500 rounded-full inline-block"></span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-800 {{ !$msg->is_read ? 'font-bold' : '' }}">{{ $msg->name }}</div>
                                <div class="text-xs text-gray-500">{{ $msg->email }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm {{ !$msg->is_read ? 'font-semibold text-gray-800' : 'text-gray-600' }}">{{ $msg->subject }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ \Carbon\Carbon::parse($msg->created_at)->format('d.m.Y H:i') }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.message.detail', $msg->id) }}" class="text-yellow-600 hover:text-yellow-700 text-sm font-medium">Oku</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-4">{{ $messages->links() }}</div>
        @else
            <div class="p-12 text-center text-gray-400">Henüz mesaj bulunmuyor.</div>
        @endif
    </div>
@endsection
