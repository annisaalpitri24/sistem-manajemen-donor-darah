<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DonorDarah · Setetes Darah, Sejuta Harapan</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap');

        * {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
        }

        .shadow-soft {
            box-shadow: 0 20px 40px -12px rgba(225, 29, 72, 0.12);
        }

        .text-gradient {
            background: linear-gradient(145deg, #E11D48 0%, #BE123C 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .card-hover {
            transition: all 0.25s ease-in-out;
        }

        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 24px 48px -12px rgba(225, 29, 72, 0.20);
        }

        .ring-soft {
            box-shadow: 0 0 0 1px rgba(225, 29, 72, 0.06), 0 8px 24px -8px rgba(0, 0, 0, 0.04);
        }

        /* === HERO IMAGE INTEGRATION === */
        .hero-section {
            position: relative;
            overflow: hidden;
            background: linear-gradient(165deg, #fdf2f4 0%, #ffffff 40%, #ffffff 100%);
        }

        .hero-section .bg-aura {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
            z-index: 0;
        }

        .hero-section .bg-aura-1 {
            width: 600px;
            height: 600px;
            top: -20%;
            right: -10%;
            background: radial-gradient(circle, rgba(225, 29, 72, 0.06) 0%, transparent 70%);
            animation: aura-pulse 6s ease-in-out infinite;
        }

        .hero-section .bg-aura-2 {
            width: 400px;
            height: 400px;
            bottom: -10%;
            left: 40%;
            background: radial-gradient(circle, rgba(225, 29, 72, 0.04) 0%, transparent 60%);
            animation: aura-pulse 8s ease-in-out infinite 1s;
        }

        .hero-section .bg-aura-3 {
            width: 300px;
            height: 300px;
            top: 30%;
            right: 30%;
            background: radial-gradient(circle, rgba(225, 29, 72, 0.03) 0%, transparent 60%);
            animation: aura-pulse 7s ease-in-out infinite 2s;
        }

        @keyframes aura-pulse {

            0%,
            100% {
                transform: scale(1) translate(0, 0);
                opacity: 0.6;
            }

            50% {
                transform: scale(1.2) translate(20px, -20px);
                opacity: 1;
            }
        }

        .hero-image-wrapper {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-image-wrapper .image-ring {
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(225, 29, 72, 0.06);
            pointer-events: none;
            z-index: 0;
        }

        .hero-image-wrapper .image-ring-1 {
            width: 110%;
            height: 110%;
            top: -5%;
            left: -5%;
            animation: ring-spin 20s linear infinite;
        }

        .hero-image-wrapper .image-ring-2 {
            width: 130%;
            height: 130%;
            top: -15%;
            left: -15%;
            border-color: rgba(225, 29, 72, 0.03);
            animation: ring-spin 30s linear infinite reverse;
        }

        @keyframes ring-spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .hero-image-wrapper .glow-under {
            position: absolute;
            bottom: -10%;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 30%;
            background: radial-gradient(ellipse at center, rgba(225, 29, 72, 0.10) 0%, transparent 70%);
            filter: blur(30px);
            pointer-events: none;
            z-index: 0;
            animation: glow-pulse 3s ease-in-out infinite;
        }

        @keyframes glow-pulse {

            0%,
            100% {
                opacity: 0.6;
                transform: translateX(-50%) scale(1);
            }

            50% {
                opacity: 1;
                transform: translateX(-50%) scale(1.1);
            }
        }

        .hero-image-wrapper img {
            position: relative;
            z-index: 1;
            filter: drop-shadow(0 30px 60px rgba(225, 29, 72, 0.08)) drop-shadow(0 10px 30px rgba(225, 29, 72, 0.04));
            transition: filter 0.6s ease, transform 0.6s ease;
            max-width: 90%;
            height: auto;
        }

        .hero-image-wrapper img:hover {
            filter: drop-shadow(0 40px 80px rgba(225, 29, 72, 0.12)) drop-shadow(0 15px 40px rgba(225, 29, 72, 0.06));
            transform: scale(1.02);
        }

        .blood-drop-deco {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
            opacity: 0.15;
        }

        .blood-drop-deco-1 {
            width: 80px;
            height: 80px;
            top: 5%;
            right: 5%;
            background: radial-gradient(circle at 30% 30%, #E11D48, transparent);
            animation: float-deco 5s ease-in-out infinite;
        }

        .blood-drop-deco-2 {
            width: 50px;
            height: 50px;
            bottom: 15%;
            left: 0%;
            background: radial-gradient(circle at 30% 30%, #E11D48, transparent);
            animation: float-deco 7s ease-in-out infinite 1s;
        }

        .blood-drop-deco-3 {
            width: 40px;
            height: 40px;
            top: 40%;
            left: 5%;
            background: radial-gradient(circle at 30% 30%, #BE123C, transparent);
            animation: float-deco 6s ease-in-out infinite 2s;
        }

        @keyframes float-deco {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
                opacity: 0.1;
            }

            50% {
                transform: translate(-10px, -20px) scale(1.2);
                opacity: 0.2;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-14px) rotate(0.5deg);
            }
        }

        .animate-float {
            animation: float 5s ease-in-out infinite;
        }

        .hero-image-wrapper .blend-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            pointer-events: none;
            background: radial-gradient(ellipse at 70% 50%, transparent 40%, rgba(255, 255, 255, 0.1) 100%);
            border-radius: 50%;
        }

        /* === PASANG DAN PAKSA MODE GELAP LEWAT CSS MURNI === */
        html.dark body {
            background-color: #030712 !important;
            color: #f3f4f6 !important;
        }

        html.dark .hero-section {
            background: linear-gradient(165deg, #1e1b1c 0%, #030712 40%, #030712 100%) !important;
        }

        html.dark header {
            background-color: rgba(3, 7, 18, 0.85) !important;
            border-color: #1f2937 !important;
        }

        html.dark header .text-gray-900,
        html.dark .hero-section h1,
        html.dark #fitur h2,
        html.dark #stok h3 {
            color: #ffffff !important;
        }

        html.dark header nav a:not(.text-\[\#E11D48\]) {
            color: #9ca3af !important;
        }

        html.dark header nav a:not(.text-\[\#E11D48\]):hover {
            color: #E11D48 !important;
        }

        html.dark #tentang>div,
        html.dark #fitur .bg-white,
        html.dark #stok {
            background-color: #111827 !important;
            border-color: #1f2937 !important;
            box-shadow: none !important;
        }

        html.dark #tentang h4,
        html.dark #fitur h4,
        html.dark #stok .text-gray-800 {
            color: #f3f4f6 !important;
        }

        html.dark #stok .border-gray-100 {
            border-color: #1f2937 !important;
            background-color: rgba(3, 7, 18, 0.4) !important;
        }

        /* Penyesuaian tombol Back To Top khusus Mode Gelap */
        html.dark #back-to-top {
            background-color: #e11d48 !important;
            color: #ffffff !important;
            box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.5) !important;
        }

        html.dark #back-to-top:hover {
            background-color: #be123c !important;
        }
    </style>
