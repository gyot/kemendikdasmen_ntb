<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Judul Default Website')</title>
    <link rel="icon" href="{{ asset('upload/settings/'.$setting->favicon) }}" type="image/png">
    <meta name="description" content="@yield('meta_description', 'Deskripsi default website')">
    <meta name="keywords" content="@yield('meta_keywords', 'keyword, default')">
    <meta name="author" content="@yield('meta_author', 'Nama Anda atau Instansi')">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og_title', 'Judul OG')">
    <meta property="og:description" content="@yield('og_description', 'Deskripsi OG')">
    <meta property="og:image" content="@yield('og_image', asset('images/logo.png'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Judul Twitter')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Deskripsi Twitter')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/logo.png'))">

    <link rel="canonical" href="{{ url()->current() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

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

        #chatbot-intan-iframe .disable-pointer {
            pointer-events: none !important;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Header -->
    <iframe 
    id="chatbot-intan-iframe"
    src="https://bpmpntb.id/chatbot/"
    style="
        position: fixed;
        bottom: 24px;
        right: 24px;
        width: 350px;
        height: 500px;
        border: none;
        border-radius: px;
        z-index: 99999;
        
    
        "
    allowtransparency="true"
    ></iframe>
    <header class="bg-white-900 text-dark relative z-50 sticky top-0">

        <!-- Main Header -->
        <div id="mainHeader" class="w-full bg-white py-4 transition-all duration-300 z-40">
            <div class="container mx-auto px-4 flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center mb-4 md:mb-0">
                    <img src="{{asset('logo_pojok.png')}}" style="width: 400px;" alt="" srcset="">
                </div>
                <div class="hidden md:block ml-4 flex-shrink-0">
                </div>
                <div class="relative">
                    <img src="{{asset('zi_wbbm.png')}}" width="400" alt="ZI WBBM" class="inline-block align-middle">
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav id="mainNav" class="bg-blue-800 w-full z-50  transition-all duration-300">
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
                        <a href="{{url('/')}}"
                            class="block px-4 py-3 md:py-4 text-blue-100 hover:bg-blue-700 hover:text-white font-medium">Beranda</a>
                        
                        <div class="relative group">
                            <a href="#"
                                class="block px-4 py-3 md:py-4 text-blue-100 hover:bg-blue-700 hover:text-white font-medium cursor-pointer">
                                Profil
                                <i class="fa fa-caret-down ml-1"></i>
                            </a>
                            <!-- Submenu Profil -->
                            <div class="absolute left-0 top-full w-48 bg-white rounded shadow-lg z-20 opacity-0 group-hover:opacity-100 group-hover:visible invisible transition duration-200">
                                @foreach ($profil as $item)
                                    <a href="{{url('post/profil/'.$item->id.'/'.$item->slug)}}" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">{{$item->title}}</a>
                                @endforeach
                                <a href="{{url('sarpras')}}" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Sarana dan Prasarana</a>
                            </div>
                        </div>

                        <div class="relative group">
                            <a href="#"
                                class="block px-4 py-3 md:py-4 text-blue-100 hover:bg-blue-700 hover:text-white font-medium cursor-pointer">
                                Layanan
                                <i class="fa fa-caret-down ml-1"></i>
                            </a>
                            <!-- Submenu Layanan -->
                            <div class="absolute left-0 top-full w-48 bg-white rounded shadow-lg z-20 opacity-0 group-hover:opacity-100 group-hover:visible invisible transition duration-200">
                                <a href="https://www.youtube.com/playlist?list=PL1t-87ZxIfYAVpOT-PgsWP6qnAazPA9WW" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">SINIAR</a>
                                <a href="https://www.youtube.com/playlist?list=PL1t-87ZxIfYBMp8CeYZ7gw6R6ktY6aY_q" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">SILAMO</a>
                            </div>
                        </div>

                        <div class="relative group">
                            <a href="#"
                                class="block px-4 py-3 md:py-4 text-blue-100 hover:bg-blue-700 hover:text-white font-medium cursor-pointer">
                                Rubrik
                                <i class="fa fa-caret-down ml-1"></i>
                            </a>
                            <!-- Submenu Rubrik -->
                            <div class="absolute left-0 top-full w-48 bg-white rounded shadow-lg z-20 opacity-0 group-hover:opacity-100 group-hover:visible invisible transition duration-200">
                                <a href="{{ url('post/berita') }}" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Berita</a>
                                <a href="{{ url('post/artikel') }}" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Artikel</a>
                                <a href="{{ url('post/jurnal') }}" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Jurnal</a>
                                <a href="{{ url('post/pengumuman') }}" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Pengumuman</a>
                                <a href="{{ url('post/unduhan') }}" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Unduhan</a>
                                <a href="{{ url('post/buletin') }}" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Buletin</a>
                            </div>
                        </div>

                        <a href="https://sertifikat.bpmpntb.id" class="block px-4 py-3 md:py-4 text-blue-100 hover:bg-blue-700 hover:text-white font-medium">e-Sertifikat</a>
                        <a href="{{url('pinjam-sarpras')}}" class="block px-4 py-3 md:py-4 text-blue-100 hover:bg-blue-700 hover:text-white font-medium">SIPEDAS</a>

                        <div class="relative group">
                            <a href="#"
                                class="block px-4 py-3 md:py-4 text-blue-100 hover:bg-blue-700 hover:text-white font-medium cursor-pointer">
                                Galeri
                                <i class="fa fa-caret-down ml-1"></i>
                            </a>
                            <!-- Submenu Galeri -->
                            <div class="absolute left-0 top-full w-48 bg-white rounded shadow-lg z-20 opacity-0 group-hover:opacity-100 group-hover:visible invisible transition duration-200">
                                <a href="{{ url('post/galeri') }}" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Galeri Foto</a>
                                <a href="https://www.youtube.com/channel/UCPEboIckzB8G4LqtmkpuvDQ" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Galeri Video</a>
                                <a href="{{ url('post/kliping') }}" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Galeri Kliping</a>
                            </div>
                        </div>

                        <div class="relative group">
                            <a href="#"
                                class="block px-4 py-3 md:py-4 text-blue-100 hover:bg-blue-700 hover:text-white font-medium cursor-pointer">
                                ZI WBK-WBMM
                                <i class="fa fa-caret-down ml-1"></i>
                            </a>
                            <!-- Submenu ZI WBK-WBMM -->
                            <div class="absolute left-0 top-full w-72 bg-white rounded shadow-lg z-20 opacity-0 group-hover:opacity-100 group-hover:visible invisible transition duration-200">
                                <a href="https://forms.gle/k7rk5AP4cNfjzrcd6" target="_blank" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Survey Kepuasan Pelanggan</a>
                                <a href="https://bpmpntb.kemendikdasmen.go.id/survey-kepuasan-pelanggan" target="_blank" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Hasil Survey Kepuasan Pelanggan</a>
                                <a href="https://docs.google.com/spreadsheets/d/11H4pQiAt-T9xYUjykG9E_53RdHd1P2f2W2M3wmNZ5Og/edit?usp=sharing" target="_blank" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Bukti Lapor SPT</a>
                                <a href="http://bit.ly/BPMPNTB-Lapor" target="_blank" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Formulir Online Pelaporan Gratifikasi BPMP NTB</a>
                                <a href="https://wbs.kemdikbud.go.id/" target="_blank" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">WBS (Whistle Blowing Sistem) Kemdikbudristek</a>
                                <a href="https://posko-pengaduan.itjen.kemdikbud.go.id/index.php" target="_blank" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Pengaduan Itjen Kemdikbudristek</a>
                                <a href="https://bpmpntb.kemendikdasmen.go.id/piagam-penghargaan-dan-prestasi" target="_blank" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Piagam Penghargaan dan Prestasi</a>
                            </div>
                        </div>

                        {{-- <div class="relative group">
                            <a href="#"
                                class="block px-4 py-3 md:py-4 text-blue-100 hover:bg-blue-700 hover:text-white font-medium cursor-pointer">
                                PPID
                                <i class="fa fa-caret-down ml-1"></i>
                            </a>
                            <!-- Submenu ZI WBK-WBMM -->
                            <div class="absolute left-0 mt-0.5 w-72 bg-white rounded shadow-lg z-20 opacity-0 group-hover:opacity-100 group-hover:visible invisible transition duration-200">
                                <a href="https://forms.gle/k7rk5AP4cNfjzrcd6" target="_blank" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Survey Kepuasan Pelanggan</a>
                                <a href="https://bpmpntb.kemendikdasmen.go.id/survey-kepuasan-pelanggan" target="_blank" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Hasil Survey Kepuasan Pelanggan</a>
                                <a href="https://docs.google.com/spreadsheets/d/11H4pQiAt-T9xYUjykG9E_53RdHd1P2f2W2M3wmNZ5Og/edit?usp=sharing" target="_blank" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Bukti Lapor SPT</a>
                                <a href="http://bit.ly/BPMPNTB-Lapor" target="_blank" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Formulir Online Pelaporan Gratifikasi BPMP NTB</a>
                                <a href="https://wbs.kemdikbud.go.id/" target="_blank" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">WBS (Whistle Blowing Sistem) Kemdikbudristek</a>
                                <a href="https://posko-pengaduan.itjen.kemdikbud.go.id/index.php" target="_blank" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Pengaduan Itjen Kemdikbudristek</a>
                                <a href="https://bpmpntb.kemendikdasmen.go.id/piagam-penghargaan-dan-prestasi" target="_blank" class="block px-4 py-2 text-blue-800 hover:bg-blue-100">Piagam Penghargaan dan Prestasi</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </nav>

    </header>
    
    @isset($pengumuman[0]->content)
        
    <!-- Announcement Ticker -->
    <div class="bg-yellow-100 border-y border-yellow-200 py-2 overflow-hidden flex items-center justify-between">
        <div class="flex items-center flex-1 min-w-0">
            <a href="{{url('post/pengumuman')}}" class="bg-yellow-500 text-white px-3 py-1 font-bold text-sm whitespace-nowrap">
                PENGUMUMAN
            </a>
            <div class="overflow-hidden flex-1 ml-4">
                <div class="announcement-ticker whitespace-nowrap text-gray-800">
                    {!! $pengumuman[0]->content !!}
                </div>
            </div>
        </div>
    </div>
    @endisset

    @yield('content')    

    <!-- Footer -->
    <footer class="bg-gray-800 text-white pt-12 pb-6">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">

            <!-- Kolom 1: Info Instansi -->
            <div>
                <h3 class="text-xl font-bold mb-4">{{ $setting->title ?? 'Pemerintah Daerah' }}</h3>
                <p class="text-gray-300 mb-4">{!! nl2br(e($setting->alamat)) !!}</p>
                <iframe src="{{$setting->map}}" frameborder="0"></iframe>
                <div class="flex space-x-4">
                    @if($setting->facebook)
                        <a href="{{ $setting->facebook }}" class="text-gray-300 hover:text-white" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if($setting->instagram)
                        <a href="{{ $setting->instagram }}" class="text-gray-300 hover:text-white" target="_blank"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if($setting->youtube)
                        <a href="{{ $setting->youtube }}" class="text-gray-300 hover:text-white" target="_blank"><i class="fab fa-youtube"></i></a>
                    @endif
                    @if($setting->whatsapp)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $setting->whatsapp) }}" class="text-gray-300 hover:text-white" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    @endif
                </div>
            </div>

            <!-- Kolom 2: Visitor -->
            <div>
                <h3 class="text-xl font-bold mb-4">Visitor</h3>
                <ul class="space-y-2">
                    <li><span class="font-semibold">Total Pengunjung:</span> {{ $totalVisitors ?? 0 }}</li>
                    <li><span class="font-semibold">Pengunjung Hari Ini:</span> {{ $todayVisitors ?? 0 }}</li>
                    <li><span class="font-semibold">Pengunjung Bulan Ini:</span> {{ $thismonthVisitors ?? 0 }}</li>
                    <li><span class="font-semibold">Halaman Ini Dilihat:</span> {{ $pageViews ?? 0 }}</li>
                    <li><span class="font-semibold">Pengunjung Online:</span> {{ $onlineVisitors ?? 0 }}</li>
                </ul>
            </div>

            <!-- Kolom 3: Hubungi Kami -->
            <div>
                <h3 class="text-xl font-bold mb-4">Hubungi Kami</h3>
                <ul class="space-y-2">
                    <li class="flex items-start">
                        <i class="fas fa-phone-alt mr-2 text-gray-400"></i>
                        <span class="text-gray-300">{{ $setting->phone }}</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-envelope mr-2 text-gray-400"></i>
                        <span class="text-gray-300">{{ $setting->email }}</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mr-2 text-gray-400"></i>
                        <span class="text-gray-300">{{ $setting->alamat }}</span>
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
                <p class="text-gray-400 text-sm mb-4 md:mb-0">&copy; {{ date('Y') }} {{ $setting->title ?? 'Instansi Pemerintah' }}. All rights reserved.</p>
                
            </div>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        document.querySelectorAll('.menu-links > li').forEach(function(menuItem) {
            menuItem.addEventListener('mouseenter', function() {
                document.getElementById('chatbot-intan-iframe').classList.add('disable-pointer');
            });
            menuItem.addEventListener('mouseleave', function() {
                document.getElementById('chatbot-intan-iframe').classList.remove('disable-pointer');
            });
        });
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let lastScroll = 0;
            const header = document.getElementById('mainHeader');
            const nav = document.getElementById('mainNav');
            window.addEventListener('scroll', function () {
                if (window.scrollY > 80) {
                    header.classList.add('opacity-0', 'pointer-events-none');
                    nav.classList.add('fixed', 'top-0', 'left-0');
                    nav.classList.remove('relative');
                } else {
                    header.classList.remove('opacity-0', 'pointer-events-none');
                    nav.classList.remove('fixed', 'top-0', 'left-0');
                    nav.classList.add('relative');
                }
            });
        });
    </script>
    <script>(function () { function c() { var b = a.contentDocument || a.contentWindow.document; if (b) { var d = b.createElement('script'); d.innerHTML = "window.__CF$cv$params={r:'94ddf746f21681f8',t:'MTc0OTYxMTk1Ni4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);"; b.getElementsByTagName('head')[0].appendChild(d) } } if (document.body) { var a = document.createElement('iframe'); a.height = 1; a.width = 1; a.style.position = 'absolute'; a.style.top = 0; a.style.left = 0; a.style.border = 'none'; a.style.visibility = 'hidden'; document.body.appendChild(a); if ('loading' !== document.readyState) c(); else if (window.addEventListener) document.addEventListener('DOMContentLoaded', c); else { var e = document.onreadystatechange || function () { }; document.onreadystatechange = function (b) { e(b); 'loading' !== document.readyState && (document.onreadystatechange = e, c()) } } } })();</script>
    @stack('scripts')
</body>

</html>