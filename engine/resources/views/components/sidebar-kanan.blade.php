<aside class="w-full lg:w-80 flex-shrink-0">
                    <div class="grid grid-cols-3 gap-8 mb-8 text-center">
                        <a href="{{url('post/lakin/')}}" >
                            <img src="{{ asset('lakin.png') }}" alt="Laporan Kinerja" class="mx-auto mb-2" style="height:70px">
                            <div class="text-blue-900 font-medium mt-2">Laporan Kinerja</div>
                        </a>
                        <a href="{{url('post/renstra/')}}" >
                            <img src="{{ asset('renstra.png') }}" alt="Rencana Strategis" class="mx-auto mb-2" style="height:70px">
                            <div class="text-blue-900 font-medium mt-2">Rencana Strategis</div>
                        </a>
                        <a href="{{url('post/perjanjian_kinerja/')}}" >
                            <img src="{{ asset('handshake.png') }}" alt="Perjanjian Kinerja" class="mx-auto mb-2" style="height:70px">
                            <div class="text-blue-900 font-medium mt-2">Perjanjian Kinerja</div>
                        </a>
                    </div>
                    <div class="bg-white rounded-lg p-6 shadow mb-8">
                        <h3 class="text-lg font-bold text-blue-900 mb-4">Visitor</h3>
                        <ul class="space-y-2 text-gray-700">
                            <li><span class="font-semibold">Total Pengunjung:</span> {{ $totalVisitors }}</li>
                            <li><span class="font-semibold">Pengunjung Hari Ini:</span> {{ $todayVisitors }}</li>
                            <li><span class="font-semibold">Pengunjung Bulan Ini:</span> {{ $thismonthVisitors }}</li>
                            <li><span class="font-semibold">Halaman Ini Dilihat:</span> {{ $pageViews }}</li>
                            <li><span class="font-semibold">Pengunjung Online:</span> {{ $onlineVisitors }}</li>
                        </ul>
                    </div>
                    <div class="bg-blue-50 rounded-lg p-6 mb-8">
                        <h3 class="text-lg font-bold text-blue-900 mb-4">{{ucwords($jenis) }} Terbaru</h3>
                        <ul class="space-y-3">
                            @foreach($lasts ?? [] as $item)
                                <li>
                                    <a href="{{ route('post.detail', ['jenis'=>$jenis,'id'=>$item->id,'slug'=>$item->slug]) }}" class="text-blue-700 hover:underline font-medium">
                                        {{ $item->title }}
                                    </a>
                                    <div class="text-xs text-gray-500">{{ $item->tanggal->format('d M Y') }}</div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div class="bg-white rounded-lg p-6 shadow mb-8">
                        <h3 class="text-lg font-bold text-blue-900 mb-4">Tautan Eksternal</h3>
                        <ul class="space-y-2">
                            @foreach ($externalLinks as $item)
                            <li>
                                <a href="{{$item->link}}" target="_blank" class="text-blue-700 hover:underline flex items-center">
                                    <svg class="h-4 w-4 mr-2 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 3h7v7m0 0L10 21l-7-7L17 3z"/>
                                    </svg>
                                    {{$item->title}}
                                </a>
                            </li>
                            @endforeach          
                        </ul>
                    </div>
                    
                </aside>