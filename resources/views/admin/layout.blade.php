<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Diblong</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-gray-900 text-white flex-shrink-0 hidden lg:block">
            <div class="p-6 border-b border-gray-800">
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-yellow-500">Diblong Admin</a>
            </div>
            <nav class="p-4 space-y-1">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-yellow-500' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }} transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Panel
                </a>
                <a href="{{ route('admin.orders') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.orders') || request()->routeIs('admin.order.detail') ? 'bg-gray-800 text-yellow-500' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }} transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    Siparişler
                </a>
                <a href="{{ route('admin.products') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.products') || request()->routeIs('admin.product.*') ? 'bg-gray-800 text-yellow-500' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }} transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    Ürünler
                </a>
                <a href="{{ route('admin.messages') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->routeIs('admin.messages') || request()->routeIs('admin.message.*') ? 'bg-gray-800 text-yellow-500' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }} transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Mesajlar
                </a>
                <div class="border-t border-gray-800 pt-2 mt-4">
                    <a href="{{ route('home') }}" target="_blank"
                       class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        Siteyi Görüntüle
                    </a>
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-gray-400 hover:bg-gray-800 hover:text-red-400 transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            Çıkış Yap
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        {{-- Main --}}
        <div class="flex-1 flex flex-col">
            {{-- Top bar (mobile) --}}
            <header class="bg-white shadow-sm lg:hidden">
                <div class="flex items-center justify-between px-4 py-3">
                    <span class="font-bold text-yellow-600">Diblong Admin</span>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-600 text-sm">Panel</a>
                        <a href="{{ route('admin.orders') }}" class="text-gray-600 text-sm">Siparişler</a>
                        <a href="{{ route('admin.products') }}" class="text-gray-600 text-sm">Ürünler</a>
                        <a href="{{ route('admin.messages') }}" class="text-gray-600 text-sm">Mesajlar</a>
                    </div>
                </div>
            </header>

            <main class="flex-1 p-6 lg:p-8">
                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
