@extends('admin.main')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-6">
    <h3 class="text-2xl font-bold mb-6">Manajemen Slider</h3>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium mb-1">Judul</label>
            <input type="text" name="title" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
        </div>
        <div>
            <label for="image" class="block text-sm font-medium mb-1">Gambar</label>
            <input type="file" name="image" id="image" class="block w-full text-sm text-gray-700 border border-gray-300 rounded file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            <small class="text-gray-500 block mt-1">Biarkan kosong jika tidak ingin mengganti gambar.</small>

            <div class="mt-3 hidden" id="preview-container">
                <p class="font-semibold">Preview</p>
                <img id="preview-image" class="rounded border border-gray-200 w-48">
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Link</label>
            <input type="url" name="link" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Deskripsi</label>
            <textarea name="description" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500"></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Status</label>
            <select name="status" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                <option value="active">Aktif</option>
                <option value="inactive">Nonaktif</option>
            </select>
        </div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Tambah Slider</button>
    </form>

    <hr class="my-8 border-gray-300">

    <h4 class="text-xl font-semibold mb-4">Reorder Slider</h4>
    <ul id="slider-list" class="space-y-4">
        @foreach ($sliders as $slider)
            <li class="flex items-center gap-4 p-4 border border-gray-300 rounded bg-white shadow-sm" data-id="{{ $slider->id }}">
                <img src="{{ asset('upload/sliders/' . $slider->image) }}" alt="slider" class="w-20 h-12 object-cover rounded">
                <div class="flex-1">
                    <p class="font-semibold">{{ $slider->title ?? '(Tanpa Judul)' }}</p>
                    <p class="text-sm text-gray-600">{{ $slider->description }}</p>
                    <p class="text-sm text-gray-600">Link: <a href="{{ $slider->link }}" class="text-blue-500 hover:underline" target="_blank">{{ $slider->link }}</a></p>
                    <p class="text-sm text-gray-600">Status: {{ $slider->status }} | Order: {{ $slider->order }}</p>
                    <div class="flex gap-2 mt-2">
                        <a href="{{ route('sliders.edit', $slider->id) }}" class="text-blue-600 hover:text-blue-800" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="text-red-600 hover:text-red-800" title="Hapus">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

<script>
$(function () {
    $('#slider-list').sortable({
        update: function (event, ui) {
            let order = [];
            $('#slider-list li').each(function () {
                order.push($(this).data('id'));
            });

            $.ajax({
                url: "{{ route('sliders.reorder') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    order: order
                },
                success: function (res) {
                    location.reload();
                }
            });
        }
    });
});

document.getElementById('image').addEventListener('change', function (event) {
    const input = event.target;
    const preview = document.getElementById('preview-image');
    const previewContainer = document.getElementById('preview-container');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            previewContainer.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '';
        previewContainer.classList.add('hidden');
    }
});
</script>
@endsection
