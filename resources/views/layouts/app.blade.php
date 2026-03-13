<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Diblong - Doğal Güç Arttırıcı Takviye')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=Inter:wght@300;400;500;600;700&display=swap');
        :root {
            --gold: #c9a84c;
            --gold-light: #e0c068;
            --gold-dark: #a88a3a;
            --dark: #0a0a0a;
            --dark-light: #1a1a1a;
            --dark-lighter: #2a2a2a;
        }
        body { font-family: 'Inter', sans-serif; }
        .font-playfair { font-family: 'Playfair Display', serif; }
        .bg-gold { background-color: var(--gold); }
        .text-gold { color: var(--gold); }
        .text-gold-light { color: var(--gold-light); }
        .border-gold { border-color: var(--gold); }
        .bg-dark { background-color: var(--dark); }
        .bg-dark-light { background-color: var(--dark-light); }
        .bg-dark-lighter { background-color: var(--dark-lighter); }
        .hover\:bg-gold:hover { background-color: var(--gold); }
        .hover\:text-gold:hover { color: var(--gold); }
        .gold-gradient { background: linear-gradient(135deg, #c9a84c, #e0c068, #c9a84c); }
        .gold-text-gradient {
            background: linear-gradient(135deg, #c9a84c, #e0c068);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .card-hover { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .card-hover:hover { transform: translateY(-8px); box-shadow: 0 20px 50px rgba(201,168,76,0.15); }

        /* Navbar glass */
        .nav-glass {
            background: rgba(10,10,10,0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            transition: all 0.4s cubic-bezier(0.4,0,0.2,1);
        }
        .nav-glass.scrolled {
            background: rgba(10,10,10,0.92);
            box-shadow: 0 4px 30px rgba(0,0,0,0.5);
        }

        /* Nav link underline animation */
        .nav-link {
            position: relative;
            padding-bottom: 2px;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #c9a84c, #e0c068);
            transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
            transform: translateX(-50%);
            border-radius: 2px;
        }
        .nav-link:hover::after {
            width: 100%;
        }

        /* Shimmer button */
        .btn-shimmer {
            position: relative;
            overflow: hidden;
        }
        .btn-shimmer::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s ease;
        }
        .btn-shimmer:hover::before {
            left: 100%;
        }

        /* Scroll reveal */
        .reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s cubic-bezier(0.4,0,0.2,1);
        }
        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .reveal-left {
            opacity: 0;
            transform: translateX(-60px);
            transition: all 0.8s cubic-bezier(0.4,0,0.2,1);
        }
        .reveal-left.visible {
            opacity: 1;
            transform: translateX(0);
        }
        .reveal-right {
            opacity: 0;
            transform: translateX(60px);
            transition: all 0.8s cubic-bezier(0.4,0,0.2,1);
        }
        .reveal-right.visible {
            opacity: 1;
            transform: translateX(0);
        }
        .reveal-scale {
            opacity: 0;
            transform: scale(0.85);
            transition: all 0.8s cubic-bezier(0.4,0,0.2,1);
        }
        .reveal-scale.visible {
            opacity: 1;
            transform: scale(1);
        }

        /* Glow pulse */
        .glow-gold {
            box-shadow: 0 0 20px rgba(201,168,76,0.3), 0 0 60px rgba(201,168,76,0.1);
        }
        .glow-pulse {
            animation: glowPulse 2.5s ease-in-out infinite;
        }
        @keyframes glowPulse {
            0%, 100% { box-shadow: 0 0 20px rgba(201,168,76,0.2), 0 0 40px rgba(201,168,76,0.1); }
            50% { box-shadow: 0 0 30px rgba(201,168,76,0.4), 0 0 70px rgba(201,168,76,0.2); }
        }

        /* Float animation */
        .float {
            animation: floatY 4s ease-in-out infinite;
        }
        @keyframes floatY {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        /* Particle dots */
        .particle {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(201,168,76,0.6), transparent);
            pointer-events: none;
            animation: particleFloat 6s ease-in-out infinite;
        }
        @keyframes particleFloat {
            0%, 100% { transform: translateY(0) scale(1); opacity: 0.4; }
            50% { transform: translateY(-30px) scale(1.2); opacity: 0.8; }
        }

        /* Mobile menu slide */
        .mobile-menu-panel {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4,0,0.2,1), opacity 0.3s ease;
            opacity: 0;
        }
        .mobile-menu-panel.open {
            max-height: 300px;
            opacity: 1;
        }

        /* Cart badge bounce */
        .cart-bounce {
            animation: cartBounce 0.5s cubic-bezier(0.4,0,0.2,1);
        }
        @keyframes cartBounce {
            0% { transform: scale(0.3); }
            50% { transform: scale(1.3); }
            100% { transform: scale(1); }
        }

        /* Rotating glow border for founder */
        @property --angle {
            syntax: '<angle>';
            initial-value: 0deg;
            inherits: false;
        }
        @keyframes rotateBorder {
            to { --angle: 360deg; }
        }
        .founder-card:hover .founder-name {
            animation: textShimmer 2s ease-in-out infinite;
        }
        @keyframes textShimmer {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; text-shadow: 0 0 20px rgba(201,168,76,0.5); }
        }

        /* Gradient border */
        .gradient-border {
            position: relative;
        }
        .gradient-border::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 1px;
            background: linear-gradient(135deg, rgba(201,168,76,0.5), transparent, rgba(201,168,76,0.3));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }
    </style>
