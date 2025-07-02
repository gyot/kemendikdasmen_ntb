<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Resmi Pemerintah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .hero-pattern {
            background-color: #f0f4f8;
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23003d7a' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .announcement-ticker {
            animation: ticker 20s linear infinite;
        }

        @keyframes ticker {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-blue-900 text-white">

        <!-- Main Header -->
        <div class="container mx-auto px-4 py-4 flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center mb-4 md:mb-0">
                <img src="logo_pojok.png" style="width: 400px;" alt="" srcset="">
            </div>
            <div class="relative">
                <input type="text" placeholder="Cari informasi..."
                    class="px-4 py-2 rounded-full text-gray-800 w-full md:w-64 focus:outline-none focus:ring-2 focus:ring-blue-300">
                <button class="absolute right-0 top-0 h-full px-4 text-gray-600 hover:text-blue-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="bg-blue-800">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row">
                    <button id="menuToggle"
                        class="md:hidden flex items-center px-3 py-2 my-2 border rounded text-blue-200 border-blue-400 hover:text-white hover:border-white">
                        <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                        </svg>
                        <span class="ml-2">Menu</span>
                    </button>
                    <div id="navMenu" class="hidden md:flex flex-col md:flex-row w-full">
                        <a href="#"
                            class="block px-4 py-3 md:py-4 text-blue-100 hover:bg-blue-700 hover:text-white font-medium">Beranda</a>
                        <a href="#"
                            class="block px-4 py-3 md:py-4 text-blue-100 hover:bg-blue-700 hover:text-white font-medium">Profil</a>
                        <a href="#"
                            class="block px-4 py-3 md:py-4 text-blue-100 hover:bg-blue-700 hover:text-white font-medium">Layanan</a>
                        <a href="#"
                            class="block px-4 py-3 md:py-4 text-blue-100 hover:bg-blue-700 hover:text-white font-medium">Informasi
                            Publik</a>
                        <a href="#"
                            class="block px-4 py-3 md:py-4 text-blue-100 hover:bg-blue-700 hover:text-white font-medium">Pengaduan</a>
                        <a href="#"
                            class="block px-4 py-3 md:py-4 text-blue-100 hover:bg-blue-700 hover:text-white font-medium">Galeri</a>
                        <a href="#"
                            class="block px-4 py-3 md:py-4 text-blue-100 hover:bg-blue-700 hover:text-white font-medium">Kontak</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="hidden md:block ml-4 flex-shrink-0">
        <img src="zi_wbbm.png" width="220" alt="ZI WBBM" class="inline-block align-middle">
    </div>
    <!-- Announcement Ticker -->
    <div class="bg-yellow-100 border-y border-yellow-200 py-2 overflow-hidden flex items-center justify-between">
        <div class="flex items-center flex-1 min-w-0">
            <div class="bg-yellow-500 text-white px-3 py-1 font-bold text-sm whitespace-nowrap">
                PENGUMUMAN
            </div>
            <div class="overflow-hidden flex-1 ml-4">
                <p class="announcement-ticker whitespace-nowrap text-gray-800">
                    Pendaftaran Bantuan Sosial dibuka sampai tanggal 30 Juni 2023 • Jadwal Pelayanan Kantor: Senin-Jumat
                    08.00-16.00 WIB • Pembayaran Pajak Bumi dan Bangunan dapat dilakukan secara online
                </p>
            </div>
        </div>
    </div>

    <!-- Hero Section as Slider -->
    <section class="hero-pattern py-12 md:py-20 relative">
        <div class="container mx-auto px-4">
            <div id="hero-slider" class="relative overflow-hidden">
                <!-- Slides -->
                <div class="flex transition-transform duration-700" id="slider-track" style="transform: translateX(0%);">
                    <!-- Slide 1 -->
                    <div class="flex flex-col md:flex-row items-center min-w-full">
                        <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                            <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-4">Selamat Datang di Portal Resmi BPMP Provinsi NTB
                            </h2>
                            <p class="text-gray-700 mb-6">Kami berkomitmen untuk memberikan pelayanan terbaik dan informasi yang transparan kepada seluruh masyarakat.
                            </p>
                            <p class="text-gray-700 mb-6">Melayani Sepenuh Hati Bersama Menjamin Mutu!
                            </p>
                            <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                                <a href="#"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg text-center transition duration-300">Layanan
                                    Online</a>
                                <a href="#"
                                    class="bg-white hover:bg-gray-100 text-blue-600 font-medium py-3 px-6 rounded-lg border border-blue-200 text-center transition duration-300">Informasi
                                    Publik</a>
                            </div>
                        </div>
                        <div class="md:w-1/2">
                            <div class="bg-white p-1 rounded-lg shadow-lg">
                                <img class="w-full h-auto" src="kantor_depan.jpg" alt="" srcset="">
                                <!-- <svg class="w-full h-auto" viewBox="0 0 800 500" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="800" height="500" fill="#f0f4f8" />
                                    <rect x="100" y="100" width="600" height="300" rx="8" fill="#e2e8f0" />
                                    <rect x="150" y="150" width="500" height="200" rx="4" fill="#cbd5e1" />
                                    <rect x="200" y="200" width="400" height="100" rx="2" fill="#94a3b8" />
                                    <circle cx="400" cy="250" r="80" fill="#1e40af" opacity="0.8" />
                                    <path d="M400,190 L420,240 L475,240 L430,270 L450,325 L400,295 L350,325 L370,270 L325,240 L380,240 Z" fill="#ffffff" />
                                </svg> -->
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="flex flex-col md:flex-row items-center min-w-full">
                        <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                            <h2 class="text-3xl md:text-4xl font-bold text-green-900 mb-4">Selamat Hari Kebangkitan Nasional Republik Indonesia</h2>
                            <p class="text-gray-700 mb-6">Bangkit bersama wujudkan Indonesia Maju.
                            </p>
                            <!-- <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                                <a href="#"
                                    class="bg-green-600 hover:bg-green-700 text-white font-medium py-3 px-6 rounded-lg text-center transition duration-300">Cek
                                    Layanan</a>
                                <a href="#"
                                    class="bg-white hover:bg-gray-100 text-green-600 font-medium py-3 px-6 rounded-lg border border-green-200 text-center transition duration-300">Lihat
                                    Info</a>
                            </div> -->
                        </div>
                        <div class="md:w-1/2">
                            <div class="bg-white p-1 rounded-lg shadow-lg">
                                <img class="w-full h-auto" src="harkitnas.png" alt="" srcset="">
                                <!-- <svg class="w-full h-auto" viewBox="0 0 800 500" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="800" height="500" fill="#e0fce0" />
                                    <rect x="120" y="120" width="560" height="260" rx="8" fill="#bbf7d0" />
                                    <rect x="180" y="180" width="440" height="140" rx="4" fill="#6ee7b7" />
                                    <circle cx="400" cy="250" r="80" fill="#059669" opacity="0.8" />
                                    <path d="M400,190 L420,240 L475,240 L430,270 L450,325 L400,295 L350,325 L370,270 L325,240 L380,240 Z" fill="#ffffff" />
                                </svg> -->
                            </div>
                        </div>
                    </div>
                    <!-- Slide 3 -->
                    <div class="flex flex-col md:flex-row items-center min-w-full">
                        <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                            <h2 class="text-3xl md:text-4xl font-bold text-purple-900 mb-4">Pelayanan Prima untuk Semua</h2>
                            <p class="text-gray-700 mb-6">Kami hadir untuk melayani masyarakat dengan sepenuh hati dan inovasi digital.
                            </p>
                            <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                                <a href="#"
                                    class="bg-purple-600 hover:bg-purple-700 text-white font-medium py-3 px-6 rounded-lg text-center transition duration-300">Ajukan
                                    Pengaduan</a>
                                <a href="#"
                                    class="bg-white hover:bg-gray-100 text-purple-600 font-medium py-3 px-6 rounded-lg border border-purple-200 text-center transition duration-300">Baca
                                    Berita</a>
                            </div>
                        </div>
                        <div class="md:w-1/2">
                            <div class="bg-white p-1 rounded-lg shadow-lg">
                                <svg class="w-full h-auto" viewBox="0 0 800 500" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="800" height="500" fill="#ede9fe" />
                                    <rect x="100" y="100" width="600" height="300" rx="8" fill="#ddd6fe" />
                                    <rect x="200" y="200" width="400" height="100" rx="4" fill="#a78bfa" />
                                    <circle cx="400" cy="250" r="80" fill="#7c3aed" opacity="0.8" />
                                    <path d="M400,190 L420,240 L475,240 L430,270 L450,325 L400,295 L350,325 L370,270 L325,240 L380,240 Z" fill="#ffffff" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slider Controls -->
                <button id="slider-prev" class="absolute left-2 top-1/2 -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-2 shadow transition hidden md:block">
                    <svg class="w-6 h-6 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="slider-next" class="absolute right-2 top-1/2 -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-2 shadow transition hidden md:block">
                    <svg class="w-6 h-6 text-blue-900" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <!-- Dots -->
                <div class="absolute left-1/2 -translate-x-1/2 bottom-4 flex space-x-2">
                    <button class="w-3 h-3 rounded-full bg-blue-300" data-slide="0"></button>
                    <button class="w-3 h-3 rounded-full bg-blue-200" data-slide="1"></button>
                    <button class="w-3 h-3 rounded-full bg-blue-200" data-slide="2"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Layanan Publik</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Berbagai layanan yang dapat diakses untuk memudahkan
                    masyarakat dalam mendapatkan informasi dan mengurus keperluan administrasi.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service Card 1 -->
                <div class="bg-blue-50 rounded-xl p-6 shadow-sm hover:shadow-md transition duration-300">
                    <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Dokumen Kependudukan</h3>
                    <p class="text-gray-600 mb-4">Pengurusan KTP, KK, Akta Kelahiran, dan dokumen kependudukan lainnya.
                    </p>
                    <a href="#" class="text-blue-600 font-medium hover:text-blue-800 flex items-center">
                        Selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <!-- Service Card 2 -->
                <div class="bg-green-50 rounded-xl p-6 shadow-sm hover:shadow-md transition duration-300">
                    <div class="bg-green-100 rounded-full w-16 h-16 flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Perizinan</h3>
                    <p class="text-gray-600 mb-4">Pengurusan berbagai jenis perizinan usaha, bangunan, dan perizinan
                        lainnya.</p>
                    <a href="#" class="text-green-600 font-medium hover:text-green-800 flex items-center">
                        Selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <!-- Service Card 3 -->
                <div class="bg-purple-50 rounded-xl p-6 shadow-sm hover:shadow-md transition duration-300">
                    <div class="bg-purple-100 rounded-full w-16 h-16 flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Pengaduan Masyarakat</h3>
                    <p class="text-gray-600 mb-4">Layanan pengaduan masyarakat untuk menyampaikan keluhan dan aspirasi.
                    </p>
                    <a href="#" class="text-purple-600 font-medium hover:text-purple-800 flex items-center">
                        Selengkapnya
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="text-center mt-10">
                <a href="#"
                    class="inline-block bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-3 px-6 rounded-lg transition duration-300">Lihat
                    Semua Layanan</a>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Berita Terkini</h2>
                <a href="#" class="text-blue-600 font-medium hover:text-blue-800 flex items-center">
                    Lihat Semua Berita
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- News Card 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-48 bg-blue-200 relative">
                        <svg class="w-full h-full" viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                            <rect width="400" height="200" fill="#bfdbfe" />
                            <circle cx="250" cy="50" r="30" fill="#93c5fd" />
                            <rect x="50" y="80" width="300" height="2" fill="#60a5fa" />
                            <rect x="50" y="100" width="200" height="2" fill="#60a5fa" />
                            <rect x="50" y="120" width="250" height="2" fill="#60a5fa" />
                        </svg>
                        <div class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded">
                            Pemerintahan
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">15 Juni 2023</div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Rapat Koordinasi Pembangunan Daerah Tahun
                            2023</h3>
                        <p class="text-gray-600 mb-4">Pemerintah daerah menggelar rapat koordinasi untuk membahas
                            rencana pembangunan infrastruktur di tahun anggaran 2023.</p>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Baca selengkapnya</a>
                    </div>
                </div>

                <!-- News Card 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-48 bg-green-200 relative">
                        <svg class="w-full h-full" viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                            <rect width="400" height="200" fill="#bbf7d0" />
                            <circle cx="100" cy="50" r="30" fill="#86efac" />
                            <rect x="50" y="80" width="300" height="2" fill="#4ade80" />
                            <rect x="50" y="100" width="200" height="2" fill="#4ade80" />
                            <rect x="50" y="120" width="250" height="2" fill="#4ade80" />
                        </svg>
                        <div class="absolute top-4 left-4 bg-green-600 text-white text-xs font-bold px-2 py-1 rounded">
                            Kesehatan
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">10 Juni 2023</div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Program Vaksinasi Massal di 5 Kecamatan
                        </h3>
                        <p class="text-gray-600 mb-4">Dinas Kesehatan akan melaksanakan program vaksinasi massal di 5
                            kecamatan selama bulan Juli 2023.</p>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Baca selengkapnya</a>
                    </div>
                </div>

                <!-- News Card 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-48 bg-amber-200 relative">
                        <svg class="w-full h-full" viewBox="0 0 400 200" xmlns="http://www.w3.org/2000/svg">
                            <rect width="400" height="200" fill="#fde68a" />
                            <circle cx="300" cy="50" r="30" fill="#fcd34d" />
                            <rect x="50" y="80" width="300" height="2" fill="#fbbf24" />
                            <rect x="50" y="100" width="200" height="2" fill="#fbbf24" />
                            <rect x="50" y="120" width="250" height="2" fill="#fbbf24" />
                        </svg>
                        <div class="absolute top-4 left-4 bg-amber-600 text-white text-xs font-bold px-2 py-1 rounded">
                            Pendidikan
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">5 Juni 2023</div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Beasiswa untuk Siswa Berprestasi Tahun 2023
                        </h3>
                        <p class="text-gray-600 mb-4">Pemerintah daerah membuka pendaftaran beasiswa untuk siswa
                            berprestasi dari keluarga kurang mampu.</p>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Baca selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-12 bg-blue-900 text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Data dan Statistik</h2>
                <p class="max-w-2xl mx-auto text-blue-100">Informasi statistik terkini mengenai perkembangan daerah dan
                    pelayanan publik.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Stat 1 -->
                <div class="bg-blue-800 rounded-xl p-6 text-center">
                    <div class="text-4xl font-bold mb-2">245.678</div>
                    <div class="text-xl font-medium mb-1">Penduduk</div>
                    <div class="text-blue-200 text-sm">Data per Juni 2023</div>
                </div>

                <!-- Stat 2 -->
                <div class="bg-blue-800 rounded-xl p-6 text-center">
                    <div class="text-4xl font-bold mb-2">98,7%</div>
                    <div class="text-xl font-medium mb-1">Kepuasan Layanan</div>
                    <div class="text-blue-200 text-sm">Survei Triwulan II 2023</div>
                </div>

                <!-- Stat 3 -->
                <div class="bg-blue-800 rounded-xl p-6 text-center">
                    <div class="text-4xl font-bold mb-2">12.450</div>
                    <div class="text-xl font-medium mb-1">Layanan Online</div>
                    <div class="text-blue-200 text-sm">Transaksi per bulan</div>
                </div>

                <!-- Stat 4 -->
                <div class="bg-blue-800 rounded-xl p-6 text-center">
                    <div class="text-4xl font-bold mb-2">85,3%</div>
                    <div class="text-xl font-medium mb-1">Penyelesaian Aduan</div>
                    <div class="text-blue-200 text-sm">Semester I 2023</div>
                </div>
            </div>

            <div class="text-center mt-10">
                <a href="#"
                    class="inline-block bg-white text-blue-900 font-medium py-3 px-6 rounded-lg hover:bg-blue-100 transition duration-300">Lihat
                    Data Lengkap</a>
            </div>
        </div>
    </section>

    <!-- Quick Links -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Tautan Penting</h2>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                <a href="#"
                    class="bg-gray-50 hover:bg-gray-100 p-4 rounded-lg flex flex-col items-center justify-center text-center transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600 mb-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span class="text-gray-800 font-medium">Kantor Dinas</span>
                </a>

                <a href="#"
                    class="bg-gray-50 hover:bg-gray-100 p-4 rounded-lg flex flex-col items-center justify-center text-center transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600 mb-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                    </svg>
                    <span class="text-gray-800 font-medium">E-Pajak</span>
                </a>

                <a href="#"
                    class="bg-gray-50 hover:bg-gray-100 p-4 rounded-lg flex flex-col items-center justify-center text-center transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600 mb-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="text-gray-800 font-medium">Kepegawaian</span>
                </a>

                <a href="#"
                    class="bg-gray-50 hover:bg-gray-100 p-4 rounded-lg flex flex-col items-center justify-center text-center transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600 mb-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span class="text-gray-800 font-medium">Pengadaan</span>
                </a>

                <a href="#"
                    class="bg-gray-50 hover:bg-gray-100 p-4 rounded-lg flex flex-col items-center justify-center text-center transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600 mb-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="text-gray-800 font-medium">Agenda</span>
                </a>

                <a href="#"
                    class="bg-gray-50 hover:bg-gray-100 p-4 rounded-lg flex flex-col items-center justify-center text-center transition duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600 mb-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="text-gray-800 font-medium">Kontak Kami</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white pt-12 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <!-- Column 1 -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Pemerintah Daerah</h3>
                    <p class="text-gray-300 mb-4">Jl. Contoh No. 123<br>Kota Contoh, 12345<br>Indonesia</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Column 2 -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">Beranda</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Profil</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Layanan</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Berita</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Galeri</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Kontak</a></li>
                    </ul>
                </div>

                <!-- Column 3 -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Layanan</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white">Dokumen Kependudukan</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Perizinan</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Pengaduan</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Pajak Daerah</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Kesehatan</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white">Pendidikan</a></li>
                    </ul>
                </div>

                <!-- Column 4 -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Hubungi Kami</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 text-gray-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="text-gray-300">(021) 1234-5678</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 text-gray-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-gray-300">info@pemda.go.id</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 text-gray-400"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-gray-300">Jl. Contoh No. 123, Kota Contoh, 12345</span>
                        </li>
                    </ul>

                    <div class="mt-6">
                        <h4 class="text-lg font-medium mb-2">Jam Layanan</h4>
                        <p class="text-gray-300">Senin - Jumat: 08.00 - 16.00 WIB</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm mb-4 md:mb-0">&copy; 2023 Pemerintah Daerah. Hak Cipta Dilindungi.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Kebijakan Privasi</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Syarat dan Ketentuan</a>
                        <a href="#" class="text-gray-400 hover:text-white text-sm">Peta Situs</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        document.getElementById('menuToggle').addEventListener('click', function () {
            const navMenu = document.getElementById('navMenu');
            navMenu.classList.toggle('hidden');
        });

        // Make sure navigation is visible on larger screens
        window.addEventListener('resize', function () {
            const navMenu = document.getElementById('navMenu');
            if (window.innerWidth >= 768) {
                navMenu.classList.remove('hidden');
            } else {
                navMenu.classList.add('hidden');
            }
        });

        // Hero slider logic
        const sliderTrack = document.getElementById('slider-track');
        const slides = sliderTrack.children;
        const totalSlides = slides.length;
        let currentSlide = 0;

        const prevBtn = document.getElementById('slider-prev');
        const nextBtn = document.getElementById('slider-next');
        const dots = document.querySelectorAll('[data-slide]');

        function showSlide(idx) {
            currentSlide = idx;
            sliderTrack.style.transform = `translateX(-${idx * 100}%)`;
            dots.forEach((dot, i) => {
                dot.classList.toggle('bg-blue-300', i === idx);
                dot.classList.toggle('bg-blue-200', i !== idx);
            });
        }

        if (prevBtn && nextBtn) {
            prevBtn.addEventListener('click', () => {
                showSlide((currentSlide - 1 + totalSlides) % totalSlides);
            });
            nextBtn.addEventListener('click', () => {
                showSlide((currentSlide + 1) % totalSlides);
            });
        }

        dots.forEach((dot, i) => {
            dot.addEventListener('click', () => showSlide(i));
        });

        // Auto slide
        setInterval(() => {
            showSlide((currentSlide + 1) % totalSlides);
        }, 7000);

        // Init
        showSlide(0);
    </script>
    <script>(function () { function c() { var b = a.contentDocument || a.contentWindow.document; if (b) { var d = b.createElement('script'); d.innerHTML = "window.__CF$cv$params={r:'94ddf746f21681f8',t:'MTc0OTYxMTk1Ni4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);"; b.getElementsByTagName('head')[0].appendChild(d) } } if (document.body) { var a = document.createElement('iframe'); a.height = 1; a.width = 1; a.style.position = 'absolute'; a.style.top = 0; a.style.left = 0; a.style.border = 'none'; a.style.visibility = 'hidden'; document.body.appendChild(a); if ('loading' !== document.readyState) c(); else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c); else { var e = document.onreadystatechange || function () { }; document.onreadystatechange = function (b) { e(b); 'loading' !== document.readyState && (document.onreadystatechange = e, c()) } } } })();</script>
</body>

</html>