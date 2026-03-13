<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Giriş - Diblong</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md px-6">
        <div class="bg-gray-800 rounded-2xl shadow-xl p-8">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-yellow-500">Diblong Admin</h1>
                <p class="text-gray-400 text-sm mt-1">Yönetim paneline giriş yapın</p>
            </div>

            @error('email')
                <div class="bg-red-900/30 border border-red-800 text-red-400 px-4 py-3 rounded-lg mb-4 text-sm">
                    {{ $message }}
                </div>
            @enderror

            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm text-gray-400 mb-1">E-posta</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500 transition">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Şifre</label>
                    <input type="password" name="password" required
                           class="w-full bg-gray-700 border border-gray-600 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-yellow-500 transition">
                </div>
                <button type="submit" class="w-full bg-yellow-500 text-black font-semibold py-3 rounded-lg hover:bg-yellow-400 transition">
                    Giriş Yap
                </button>
            </form>
        </div>
    </div>
</body>
</html>
