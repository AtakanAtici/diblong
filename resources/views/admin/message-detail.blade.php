@extends('admin.layout')

@section('title', 'Mesaj Detay')

@section('content')
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.messages') }}" class="text-gray-400 hover:text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Mesaj Detay</h1>
    </div>

    <div class="max-w-3xl">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
            <div class="grid grid-cols-2 gap-4 text-sm mb-6 pb-6 border-b border-gray-100">
                <div>
                    <span class="text-gray-500">Gönderen</span>
                    <p class="font-medium text-gray-800">{{ $message->name }}</p>
                </div>
                <div>
                    <span class="text-gray-500">E-posta</span>
                    <p class="font-medium text-gray-800">{{ $message->email }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Telefon</span>
                    <p class="font-medium text-gray-800">{{ $message->phone ?: '-' }}</p>
                </div>
                <div>
                    <span class="text-gray-500">Tarih</span>
                    <p class="font-medium text-gray-800">{{ \Carbon\Carbon::parse($message->created_at)->format('d.m.Y H:i') }}</p>
                </div>
            </div>

            <div class="mb-2">
                <span class="text-gray-500 text-sm">Konu</span>
                <p class="font-semibold text-gray-800 text-lg">{{ $message->subject }}</p>
            </div>

            <div class="mt-4 bg-gray-50 rounded-lg p-4">
                <p class="text-gray-700 whitespace-pre-line leading-relaxed">{{ $message->message }}</p>
            </div>
        </div>

        <form action="{{ route('admin.message.delete', $message->id) }}" method="POST"
              onsubmit="return confirm('Bu mesajı silmek istediğinize emin misiniz?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium">Mesajı Sil</button>
        </form>
    </div>
@endsection