</head>

<body class="bg-white text-[#1D2939] antialiased selection:bg-rose-200 selection:text-rose-900 transition-colors duration-200">

    <!-- HEADER / NAVIGATION -->
    <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-xl border-b border-rose-100/40 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-[72px] flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                <div class="relative w-10 h-10 rounded-2xl bg-[#E11D48] flex items-center justify-center text-white shadow-lg shadow-rose-200/50 group-hover:scale-105 transition">
                    <i class="fa-solid fa-droplet text-xl"></i>
                </div>
                <div class="leading-tight">
                    <span class="block text-xl font-extrabold tracking-tight text-gray-900">Donor<span class="text-[#E11D48]">Darah</span></span>
                    <span class="block text-[11px] font-medium text-gray-400 -mt-0.5">setetes darah, sejuta harapan</span>
                </div>
            </a>
            <nav id="nav-menu" class="hidden xl:flex items-center gap-8 text-sm font-semibold text-gray-500">
                <!-- Tambahkan id="nav-beranda" dan kelas dasar yang seragam -->
                <a href="{{ url('/') }}" id="nav-beranda" class="nav-link transition-colors pb-1.5 border-b-2 border-transparent">Beranda</a>
                <a href="#tentang" id="nav-tentang" class="nav-link transition-colors pb-1.5 border-b-2 border-transparent hover:text-[#E11D48]">Tentang</a>
                <a href="#stok" id="nav-stok" class="nav-link transition-colors pb-1.5 border-b-2 border-transparent hover:text-[#E11D48]">Stok Darah</a>
                <a href="#fitur" id="nav-fitur" class="nav-link transition-colors pb-1.5 border-b-2 border-transparent hover:text-[#E11D48]">Fitur</a>
                @auth
                <a href="{{ url('/pendonor/dashboard') }}" class="hover:text-[#E11D48] transition-colors pb-1.5">Dashboard Saya</a>
                @endauth
            </nav>
            <div class="flex items-center gap-3">
                @auth
                <span class="text-sm font-semibold text-gray-700 hidden sm:inline-block">Halo, {{ auth()->user()->name }}</span>
                <form action="{{ url('/logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-5 py-2.5 text-sm font-bold text-[#E11D48] bg-rose-50/80 rounded-xl hover:bg-rose-100 transition border border-rose-100/60 cursor-pointer">Logout</button>
                </form>
                @else
                <a href="{{ route('login') }}" class="hidden sm:inline-block px-5 py-2.5 text-sm font-bold text-[#E11D48] bg-rose-50/80 rounded-xl hover:bg-rose-100 transition border border-rose-100/60">Login</a>
                <a href="{{ url('/register') }}" class="px-5 py-2.5 text-sm font-bold text-white bg-[#E11D48] rounded-xl hover:bg-[#BE123C] transition shadow-lg shadow-rose-200/40 hover:shadow-rose-300/50">Daftar</a>
                @endauth
                <button id="theme-toggle" class="p-2.5 text-gray-500 bg-gray-50 border border-gray-100 rounded-xl hover:bg-gray-100 transition cursor-pointer">
                    <i id="theme-toggle-icon" class="fa-solid fa-moon text-lg"></i>
                </button>
            </div>
        </div>
    </header>
    <!-- HERO SECTION -->
    <section id="beranda" class="hero-section pt-8 pb-16 lg:pt-12 lg:pb-24 min-h-[600px] flex items-center">
        <div class="bg-aura bg-aura-1"></div>
        <div class="bg-aura bg-aura-2"></div>
        <div class="bg-aura bg-aura-3"></div>

        <!-- lg:grid-cols-12 tetap sama, tapi col-span di bawahnya kita ubah menjadi 6 dan 6 -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-12 gap-10 items-center relative z-10">

            <!-- SISI KIRI: TEKS (Diperkecil sedikit porsinya jadi col-span-6) -->
            <div class="lg:col-span-6 space-y-6">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-black tracking-wider text-[#E11D48] bg-rose-100/70 border border-rose-200/50 uppercase">
                    <i class="fa-regular fa-heart text-xs"></i> Selamat Datang
                </span>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black leading-[1.1] tracking-tight text-gray-900">
                    Setetes Darah Anda,<br>
                    <span class="text-gradient">Selamatkan Nyawa</span>
                </h1>
                <p class="text-lg text-gray-600 max-w-lg leading-relaxed">
                    Bersama kita bisa membantu sesama. Donor darah sekarang, hidup mereka nanti.
                    <span class="text-[#E11D48] font-semibold">#DonorDarahIndonesia</span>
                </p>
                <div class="flex flex-wrap items-center gap-4 pt-2">
                    @auth
                    <a href="{{ url('/pendonor/dashboard') }}" class="inline-flex items-center gap-2 px-7 py-3.5 text-base font-bold text-white bg-[#E11D48] rounded-2xl hover:bg-[#BE123C] transition shadow-xl shadow-rose-200/60 hover:shadow-rose-300/70">
                        <i class="fa-solid fa-heart-pulse"></i> Ajukan Donor
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="inline-flex items-center gap-2 px-7 py-3.5 text-base font-bold text-white bg-[#E11D48] rounded-2xl hover:bg-[#BE123C] transition shadow-xl shadow-rose-200/60 hover:shadow-rose-300/70">
                        <i class="fa-solid fa-heart-pulse"></i> Donor Sekarang
                    </a>
                    @endauth
                    <a href="#stok" class="inline-flex items-center gap-2 px-7 py-3.5 text-base font-bold text-[#E11D48] bg-white/80 border border-rose-200 rounded-2xl hover:bg-rose-50 transition shadow-soft">
                        <i class="fa-solid fa-chart-simple"></i> Cek Stok
                    </a>
                </div>
                <div class="flex items-center gap-6 pt-2 text-sm text-gray-400">
                    <span class="flex items-center gap-1.5"><i class="fa-regular fa-circle-check text-rose-400"></i> 100% aman</span>
                    <span class="flex items-center gap-1.5"><i class="fa-regular fa-clock text-rose-400"></i> 24/7 Akurat</span>
                </div>
            </div>

            <!-- SISI KANAN: GAMBAR (Diperbesar porsinya jadi col-span-6 dan ditambahkan scale-110) -->
            <div class="hero-image-wrapper lg:col-span-6 transform lg:scale-110 lg:translate-x-4">
                <div class="image-ring image-ring-1"></div>
                <div class="image-ring image-ring-2"></div>

                <div class="blood-drop-deco blood-drop-deco-1"></div>
                <div class="blood-drop-deco blood-drop-deco-2"></div>
                <div class="blood-drop-deco blood-drop-deco-3"></div>

                <div class="glow-under"></div>
                <div class="blend-overlay"></div>

                <img src="{{ asset('images/donor-hero.png') }}" alt="Donor Darah" class="animate-float !max-w-full">
            </div>
        </div>
    </section>

    <!-- GRID INFO UTAMA -->
    <section id="tentang" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-20">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 bg-white rounded-3xl p-6 sm:p-8 shadow-2xl shadow-gray-100/70 border border-gray-50/80 ring-soft">
            <div class="flex items-start gap-4 p-2 rounded-2xl hover:bg-rose-50/40 transition">
                <div class="p-3.5 bg-rose-50 rounded-2xl text-[#E11D48] shrink-0"><i class="fa-solid fa-droplet text-xl"></i></div>
                <div>
                    <h4 class="font-bold text-gray-800">Donor Mudah</h4>
                    <p class="text-xs text-gray-400">Proses cepat & terpercaya</p>
                </div>
            </div>
            <div class="flex items-start gap-4 p-2 rounded-2xl hover:bg-rose-50/40 transition">
                <div class="p-3.5 bg-rose-50 rounded-2xl text-[#E11D48] shrink-0"><i class="fa-solid fa-location-dot text-xl"></i></div>
                <div>
                    <h4 class="font-bold text-gray-800">Lokasi Terdekat</h4>
                    <p class="text-xs text-gray-400">Temukan UDD terdekat</p>
                </div>
            </div>
            <div class="flex items-start gap-4 p-2 rounded-2xl hover:bg-rose-50/40 transition">
                <div class="p-3.5 bg-rose-50 rounded-2xl text-[#E11D48] shrink-0"><i class="fa-solid fa-bell text-xl"></i></div>
                <div>
                    <h4 class="font-bold text-gray-800">Pengingat</h4>
                    <p class="text-xs text-gray-400">Notifikasi jadwal donor</p>
                </div>
            </div>
            <div class="flex items-start gap-4 p-2 rounded-2xl hover:bg-rose-50/40 transition">
                <div class="p-3.5 bg-rose-50 rounded-2xl text-[#E11D48] shrink-0"><i class="fa-solid fa-hand-holding-heart text-xl"></i></div>
                <div>
                    <h4 class="font-bold text-gray-800">Satu Harapan</h4>
                    <p class="text-xs text-gray-400">Setetes darah berarti</p>
                </div>
            </div>
        </div>
    </section>

    <!-- COUNTER DATA STRATEGIS -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-14">
        <div class="bg-[#E11D48] rounded-[2.5rem] px-6 py-10 text-white shadow-2xl shadow-rose-900/20 text-center relative overflow-hidden">
            <div class="absolute -right-20 -top-20 w-64 h-64 bg-white/5 rounded-full blur-2xl"></div>
            <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-white/5 rounded-full blur-2xl"></div>
            <h2 class="text-xl sm:text-2xl font-extrabold tracking-wide relative z-10">Bersama Menyelamatkan Nyawa</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-8 max-w-4xl mx-auto mt-8 relative z-10">
                <div>
                    <div class="flex items-center justify-center gap-2">
                        <i class="fa-solid fa-users text-2xl opacity-80"></i>
                        <span class="text-3xl font-black">{{ $laki + $perempuan }}</span>
                    </div>
                    <p class="text-sm font-medium text-rose-100">Total Pendonor Terdaftar</p>
                </div>
                <div>
                    <div class="flex items-center justify-center gap-2">
                        <i class="fa-solid fa-droplet text-2xl opacity-80"></i>
                        <span class="text-3xl font-black">{{ $a + $b + $ab + $o }}</span>
                    </div>
                    <p class="text-sm font-medium text-rose-100">Total Kantong Darah (Diterima)</p>
                </div>
                <div>
                    <div class="flex items-center justify-center gap-2">
                        <i class="fa-solid fa-venus-mars text-2xl opacity-80"></i>
                        <span class="text-xl font-black">L: {{ $laki }} | P: {{ $perempuan }}</span>
                    </div>
                    <p class="text-sm font-medium text-rose-100">Rasio Gender Pendonor</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FITUR UNGGULAN & STOK DARAH -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 lg:py-24 grid lg:grid-cols-12 gap-12 items-start">
        <div id="fitur" class="lg:col-span-7 space-y-8">
            <div class="space-y-2">
                <span class="text-[#E11D48] font-bold text-sm tracking-widest uppercase"><i class="fa-regular fa-star mr-2"></i>Fitur</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900">Fitur Unggulan Kami</h2>
                <div class="w-16 h-1.5 bg-[#E11D48] rounded-full"></div>
            </div>
            <div class="grid sm:grid-cols-2 gap-5">
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm card-hover">
                    <div class="w-12 h-12 rounded-xl bg-rose-50 flex items-center justify-center text-[#E11D48]"><i class="fa-solid fa-chart-line text-xl"></i></div>
                    <h4 class="font-bold text-gray-800 mt-4">Stok Real-Time</h4>
                    <p class="text-sm text-gray-400 leading-relaxed">Pantau ketersediaan kantong darah berdasarkan data riwayat masuk ter-update.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm card-hover">
                    <div class="w-12 h-12 rounded-xl bg-rose-50 flex items-center justify-center text-[#E11D48]"><i class="fa-solid fa-calendar-days text-xl"></i></div>
                    <h4 class="font-bold text-gray-800 mt-4">Manajemen Sistem</h4>
                    <p class="text-sm text-gray-400 leading-relaxed">Sistem terintegrasi untuk Admin, Petugas Lapangan, dan Pendonor.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm card-hover">
                    <div class="w-12 h-12 rounded-xl bg-rose-50 flex items-center justify-center text-[#E11D48]"><i class="fa-regular fa-clipboard text-xl"></i></div>
                    <h4 class="font-bold text-gray-800 mt-4">Riwayat Terpantau</h4>
                    <p class="text-sm text-gray-400 leading-relaxed">Pendonor dapat melacak riwayat pengajuan donor langsung dari dashboard personal.</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm card-hover">
                    <div class="w-12 h-12 rounded-xl bg-rose-50 flex items-center justify-center text-[#E11D48]"><i class="fa-solid fa-book-open text-xl"></i></div>
                    <h4 class="font-bold text-gray-800 mt-4">Laporan PDF</h4>
                    <p class="text-sm text-gray-400 leading-relaxed">Cetak laporan data donor dan riwayat transaksi darah dengan format PDF resmi.</p>
                </div>
            </div>
        </div>

        <!-- STOK GOLONGAN DARAH -->
        <div id="stok" class="lg:col-span-5 lg:mt-10 bg-white p-6 sm:p-8 rounded-3xl border border-gray-100 shadow-xl shadow-gray-100/50 flex flex-col justify-between h-full">
            <h3 class="text-xl font-bold text-gray-900 text-center flex items-center justify-center gap-2"><i class="fa-solid fa-droplet text-[#E11D48]"></i> Stok Golongan Darah</h3>
            <div class="grid grid-cols-2 gap-3 my-6">
                <div class="p-3.5 border border-gray-100 rounded-2xl text-center bg-gray-50/20 hover:bg-rose-50/20 transition">
                    <span class="text-xl font-black text-gray-800">Golongan A</span>
                    <div class="flex items-center justify-center gap-1.5 text-[10px] font-bold {{ $a > 0 ? 'text-emerald-600' : 'text-rose-600' }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $a > 0 ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                        {{ $a > 0 ? 'Tersedia' : 'Kosong' }}
                    </div>
                    <span class="text-xs text-gray-400 font-semibold">{{ $a }} Kantong</span>
                </div>
                <div class="p-3.5 border border-gray-100 rounded-2xl text-center bg-gray-50/20 hover:bg-rose-50/20 transition">
                    <span class="text-xl font-black text-gray-800">Golongan B</span>
                    <div class="flex items-center justify-center gap-1.5 text-[10px] font-bold {{ $b > 0 ? 'text-emerald-600' : 'text-rose-600' }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $b > 0 ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                        {{ $b > 0 ? 'Tersedia' : 'Kosong' }}
                    </div>
                    <span class="text-xs text-gray-400 font-semibold">{{ $b }} Kantong</span>
                </div>
                <div class="p-3.5 border border-gray-100 rounded-2xl text-center bg-gray-50/20 hover:bg-rose-50/20 transition">
                    <span class="text-xl font-black text-gray-800">Golongan AB</span>
                    <div class="flex items-center justify-center gap-1.5 text-[10px] font-bold {{ $ab > 0 ? 'text-emerald-600' : 'text-rose-600' }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $ab > 0 ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                        {{ $ab > 0 ? 'Tersedia' : 'Kosong' }}
                    </div>
                    <span class="text-xs text-gray-400 font-semibold">{{ $ab }} Kantong</span>
                </div>
                <div class="p-3.5 border border-gray-100 rounded-2xl text-center bg-gray-50/20 hover:bg-rose-50/20 transition">
                    <span class="text-xl font-black text-gray-800">Golongan O</span>
                    <div class="flex items-center justify-center gap-1.5 text-[10px] font-bold {{ $o > 0 ? 'text-emerald-600' : 'text-rose-600' }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $o > 0 ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                        {{ $o > 0 ? 'Tersedia' : 'Kosong' }}
                    </div>
                    <span class="text-xs text-gray-400 font-semibold">{{ $o }} Kantong</span>
                </div>
            </div>

            @auth
            <a href="{{ url('/pendonor/dashboard') }}" class="w-full flex items-center justify-center gap-2 py-3.5 px-4 text-sm font-bold text-white bg-[#E11D48] rounded-xl hover:bg-[#BE123C] transition shadow-md shadow-rose-200">
                Masuk ke Dashboard <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
            @else
            <a href="{{ route('login') }}" class="w-full flex items-center justify-center gap-2 py-3.5 px-4 text-sm font-bold text-white bg-[#E11D48] rounded-xl hover:bg-[#BE123C] transition shadow-md shadow-rose-200">
                Login Untuk Melihat Detail <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
            @endauth
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-[#E11D48] text-white pt-16 pb-8 rounded-t-[3.5rem] relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNCI+PHBhdGggZD0iTTM2IDM0djItSDI0di0yaDEyek0zNiAzMHYySDI0di0yaDEyeiIvPjwvZz48L2c+PC9zdmc+')] opacity-40"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 md:grid-cols-12 gap-8 pb-12 border-b border-rose-500/30 relative z-10">
            <div class="col-span-2 md:col-span-4 space-y-4">
                <div class="flex items-center gap-3">
                    <div class="bg-white p-2 rounded-xl"><i class="fa-solid fa-droplet text-[#E11D48] text-xl"></i></div>
                    <div><span class="block text-lg font-black tracking-tight">DonorDarah</span><span class="block text-[10px] text-rose-200 font-medium -mt-0.5">Setetes Darah, Sejuta Harapan</span></div>
                </div>
                <p class="text-xs text-rose-100 leading-relaxed max-w-sm">Platform digital penyuplai informasi stok donor darah, jadwal kegiatan kemanusiaan, dan edukasi kesehatan untuk Indonesia.</p>
            </div>
            <div class="col-span-1 md:col-span-2 space-y-3">
                <h4 class="font-bold text-sm tracking-wider uppercase text-rose-200">Navigasi</h4>
                <ul class="space-y-2 text-xs text-rose-100">
                    <li><a href="{{ url('/') }}" class="hover:underline">Beranda</a></li>
                    <li><a href="#tentang" class="hover:underline">Tentang Kami</a></li>
                    <li><a href="#stok" class="hover:underline">Stok Darah</a></li>
                    <li><a href="#fitur" class="hover:underline">Fitur</a></li>
                </ul>
            </div>
            <div class="col-span-1 md:col-span-2 space-y-3">
                <h4 class="font-bold text-sm tracking-wider uppercase text-rose-200">Akses Cepat</h4>
                <ul class="space-y-2 text-xs text-rose-100">
                    <li><a href="{{ route('login') }}" class="hover:underline">Login Area</a></li>
                    <li><a href="{{ url('/register') }}" class="hover:underline">Registrasi Akun</a></li>
                </ul>
            </div>
            <div class="col-span-1 md:col-span-2 space-y-3">
                <h4 class="font-bold text-sm tracking-wider uppercase text-rose-200">Layanan</h4>
                <ul class="space-y-2 text-xs text-rose-100">
                    <li><a href="{{ url('/pendonor/dashboard') }}" class="hover:underline">Dashboard Personal</a></li>
                </ul>
            </div>
            <div class="col-span-1 md:col-span-2 space-y-4">
                <h4 class="font-bold text-sm tracking-wider uppercase text-rose-200">Ikuti Kami</h4>
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center"><i class="fa-brands fa-facebook-f"></i></div>
                    <div class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center"><i class="fa-brands fa-instagram"></i></div>
                    <div class="w-9 h-9 rounded-full bg-white/10 flex items-center justify-center"><i class="fa-brands fa-youtube"></i></div>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-rose-200 relative z-10">
            <p>&copy; {{ date('Y') }} DonorDarah. All rights reserved.</p>
            <p class="flex items-center gap-2"><i class="fa-regular fa-heart text-rose-300"></i> Dibuat dengan dedikasi untuk kemanusiaan</p>
        </div>
    </footer>

    <!-- TOMBOL BACK TO TOP -->
    <button id="back-to-top" class="fixed bottom-6 right-6 z-50 p-3.5 bg-white text-[#E11D48] border border-rose-100 rounded-2xl shadow-xl hover:scale-105 transition-all duration-300 opacity-0 pointer-events-none cursor-pointer flex items-center justify-center w-12 h-12">
        <i class="fa-solid fa-arrow-up text-lg"></i>
    </button>

    <!-- TOGGLE JAVASCRIPT & BACK TO TOP LOGIC -->
    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleIcon = document.getElementById('theme-toggle-icon');
        const htmlElement = document.documentElement;
        const backToTopBtn = document.getElementById('back-to-top');

        /* === LOGIKA DARK / LIGHT MODE === */
        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            htmlElement.classList.add('dark');
            themeToggleIcon.classList.replace('fa-moon', 'fa-sun');
        } else {
            htmlElement.classList.remove('dark');
            themeToggleIcon.classList.replace('fa-sun', 'fa-moon');
        }

        themeToggleBtn.addEventListener('click', function() {
            if (htmlElement.classList.contains('dark')) {
                htmlElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                themeToggleIcon.classList.replace('fa-sun', 'fa-moon');
            } else {
                htmlElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                themeToggleIcon.classList.replace('fa-moon', 'fa-sun');
            }
        });

        /* === LOGIKA SCROLL BACK TO TOP === */
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTopBtn.classList.remove('opacity-0', 'pointer-events-none');
                backToTopBtn.classList.add('opacity-100');
            } else {
                backToTopBtn.classList.remove('opacity-100');
                backToTopBtn.classList.add('opacity-0', 'pointer-events-none');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        /* === LOGIKA ACTIVE MENU NAVBAR ON SCROLL === */
        const sections = document.querySelectorAll('section, main, div[id]');
        const navLinks = document.querySelectorAll('#nav-menu .nav-link');

        const activeClass = ['text-[#E11D48]', 'border-[#E11D48]'];
        const inactiveClass = ['text-gray-500', 'border-transparent'];

        // Fungsi untuk mereset semua link menu ke status tidak aktif
        function resetNavLinks() {
            navLinks.forEach(link => {
                link.classList.remove(...activeClass);
                link.classList.add('text-gray-500', 'border-transparent');
            });
        }

        // Deteksi section yang sedang aktif di layar
        const observerOptions = {
            root: null,
            rootMargin: '-30% 0px -60% 0px', // Memicu perubahan saat elemen berada di area tengah layar
            threshold: 0
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const id = entry.target.getAttribute('id');
                    const activeLink = document.getElementById(`nav-${id}`);

                    if (activeLink) {
                        resetNavLinks();
                        activeLink.classList.remove('text-gray-500', 'border-transparent');
                        activeLink.classList.add(...activeClass);
                    }
                }
            });
        }, observerOptions);

        // Daftarkan elemen yang ingin dipantau layarnya
        document.getElementById('beranda') && observer.observe(document.getElementById('beranda'));
        document.getElementById('tentang') && observer.observe(document.getElementById('tentang'));
        document.getElementById('stok') && observer.observe(document.getElementById('stok'));
        document.getElementById('fitur') && observer.observe(document.getElementById('fitur'));
    </script>

</body>

</html>