@extends('admin.main')

@section('content')
<div class="container mx-auto px-4 mt-6">
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200 bg-gray-50">
            <h2 class="text-xl font-semibold text-gray-800 capitalize">{{ $jenis }}</h2>
            <a href="{{ url('home/konten/'.$jenis.'/create') }}"
               class="flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-md hover:bg-blue-700 transition">
                <i class="fa fa-plus mr-2"></i> Tambah Data
            </a>
        </div>

        <div class="p-6">
            <div class="flex flex-col gap-6">
                @forelse($data_all as $data)
                    <div class="flex flex-col md:flex-row bg-white border border-blue-400 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition w-full md:h-56">
                        <div class="md:w-1/3 w-full flex-shrink-0 h-48 md:h-full">
                            <img src="{{ asset('upload/'.$jenis.'/thm-'.$data->images) }}"
                                 alt="{{ $data->title }}"
                                 class="w-full h-full object-cover object-center border border-blue-400">
                        </div>
                        <div class="md:w-2/3 w-full p-6 flex flex-col justify-between h-48 md:h-full">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $data->title }}</h3>
                                <p class="text-sm text-gray-600">✍️ Penulis: {{ $data->writer }}</p>
                                <p class="text-sm text-gray-600">👁️ Viewers: {{ $data->viewer }}</p>
                                <p class="text-sm text-gray-600">🏷️ Kategori: {{ $data->Kategori->title ?? '-' }}</p>
                                <p class="text-sm text-gray-600">🗓️ Tanggal: {{ $data->tanggal }}</p>
                                <p class="text-sm text-gray-600">📌 Status: {{ $data->status_text() }}</p>
                            </div>
                            <div class="mt-4 flex flex-wrap gap-2">
                                <a href="{{ url('home/konten/'.$jenis.'/'.$data->id.'/edit') }}"
                                   class="flex items-center px-3 py-1.5 border border-blue-600 text-blue-600 text-sm rounded-md hover:bg-blue-50 transition">
                                    <i class="fa fa-pencil mr-1"></i> Edit
                                </a>
                                <form action="{{ route('konten.destroy', ['jenis' => $jenis, 'id' => $data->id]) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="flex items-center px-3 py-1.5 border border-red-600 text-red-600 text-sm rounded-md hover:bg-red-50 transition">
                                        <i class="fa fa-trash mr-1"></i> Hapus
                                    </button>
                                </form>
                                <a href="{{ url('post/'.$jenis.'/'.$data->id.'/'.$data->slug) }}" target="_blank"
                                   class="flex items-center px-3 py-1.5 border border-gray-400 text-gray-700 text-sm rounded-md hover:bg-gray-50 transition">
                                    <i class="fa fa-eye mr-1"></i> Lihat
                                </a>
                                <a href="{{ url('post/'.$jenis.'-unduh/'.$data->id.'/'.$data->slug) }}" target="_blank"
                                   class="flex items-center px-3 py-1.5 border border-green-600 text-green-600 text-sm rounded-md hover:bg-green-50 transition">
                                    <i class="fa fa-download mr-1"></i> Unduh
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-gray-500 py-8 w-full">
                        Tidak ada data tersedia.
                    </div>
                @endforelse
            </div>

            <div class="mt-8">
                {{ $data_all->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
