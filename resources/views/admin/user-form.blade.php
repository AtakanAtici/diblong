@extends('admin.layout')

@section('title', $user ? 'Kullanıcı Düzenle' : 'Yeni Kullanıcı')

@section('content')
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.users') }}" class="text-gray-400 hover:text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-gray-800">{{ $user ? 'Kullanıcı Düzenle' : 'Yeni Kullanıcı' }}</h1>
    </div>

    <form action="{{ $user ? route('admin.user.update', $user->id) : route('admin.user.store') }}"
          method="POST" class="max-w-xl">
        @csrf
        @if($user)
            @method('PUT')
        @endif

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ad Soyad *</label>
                <input type="text" name="name" value="{{ old('name', $user?->name) }}" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-yellow-500">
                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">E-posta *</label>
                <input type="email" name="email" value="{{ old('email', $user?->email) }}" required
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-yellow-500">
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Şifre {{ $user ? '' : '*' }}
                    @if($user)
                        <span class="text-gray-400 font-normal">(boş bırakırsanız değişmez)</span>
                    @endif
                </label>
                <input type="password" name="password" {{ $user ? '' : 'required' }}
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-yellow-500">
                @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Şifre Tekrar {{ $user ? '' : '*' }}
                </label>
                <input type="password" name="password_confirmation" {{ $user ? '' : 'required' }}
                       class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-yellow-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Rol *</label>
                <select name="role" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:border-yellow-500">
                    <option value="admin" {{ old('role', $user?->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="superadmin" {{ old('role', $user?->role) == 'superadmin' ? 'selected' : '' }}>Süper Admin</option>
                </select>
            </div>

            <div>
                <label class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" value="1"
                           {{ old('is_active', $user?->is_active ?? true) ? 'checked' : '' }}
                           class="rounded border-gray-300 text-yellow-500 focus:ring-yellow-500 w-5 h-5">
                    <span class="text-sm font-medium text-gray-700">Aktif</span>
                </label>
            </div>
        </div>

        <div class="flex items-center gap-3 mt-6">
            <button type="submit" class="bg-yellow-500 text-black font-semibold px-8 py-3 rounded-lg hover:bg-yellow-400 transition">
                {{ $user ? 'Değişiklikleri Kaydet' : 'Kullanıcı Ekle' }}
            </button>
            <a href="{{ route('admin.users') }}" class="text-gray-500 hover:text-gray-700 text-sm">İptal</a>
        </div>
    </form>
@endsection
