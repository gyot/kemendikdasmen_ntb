@extends('main')

@section('title', 'Beranda - '.$setting->title)
@section('meta_description', 'Selamat datang di website resmi BPMP Provinsi NTB. Bersama Menjamin Mutu, Melayani Sepenuh Hati.')
@section('meta_keywords', 'BPMP, NTB, Pendidikan, Mutu, Layanan, Berita, Informasi')
@section('meta_author', 'BPMP Provinsi NTB')
@section('og_title', 'Beranda - '.$setting->title)
@section('og_description', 'Selamat datang di website resmi BPMP Provinsi NTB. Bersama Menjamin Mutu, Melayani Sepenuh Hati.')
@section('og_image', asset('upload/settings/'.$setting->logo))
@section('twitter_title', 'Beranda - '.$setting->title)
@section('twitter_description', 'Selamat datang di website resmi BPMP Provinsi NTB. Bersama Menjamin Mutu, Melayani Sepenuh Hati.')
@section('twitter_image', asset('upload/settings/'.$setting->logo))

@section('content')
    <!-- Hero Section as Modern Full Width Slider -->
    <section class="hero-pattern py-0 md:py-0 relative bg-[#edf4fa]">
        <!-- Abstrak Background SVG -->
        <div class="absolute inset-0 z-0 w-full h-full">
            <svg class="w-full h-full" viewBox="0 0 1440 640" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <!-- Lingkaran kiri -->
                <circle cx="200" cy="200" r="180" fill="#38bdf8" fill-opacity="0.15"/>
                <!-- Lingkaran kanan atas -->
                <circle cx="1300" cy="100" r="140" fill="#6366f1" fill-opacity="0.12"/>
                <!-- Ellipse tengah bawah -->
                <ellipse cx="720" cy="540" rx="400" ry="120" fill="#0ea5e9" fill-opacity="0.10"/>
                <!-- Lingkaran kecil tengah -->
                <circle cx="800" cy="200" r="90" fill="#2563eb" fill-opacity="0.08"/>
                <!-- Ellipse bawah kiri -->
                <ellipse cx="300" cy="600" rx="200" ry="60" fill="#fbbf24" fill-opacity="0.06"/>
                <!-- Wave halus di bawah -->
                <path fill="#a2d9ff" fill-opacity="0.1" d="M0,320L80,309.3C160,299,320,277,480,288C640,299,800,341,960,341.3C1120,341,1280,299,1360,277.3L1440,256L1440,640L1360,640C1280,640,1120,640,960,640C800,640,640,640,480,640C320,640,160,640,80,640L0,640Z"/>
            </svg>
        </div>

        <div class="w-full relative z-10">
            <div class="relative w-full overflow-hidden shadow-xl">
                <!-- Slides Wrapper -->
                <div id="hero-slider" class="relative w-full  bg-blue-400">
                    <div id="slider-track" class="relative w-full flex transition-all duration-500" style="height: 640px;">
                        <!-- Slide 1 (Static) -->
                        <div class="slide flex-shrink-0 w-full h-full flex items-center justify-center relative bg-white bg-opacity-80">
                            <img src="kantor_depan.jpg"
                                alt="Kantor Depan"
                                class="h-full object-cover object-center" />
                            <!-- Title & Description -->
                            <div class="absolute bottom-0 left-0 w-full px-8 pb-8 pt-12 bg-gradient-to-t from-black/70 via-black/30 to-transparent z-20 flex flex-col items-start">
                                <h2 class="text-2xl md:text-4xl font-bold text-white mb-2 drop-shadow">BPMP Provinsi NTB</h2>
                                <p class="text-white/90 text-base md:text-lg drop-shadow">Bersama Menjamin Mutu, Melayani Sepenuh Hati</p>
                            </div>
                        </div>
                        <!-- Dynamic Slides -->
                        @foreach ($sliders as $item)
                        <div class="slide flex-shrink-0 w-full h-full flex items-center justify-center relative bg-white bg-opacity-80">
                            <img src="{{ asset('upload/sliders/'.$item->image) }}"
                                alt="{{ $item->title }}"
                                class="h-full object-cover object-center" />
                            <!-- Title & Description -->
                            @if ($item->description != null || $item->description != '' )
                            <div class="absolute bottom-0 left-0 w-full px-8 pb-8 pt-12 bg-gradient-to-t from-black/70 via-black/30 to-transparent z-20 flex flex-col items-start">
                                <h2 class="text-2xl md:text-4xl font-bold text-white mb-2 drop-shadow">{{ $item->title }}</h2>
                                <p class="text-white/90 text-base md:text-lg drop-shadow">{{ $item->description }}</p>
                            </div>                                
                            @endif
                        </div>
                        @endforeach
                    </div>
                    <!-- Slider Controls -->
                    <button id="slider-prev" class="absolute left-0 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-blue-900 rounded-r-lg w-12 h-20 flex items-center justify-center shadow transition z-30">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="slider-next" class="absolute right-0 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white text-blue-900 rounded-l-lg w-12 h-20 flex items-center justify-center shadow transition z-30">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    <!-- Dots -->
                    <div id="slider-dots" class="absolute left-1/2 -translate-x-1/2 bottom-4 flex space-x-2 z-30"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">KINERJA LEMBAGA</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                <!-- Card 1 -->
                <a href="{{url('post/lakin/')}}" class="bg-white rounded-xl shadow-sm hover:shadow-md transition duration-300 flex flex-col items-center p-6 group">
                    <div class="w-24 h-24 flex items-center justify-center bg-blue-50 rounded-full mb-4 overflow-hidden">
                        <img src="{{ asset('lakin.png') }}" alt="Laporan Kinerja" class="object-contain h-16 w-16">
                    </div>
                    <div class="text-blue-900 font-semibold text-lg group-hover:text-blue-700">Laporan Kinerja</div>
                </a>
                <!-- Card 2 -->
                <a href="{{url('post/renstra/')}}" class="bg-white rounded-xl shadow-sm hover:shadow-md transition duration-300 flex flex-col items-center p-6 group">
                    <div class="w-24 h-24 flex items-center justify-center bg-blue-50 rounded-full mb-4 overflow-hidden">
                        <img src="{{ asset('renstra.png') }}" alt="Rencana Strategis" class="object-contain h-16 w-16">
                    </div>
                    <div class="text-blue-900 font-semibold text-lg group-hover:text-blue-700">Rencana Strategis</div>
                </a>
                <!-- Card 3 -->
                <a href="{{url('post/perjanjian_kinerja/')}}" class="bg-white rounded-xl shadow-sm hover:shadow-md transition duration-300 flex flex-col items-center p-6 group">
                    <div class="w-24 h-24 flex items-center justify-center bg-blue-50 rounded-full mb-4 overflow-hidden">
                        <img src="{{ asset('handshake.png') }}" alt="Perjanjian Kinerja" class="object-contain h-16 w-16">
                    </div>
                    <div class="text-blue-900 font-semibold text-lg group-hover:text-blue-700">Perjanjian Kinerja</div>
                </a>
                <!-- Card 4: Indeks Kepuasan Masyarakat -->
                <a href="https://forms.gle/k7rk5AP4cNfjzrcd6" target="_blank" class="bg-blue-100 rounded-xl shadow-sm hover:shadow-md transition duration-300 flex flex-col items-center p-6 group border border-blue-200">
                    <div class="w-24 h-24 flex items-center justify-center mb-2">
                        <img src="{{ asset('ikm-2025.png') }}" alt="Indeks Kepuasan Masyarakat" class="object-contain h-20 w-32">
                    </div>
                    <div class="text-center">
                        <div class="text-base font-bold text-gray-700">Indeks Kepuasan Masyarakat</div>
                        <div class="text-2xl font-extrabold text-red-600">91,74</div>
                        <div class="text-sm text-gray-600">Triwulan I Tahun 2025</div>
                        <div class="mt-1 text-xs text-blue-700 underline">Beri Penilaian</div>
                    </div>
                </a>
            </div>
        </div>
    </section>                    

    <!-- Services Section -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Layanan BPMP Provinsi NTB</h2>
                {{-- Card Maklumat Pelayanan --}}
                <div class="max-w-2xl mx-auto my-10">
                    <div class="relative bg-gray-50 rounded-xl shadow-md px-6 py-8 text-center">
                        <!-- Paperclip decorations -->
                        <div class="absolute left-4 -top-4 text-4xl text-blue-200 select-none" style="font-family: cursive; transform: rotate(-15deg);">C</div>
                        <div class="absolute right-4 -top-4 text-4xl text-blue-200 select-none" style="font-family: cursive; transform: rotate(15deg);">C</div>
                        <div class="mb-4">
                            <span class="text-2xl md:text-3xl font-extrabold text-red-700 tracking-wide" style="letter-spacing:1px;">MAKLUMAT PELAYANAN</span>
                        </div>
                        <div class="text-lg md:text-xl italic font-medium text-gray-900 leading-relaxed">
                            “Dengan ini, kami sanggup menyelenggarakan pelayanan sesuai standar pelayanan yang telah ditetapkan dan apabila tidak menepati janji ini, kami siap menerima sanksi sesuai peraturan perundang-undangan yang berlaku”
                        </div>
                    </div>
                </div>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Berbagai layanan yang dapat diakses untuk memudahkan masyarakat dalam mendapatkan informasi dan mengurus keperluan administrasi.
                </p>
            </div>

            

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
                <!-- Service Card 1 -->
                <div class="bg-blue-50 rounded-xl p-3 shadow-sm hover:shadow-md transition duration-300 flex flex-col items-center text-center">
                    <img style="height: 100px" src="{{asset('data-dan-mutu.png')}}" alt="">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Layanan Data dan Informasi Mutu Pendidikan</h3>
                </div>
                <!-- Service Card 2 -->
                <div class="bg-blue-50 rounded-xl p-3 shadow-sm hover:shadow-md transition duration-300 flex flex-col items-center text-center">
                    <img style="height: 100px" src="{{asset('mutu-pendidikan.png')}}" alt="">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Layanan Pemetaan dan Supervisi Mutu Pendidikan</h3>
                </div>
                <!-- Service Card 3 -->
                <div class="bg-blue-50 rounded-xl p-3 shadow-sm hover:shadow-md transition duration-300 flex flex-col items-center text-center">
                    <img style="height: 100px" src="{{asset('kemiteraan.png')}}" alt="">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Layanan Kemitraan Penjaminan Mutu Pendidikan</h3>
                </div>
                <!-- Card 4 -->
                <div class="bg-blue-50 rounded-xl p-3 shadow-sm hover:shadow-md transition duration-300 flex flex-col items-center text-center">
                    <img style="height: 100px" src="{{asset('fasilitasi.png')}}" alt="">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Layanan Fasilitasi Penjaminan Mutu Pendidikan</h3>
                </div>
                <!-- Card 5 -->
                <div class="bg-blue-50 rounded-xl p-3 shadow-sm hover:shadow-md transition duration-300 flex flex-col items-center text-center">
                    <img style="height: 100px" src="{{asset('sarpras.png')}}" alt="">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Layanan Sarana dan Prasarana</h3>
                </div>
            </div>
            <br>
            <hr>
            <br>
            {{-- Informasi Layanan Video Conference --}}
            <div class="bg-white rounded-xl shadow-md p-6 flex flex-col md:flex-row items-center gap-6 mb-10 border border-blue-200">
                <div class="flex-shrink-0 flex items-center justify-center">
                    <img src="{{ asset('zoom-layanan.png') }}" alt="QR Zoom Layanan" class="w-40 h-40 object-contain border rounded-lg shadow" />
                </div>
                <div class="flex-1 text-left">
                    <div class="font-semibold text-lg mb-2 text-blue-900 flex items-center gap-2">
                        <i class="fas fa-video text-blue-500"></i>
                        Layanan Video Conference <span class="hidden md:inline">BPMP Provinsi NTB</span>
                    </div>
                    <div class="mb-1">
                        <span class="font-bold">Senin s.d Kamis:</span> 10.00 WITA s.d. 12.00 WITA
                    </div>
                    <div class="mb-1">
                        <span class="font-bold">Jumat:</span> 10.00 WITA s.d. 11.00 WITA
                    </div>
                    <div class="mt-2 text-xs break-all">
                        <a href="https://us06web.zoom.us/my/bpmpntb?pwd=E7j1jmYb6NVmT5wdkvApCULn6UAbkQa.1" target="_blank" class="text-blue-700 underline font-semibold">
                            https://us06web.zoom.us/my/bpmpntb?pwd=E7j1jmYb6NVmT5wdkvApCULn6UAbkQa.1
                        </a>
                    </div>
                    <div class="mt-2 text-xs text-gray-500">
                        Scan QR atau klik link untuk bergabung Zoom SILA-MO.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 md:mb-0">Postingan Terkini</h2>
                
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- News Card 1 -->
                @foreach ($lastPost as $item)
                <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-48 bg-blue-200 relative overflow-hidden">
                        <img src="{{asset('upload/'.$item->jenis.'/'.$item->images)}}" alt="" class="w-full h-full object-cover object-center" />
                        <div class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold px-2 py-1 rounded">
                            {{$item->Kategori->title ?? 'Umum'}}
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">{{$item->writer}} | {{date('d M Y', strtotime($item->tanggal));}}</div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{$item->title}}</h3>
                        <p class="text-gray-600 mb-4">{{$item->teaser()}}</p>
                        <a href="{{url('post/'.$item->jenis.'/'.$item->id.'/'.$item->slug)}}" class="text-blue-600 font-medium hover:text-blue-800">Baca selengkapnya</a>
                    </div>
                </div>
                @endforeach

                <!-- News Card 2 -->
                {{-- <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-300">
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
                </div> --}}
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="py-12 bg-blue-900 text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Data dan Statistik</h2>
                <p class="max-w-2xl mx-auto text-blue-100">
                    Informasi statistik terkini mengenai pendidikan di Provinsi NTB.
                </p>
            </div>

            <!-- Ringkasan Statistik -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10" id="statistikRingkasan"></div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Chart Sekolah Per Status -->
                <div class="bg-white rounded-xl shadow p-6 text-blue-900 flex flex-col items-center">
                    <h3 class="text-lg font-semibold mb-4">Sekolah per Status</h3>
                    <canvas id="chartSekolahStatus" height="120"></canvas>
                </div>

                <!-- Chart Kondisi Ruang -->
                <div class="bg-white rounded-xl shadow p-6 text-blue-900 flex flex-col items-center">
                    <h3 class="text-lg font-semibold mb-4">Kondisi Ruang</h3>
                    <canvas id="chartRuangKondisi" height="120"></canvas>
                </div>

                <!-- Chart Peserta Didik per Jenis Kelamin -->
                <div class="bg-white rounded-xl shadow p-6 text-blue-900 flex flex-col items-center">
                    <h3 class="text-lg font-semibold mb-4">Peserta Didik per Jenis Kelamin</h3>
                    <canvas id="chartJenisKelamin" height="120"></canvas>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Links -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">Tautan Penting</h2>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                @foreach($externalLinks as $item)
                <!-- Perbesar emoji dengan Tailwind -->
                <a href="{{ $item->link }}"
                    class="bg-gray-50 hover:bg-gray-100 p-4 rounded-lg flex flex-col items-center justify-center text-center transition duration-300">
                    <span class="mb-2 text-4xl">{{ $item->images }}</span>
                    <span class="text-gray-800 font-medium">{{ $item->title }}</span>
                </a>
                   
                @endforeach
            </div>
        </div>
    </section>

    