</head>
<body class="bg-dark text-white min-h-screen flex flex-col">
    {{-- Navbar --}}
    <nav id="navbar" class="nav-glass fixed top-0 left-0 right-0 z-50 border-b border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center group">
                    <img src="{{ asset('assets/logo_white.jpeg') }}" alt="Diblong"
                         class="h-10 rounded transition-transform duration-300 group-hover:scale-105">
                </a>

                {{-- Desktop menu --}}
                <div class="hidden md:flex items-center space-x-10">
                    <a href="{{ route('home') }}" class="nav-link text-gray-300 hover:text-gold transition-colors duration-300 text-sm font-medium tracking-wide uppercase">
                        Ana Sayfa
                    </a>
                    <a href="{{ route('home') }}#urunler" class="nav-link text-gray-300 hover:text-gold transition-colors duration-300 text-sm font-medium tracking-wide uppercase">
                        Ürünler
                    </a>
                    <a href="{{ route('home') }}#hakkimizda" class="nav-link text-gray-300 hover:text-gold transition-colors duration-300 text-sm font-medium tracking-wide uppercase">
                        Hakkımızda
                    </a>
                    <a href="{{ route('faq') }}" class="nav-link text-gray-300 hover:text-gold transition-colors duration-300 text-sm font-medium tracking-wide uppercase">
                        SSS
                    </a>
                    <a href="{{ route('contact') }}" class="nav-link text-gray-300 hover:text-gold transition-colors duration-300 text-sm font-medium tracking-wide uppercase">
                        İletişim
                    </a>
                </div>

                {{-- Right side --}}
                <div class="flex items-center space-x-5">
                    {{-- Cart --}}
                    <a href="{{ route('cart.index') }}" class="relative group p-2 rounded-full hover:bg-white/5 transition-all duration-300">
                        <svg class="w-6 h-6 text-gray-300 group-hover:text-gold transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                        </svg>
                        <span id="cart-count" class="absolute -top-1 -right-1 gold-gradient text-black text-[10px] font-bold rounded-full w-5 h-5 flex items-center justify-center {{ array_sum(session('cart', [])) > 0 ? '' : 'hidden' }}">
                            {{ array_sum(session('cart', [])) }}
                        </span>
                    </a>

                    {{-- CTA button (desktop) --}}
                    <a href="{{ route('home') }}#urunler" class="hidden md:inline-flex btn-shimmer gold-gradient text-black font-semibold px-6 py-2.5 rounded-full text-sm tracking-wide hover:shadow-lg hover:shadow-yellow-900/20 transition-all duration-300">
                        Sipariş Ver
                    </a>

                    {{-- Mobile hamburger --}}
                    <button id="mobile-menu-btn" class="md:hidden relative w-8 h-8 flex flex-col items-center justify-center gap-1.5 group" aria-label="Menü">
                        <span class="hamburger-line w-6 h-0.5 bg-gray-300 rounded-full transition-all duration-300 group-hover:bg-gold"></span>
                        <span class="hamburger-line w-6 h-0.5 bg-gray-300 rounded-full transition-all duration-300 group-hover:bg-gold"></span>
                        <span class="hamburger-line w-4 h-0.5 bg-gray-300 rounded-full transition-all duration-300 group-hover:bg-gold ml-auto"></span>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile menu --}}
        <div id="mobile-menu" class="mobile-menu-panel md:hidden border-t border-white/5">
            <div class="px-6 py-5 space-y-1 bg-black/40 backdrop-blur-xl">
                <a href="{{ route('home') }}" class="block text-gray-300 hover:text-gold hover:pl-2 transition-all duration-300 py-3 border-b border-white/5 text-sm uppercase tracking-wide">Ana Sayfa</a>
                <a href="{{ route('home') }}#urunler" class="block text-gray-300 hover:text-gold hover:pl-2 transition-all duration-300 py-3 border-b border-white/5 text-sm uppercase tracking-wide">Ürünler</a>
                <a href="{{ route('home') }}#hakkimizda" class="block text-gray-300 hover:text-gold hover:pl-2 transition-all duration-300 py-3 border-b border-white/5 text-sm uppercase tracking-wide">Hakkımızda</a>
                <a href="{{ route('faq') }}" class="block text-gray-300 hover:text-gold hover:pl-2 transition-all duration-300 py-3 border-b border-white/5 text-sm uppercase tracking-wide">SSS</a>
                <a href="{{ route('contact') }}" class="block text-gray-300 hover:text-gold hover:pl-2 transition-all duration-300 py-3 border-b border-white/5 text-sm uppercase tracking-wide">İletişim</a>
                <a href="{{ route('cart.index') }}" class="block text-gray-300 hover:text-gold hover:pl-2 transition-all duration-300 py-3 text-sm uppercase tracking-wide">Sepet</a>
                <a href="{{ route('home') }}#urunler" class="block mt-3 gold-gradient text-black font-semibold px-6 py-3 rounded-full text-sm text-center tracking-wide">Sipariş Ver</a>
            </div>
        </div>
    </nav>

    {{-- Spacer for fixed navbar --}}
    <div class="h-20"></div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div id="flash-msg" class="bg-green-900/30 backdrop-blur border border-green-700/30 text-green-300 px-4 py-3 text-center text-sm animate-fade-in">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div id="flash-msg" class="bg-red-900/30 backdrop-blur border border-red-700/30 text-red-300 px-4 py-3 text-center text-sm">
            {{ session('error') }}
        </div>
    @endif

    {{-- Content --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-dark-light border-t border-white/5 mt-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 right-0 w-96 h-96 bg-yellow-500 rounded-full blur-[150px]"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div>
                    <img src="{{ asset('assets/logo_white.jpeg') }}" alt="Diblong" class="h-12 mb-5 rounded">
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Doğanın gücünü bilimsel yöntemlerle birleştirerek, en kaliteli bitkisel destek ürünlerini sunuyoruz.
                    </p>
                </div>
                <div>
                    <h3 class="text-gold font-semibold mb-5 text-sm uppercase tracking-wider">Hızlı Bağlantılar</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('home') }}" class="text-gray-500 hover:text-gold transition-colors duration-300">Ana Sayfa</a></li>
                        <li><a href="{{ route('home') }}#urunler" class="text-gray-500 hover:text-gold transition-colors duration-300">Ürünler</a></li>
                        <li><a href="{{ route('cart.index') }}" class="text-gray-500 hover:text-gold transition-colors duration-300">Sepet</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-500 hover:text-gold transition-colors duration-300">İletişim</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-gold font-semibold mb-5 text-sm uppercase tracking-wider">İletişim</h3>
                    <ul class="space-y-3 text-sm text-gray-500">
                        <li>diblongmacun@gmail.com</li>
                        <li>WhatsApp: 0533 323 18 70</li>
                        <li>Instagram: @diblonmacun</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-white/5 mt-12 pt-8 text-center text-gray-600 text-sm">
                &copy; {{ date('Y') }} Diblong. Tüm hakları saklıdır.
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        let lastScroll = 0;
        window.addEventListener('scroll', () => {
            const current = window.scrollY;
            if (current > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
            lastScroll = current;
        }, { passive: true });

        // Mobile menu toggle
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerLines = mobileBtn.querySelectorAll('.hamburger-line');
        let menuOpen = false;

        mobileBtn.addEventListener('click', () => {
            menuOpen = !menuOpen;
            mobileMenu.classList.toggle('open');
            if (menuOpen) {
                hamburgerLines[0].style.transform = 'rotate(45deg) translate(3px, 3px)';
                hamburgerLines[1].style.opacity = '0';
                hamburgerLines[2].style.transform = 'rotate(-45deg) translate(3px, -3px)';
                hamburgerLines[2].style.width = '1.5rem';
            } else {
                hamburgerLines[0].style.transform = '';
                hamburgerLines[1].style.opacity = '';
                hamburgerLines[2].style.transform = '';
                hamburgerLines[2].style.width = '';
            }
        });

        // Close mobile menu on link click
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                menuOpen = false;
                mobileMenu.classList.remove('open');
                hamburgerLines.forEach(l => { l.style.transform = ''; l.style.opacity = ''; l.style.width = ''; });
            });
        });

        // Scroll reveal
        const revealEls = document.querySelectorAll('.reveal, .reveal-left, .reveal-right, .reveal-scale');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const delay = entry.target.dataset.delay || 0;
                    setTimeout(() => entry.target.classList.add('visible'), delay);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
        revealEls.forEach(el => revealObserver.observe(el));

        // Flash message auto-dismiss
        setTimeout(() => {
            const flash = document.getElementById('flash-msg');
            if (flash) {
                flash.style.transition = 'opacity 0.5s, transform 0.5s';
                flash.style.opacity = '0';
                flash.style.transform = 'translateY(-10px)';
                setTimeout(() => flash.remove(), 500);
            }
        }, 3000);
    </script>
    @stack('scripts')
</body>
</html>
