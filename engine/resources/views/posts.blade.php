@extends('main')
@section('content')
    @if($viewName == 'list')
    <!-- Daftar Artikel/Berita -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Artikel & Berita</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Kumpulan artikel dan berita terbaru seputar pemerintahan, layanan publik, dan informasi penting lainnya.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Artikel Card 1 -->
                <div class="bg-gray-50 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <img src="artikel1.jpg" alt="Judul Artikel 1" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">20 Juni 2025</div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Digitalisasi Layanan Publik di Era Modern</h3>
                        <p class="text-gray-600 mb-4">Transformasi digital dalam layanan publik membawa kemudahan dan transparansi bagi masyarakat.</p>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Baca selengkapnya</a>
                    </div>
                </div>
                <!-- Artikel Card 2 -->
                <div class="bg-gray-50 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <img src="artikel2.jpg" alt="Judul Artikel 2" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">18 Juni 2025</div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Peningkatan Infrastruktur Wilayah</h3>
                        <p class="text-gray-600 mb-4">Pemerintah daerah terus berupaya meningkatkan infrastruktur untuk mendukung pertumbuhan ekonomi.</p>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Baca selengkapnya</a>
                    </div>
                </div>
                <!-- Artikel Card 3 -->
                <div class="bg-gray-50 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <img src="artikel3.jpg" alt="Judul Artikel 3" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-gray-500 mb-2">15 Juni 2025</div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Program Beasiswa untuk Siswa Berprestasi</h3>
                        <p class="text-gray-600 mb-4">Dukungan pendidikan bagi siswa berprestasi melalui program beasiswa daerah.</p>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-800">Baca selengkapnya</a>
                    </div>
                </div>
                <!-- Tambahkan artikel/berita lain sesuai kebutuhan -->
            </div>
        </div>
    </section>
    @elseif($viewName == 'detail')
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Artikel Utama -->
                <div class="max-w-2xl mx-auto flex-1">
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $data->title }}</h1>
                    <div class="text-sm text-gray-500 mb-4">{{ $data->tanggal->format('d F Y') }}</div>
                    <img src="{{ $data->url_images() }}" alt="{{ $data->title }}" class="w-full h-auto rounded-lg mb-6">
                    <div class="prose prose-lg text-gray-700">
                        {!! $data->content !!}
                    </div>
                </div>
                <!-- Sidebar Kanan -->
                <aside class="w-full lg:w-80 flex-shrink-0">
                    <div class="grid grid-cols-3 gap-8 mb-8 text-center">
                        <div>
                            <img src="{{ asset('lakin.png') }}" alt="Laporan Kinerja" class="mx-auto mb-2" style="height:70px">
                            <div class="text-blue-900 font-medium mt-2">Laporan Kinerja</div>
                        </div>
                        <div>
                            <img src="{{ asset('renstra.png') }}" alt="Rencana Strategis" class="mx-auto mb-2" style="height:70px">
                            <div class="text-blue-900 font-medium mt-2">Rencana Strategis</div>
                        </div>
                        <div>
                            <img src="{{ asset('handshake.png') }}" alt="Perjanjian Kinerja" class="mx-auto mb-2" style="height:70px">
                            <div class="text-blue-900 font-medium mt-2">Perjanjian Kinerja</div>
                        </div>
                    </div>

                    <div class="bg-blue-50 rounded-lg p-6 mb-8">
                        <h3 class="text-lg font-bold text-blue-900 mb-4">{{$jenis}} Terbaru</h3>
                        <ul class="space-y-3">
                            @foreach($lasts ?? [] as $item)
                                <li>
                                    <a href="{{ route('post.detail', ['jenis'=>$jenis,'id'=>$item->id,'slug'=>$item->slug]) }}" class="text-blue-700 hover:underline font-medium">
                                        {{ $item->title }}dsds
                                    </a>
                                    <div class="text-xs text-gray-500">{{ $item->tanggal->format('d M Y') }}</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="bg-white rounded-lg p-6 shadow mb-8">
                        <h3 class="text-lg font-bold text-blue-900 mb-4">Tautan Eksternal</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="https://kemendagri.go.id" target="_blank" class="text-blue-700 hover:underline flex items-center">
                                    <svg class="h-4 w-4 mr-2 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 3h7v7m0 0L10 21l-7-7L17 3z"/>
                                    </svg>
                                    Kemendagri
                                </a>
                            </li>
                            <li>
                                <a href="https://bpmpntb.kemdikbud.go.id" target="_blank" class="text-blue-700 hover:underline flex items-center">
                                    <svg class="h-4 w-4 mr-2 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 3h7v7m0 0L10 21l-7-7L17 3z"/>
                                    </svg>
                                    BPMP NTB
                                </a>
                            </li>
                            <li>
                                <a href="https://www.lapor.go.id" target="_blank" class="text-blue-700 hover:underline flex items-center">
                                    <svg class="h-4 w-4 mr-2 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 3h7v7m0 0L10 21l-7-7L17 3z"/>
                                    </svg>
                                    Lapor!
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="bg-white rounded-lg p-6 shadow">
                        <h3 class="text-lg font-bold text-blue-900 mb-4">Info Lainnya</h3>
                        <ul class="space-y-2 text-gray-700">
                            <li><span class="font-semibold">Cuaca:</span> Cerah, 29°C</li>
                            <li><span class="font-semibold">Jam Layanan:</span> 08.00 - 16.00 WIB</li>
                            <li><span class="font-semibold">Hotline:</span> (021) 1234-5678</li>
                        </ul>
                    </div>
            </aside>
        </div>
        </div>
    </section>
    @endif
@endsection
@section('script')    
    <script>
        // Mobile menu toggle
        document.getElementById('menuToggle').addEventListener('click', function () {
            const navMenu = document.getElementById('navMenu');
            navMenu.classList.toggle('hidden');
        });
        window.addEventListener('resize', function () {
            const navMenu = document.getElementById('navMenu');
            if (window.innerWidth >= 768) {
                navMenu.classList.remove('hidden');
            } else {
                navMenu.classList.add('hidden');
            }
        });

        document.querySelectorAll('p img').forEach(img => {
            // Kalau belum dibungkus
            if (!img.closest('a')) {
                const link = document.createElement('a');
                link.href = img.src;
                link.target = '_blank';
                link.appendChild(img.cloneNode(true));
                img.replaceWith(link);
            }
        });
    </script>
@endsection
@section('style')
@endsection