@endsection
@push('scripts')
<script>
    const data = {
      jumlah_sekolah: 10873,
      jumlah_peserta_didik: 1167334,
      jumlah_rombel: 56014,
      jumlah_guru: 123671,
      sekolah_per_status: [
        { status_sekolah: "Negeri", jumlah: 4235 },
        { status_sekolah: "Swasta", jumlah: 6638 }
      ],
      peserta_didik_per_jenis_kelamin: [
        { jenis_kelamin: "Laki-laki", jumlah: 602627 },
        { jenis_kelamin: "Perempuan", jumlah: 564707 }
      ],
      ruang_kondisi: [
        { kondisi: "Baik", jumlah: 19495 },
        { kondisi: "Rusak Ringan", jumlah: 15035 },
        { kondisi: "Rusak Sedang", jumlah: 13328 },
        { kondisi: "Rusak Berat", jumlah: 2806 }
      ]
    };

    // Render Ringkasan
    const ringkasan = [
      { title: "Jumlah Sekolah", value: data.jumlah_sekolah },
      { title: "Jumlah Peserta Didik", value: data.jumlah_peserta_didik },
      { title: "Jumlah Rombel", value: data.jumlah_rombel },
      { title: "Jumlah Guru", value: data.jumlah_guru },
    ];

    const container = document.getElementById("statistikRingkasan");
    ringkasan.forEach(item => {
      const el = document.createElement("div");
      el.className = "rounded-xl bg-white shadow p-4";
      el.innerHTML = `<div class="text-sm text-gray-500">${item.title}</div><div class="text-2xl font-bold" style="color:#000 !important">${item.value.toLocaleString("id-ID")}</div>`;
      container.appendChild(el);
    });

    // Chart Sekolah per Status
    new Chart(document.getElementById("chartSekolahStatus"), {
      type: "bar",
      data: {
        labels: data.sekolah_per_status.map(d => d.status_sekolah),
        datasets: [{
          label: "Jumlah Sekolah",
          data: data.sekolah_per_status.map(d => d.jumlah),
          backgroundColor: ["#3b82f6", "#f59e0b"]
        }]
      },
      options: { responsive: true, plugins: { legend: { display: false } } }
    });

    // Chart Kondisi Ruang
    new Chart(document.getElementById("chartRuangKondisi"), {
      type: "pie",
      data: {
        labels: data.ruang_kondisi.map(d => d.kondisi),
        datasets: [{
          data: data.ruang_kondisi.map(d => d.jumlah),
          backgroundColor: ["#10b981", "#facc15", "#f97316", "#ef4444"]
        }]
      },
      options: { responsive: true }
    });

    // Chart Peserta Didik per Jenis Kelamin
    new Chart(document.getElementById("chartJenisKelamin"), {
      type: "doughnut",
      data: {
        labels: data.peserta_didik_per_jenis_kelamin.map(d => d.jenis_kelamin),
        datasets: [{
          data: data.peserta_didik_per_jenis_kelamin.map(d => d.jumlah),
          backgroundColor: ["#3b82f6", "#f472b6"]
        }]
      },
      options: { responsive: true }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const track = document.getElementById('slider-track');
        const slides = document.querySelectorAll('#slider-track .slide');
        const prevBtn = document.getElementById('slider-prev');
        const nextBtn = document.getElementById('slider-next');
        const dotsContainer = document.getElementById('slider-dots');
        let current = 0;

        // Generate dots
        dotsContainer.innerHTML = '';
        slides.forEach((_, i) => {
            const dot = document.createElement('button');
            dot.className = 'w-3 h-3 rounded-full transition bg-white/70 hover:bg-white ' + (i === 0 ? 'opacity-100' : 'opacity-40');
            dot.setAttribute('data-slide', i);
            dotsContainer.appendChild(dot);
        });

        function updateSlider() {
            track.style.transform = `translateX(-${current * 100}%)`;
            dotsContainer.querySelectorAll('button').forEach((dot, i) => {
                dot.classList.toggle('opacity-100', i === current);
                dot.classList.toggle('opacity-40', i !== current);
            });
        }

        prevBtn.onclick = function () {
            current = (current - 1 + slides.length) % slides.length;
            updateSlider();
        };
        nextBtn.onclick = function () {
            current = (current + 1) % slides.length;
            updateSlider();
        };

        // Dots click
        dotsContainer.querySelectorAll('button').forEach((dot, i) => {
            dot.onclick = () => {
                current = i;
                updateSlider();
            };
        });

        // Init
        updateSlider();

        // Optional: Auto-slide
        // setInterval(() => { nextBtn.click(); }, 6000);
    });
</script>
@endpush