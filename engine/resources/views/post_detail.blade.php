@extends('main')
@if (isset($viewName) && $viewName == 'list')
    @section('title', 'Daftar ' . strtoupper($jenis))
    @section('meta_description', 'Lihat daftar ' . strtolower($jenis) . ' terbaru.')
    @section('meta_keywords', strtolower($jenis) . ', daftar, berita, artikel')
    @section('meta_author', 'BPMP NTB')

    @section('og_title', 'Daftar ' . strtoupper($jenis))
    @section('og_description', 'Lihat daftar ' . strtolower($jenis) . ' terbaru.')
    @section('og_image', asset('upload/settings/' . $setting->logo ?? 'default.jpg'))

    @section('twitter_title', 'Daftar ' . strtoupper($jenis))
    @section('twitter_description', 'Lihat daftar ' . strtolower($jenis) . ' terbaru.')
    @section('twitter_image', asset('upload/settings/' . $setting->logo ?? 'default.jpg'))
    
@else
    @section('title', strtoupper($data->title))
    @section('meta_description', $data->teaser())
    @section('meta_keywords', $data->tags)
    @section('meta_author', $data->writer)

    @section('og_title', strtoupper($data->title))
    @section('og_description', $data->teaser())
    @section('og_image', asset('upload/'.$jenis.'/'.$data->images ?? 'default.jpg'))

    @section('twitter_title', strtoupper($data->title))
    @section('twitter_description', $data->teaser())
    @section('twitter_image', asset('upload/'.$jenis.'/'.$data->images ?? 'default.jpg'))
    
@endif
@section('title', 'Statistik Pengunjung')
@section('meta_description', 'Lihat statistik pengunjung dan total tampilan halaman secara real-time.')
@section('meta_keywords', 'pengunjung, statistik, visitor, analytics')
@section('meta_author', 'BPMP NTB')

@section('og_title', 'Statistik Pengunjung')
@section('og_description', 'Pantau jumlah pengunjung website secara langsung.')
@section('og_image', asset('images/stats-preview.jpg'))

@section('twitter_title', 'Statistik Pengunjung')
@section('twitter_description', 'Analisa lalu lintas web Anda dengan data real-time.')
@section('twitter_image', asset('images/stats-preview.jpg'))
@section('content')

    <section class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <div id="imgModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-70 hidden">
                    <div class="relative">
                        <button id="closeImgModal" class="absolute top-2 right-2 bg-white rounded-full p-1 shadow hover:bg-gray-200">
                            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                        <img id="modalImg" src="" alt="Preview" class="max-h-[80vh] max-w-[90vw] rounded shadow-lg bg-white">
                    </div>
                </div>
                <!-- Artikel Utama -->
                <div class="max-w-9xl mx-auto flex-1">
                @if($viewName == 'list')
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ strtoupper($jenis) }}</h1>
                    @foreach ($data as $item)
                    <div class="bg-gray-50 rounded-xl overflow-hidden shadow-sm hover:shadow-md transition duration-300 flex flex-col md:flex-row gap-0 mb-8">
                        <div class="md:w-1/3 w-full flex-shrink-0">
                            <div class="h-48 md:h-56 w-full overflow-hidden">
                                <img src="{{asset('upload/'.$jenis.'/thm-'.$item->images)}}" alt="{{$item->title}}" class="w-full h-full object-cover object-center">
                            </div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col justify-center">
                            <div class="text-sm text-gray-500 mb-2">{{$item->writer}} | {{date('d M Y', strtotime($item->tanggal));}}</div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{$item->title}}</h3>
                            <p class="text-gray-600 mb-4">{{$item->teaser()}}</p>
                            <a href="{{url('post/'.$jenis.'/'.$item->id.'/'.$item->slug)}}" class="text-blue-600 font-medium hover:text-blue-800">Baca selengkapnya</a>
                        </div>
                    </div>
                        
                    @endforeach
                    {{ $data->links() }}
                    
                    {{-- {{count($data)}} --}}
                    @if(count($data)==0)
                    <h6 class="text-1xl text-gray-800 mb-4">Tidak ada data</h6>  
                    @endempty

                @elseif($viewName == 'detail')
                    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $data->title }}</h1>
                    <div class="text-sm text-gray-500 mb-4">{{ $data->writer }} | {{ $data->tanggal->format('d F Y') }}</div>
                    <img src="{{ $data->url_images() }}" alt="{{ $data->title }}" class="w-full h-auto rounded-lg mb-6">
                    <div class="prose prose-lg text-gray-700">
                        {!! $data->content !!}
                    </div>
                    @if (isset($data->file) && $data->file != '-' && $data->file != '')
                        <div class="mt-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-2">File Terkait</h3>
                            <a href="{{ asset('upload/'.$jenis.'/'.$data->file) }}" class="text-blue-600 hover:underline" target="_blank">
                                <i class="fas fa-file-download mr-2"></i> Download {{ $data->file }}
                            </a>
                        </div>
                        
                    @endif
                @endif
                </div>
                <!-- Sidebar Kanan -->
                @include('components.sidebar-kanan', ['jenis' => $jenis, 'lasts' => $lasts ?? []])
        </div>
        </div>
    </section>

    {{-- @elseif($viewName == 'detail')
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
    @endif --}}
@endsection
@push('scripts')    
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

    // Modal logic
    const imgModal = document.getElementById('imgModal');
    const modalImg = document.getElementById('modalImg');
    const closeImgModal = document.getElementById('closeImgModal');

    document.querySelectorAll('p img').forEach(img => {
        img.style.cursor = 'zoom-in';
        img.addEventListener('click', function(e) {
            modalImg.src = img.src;
            imgModal.classList.remove('hidden');
        });
    });

    closeImgModal.addEventListener('click', function() {
        imgModal.classList.add('hidden');
        modalImg.src = '';
    });

    // Optional: close modal on background click
    imgModal.addEventListener('click', function(e) {
        if (e.target === imgModal) {
            imgModal.classList.add('hidden');
            modalImg.src = '';
        }
    });
</script>
@endpush
@section('style')
@endsection