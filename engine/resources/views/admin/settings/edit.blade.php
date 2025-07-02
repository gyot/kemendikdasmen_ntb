@extends('admin.main')

@section('content')
<div class="container">
    <h3>Manajemen Slider</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('sliders.update', $sliders->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $sliders->title) }}">
            
        </div>
        <div class="mb-3">
            <label class="form-label">Gambar Saat Ini</label><br>
            <img id="current-image" src="{{ asset('upload/sliders/' . $sliders->image) }}" alt="Slider Image" class="img-thumbnail" width="200">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Ganti Gambar (Opsional)</label>
            <input type="file" name="image" id="image" class="form-control">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>

            <div class="mt-3" id="preview-container" style="display: none;">
                <p><strong>Preview Gambar Baru:</strong></p>
                <img id="preview-image" class="img-thumbnail" width="200">
            </div>
        </div>

        <div class="mb-3">
            <label>Link</label>
            <input type="url" name="link" class="form-control" value="{{ old('link', $sliders->link) }}">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control">{{old('description', $sliders->description)}}</textarea>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ old('status', $sliders->status) === 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="inactive" {{ old('status', $sliders->status) === 'inactive' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('sliders.index') }}" class="btn btn-secondary">Batal</a>
    </form>

    <hr>

    <h4>Reorder Slider</h4>
<ul id="slider-list" class="list-group">
    @foreach ($slider as $slider)
        <li class="list-group-item d-flex align-items-center gap-3" data-id="{{ $slider->id }}">
            <img src="{{ asset('upload/sliders/' . $slider->image) }}" alt="slider" width="80" height="50" style="object-fit: cover; border-radius: 4px;">
            <div>
                <strong>{{ $slider->title ?? '(Tanpa Judul)' }}</strong><br>
                <small>{{ $slider->description }}</small><br>
                <small>Link: <a href="{{ $slider->link }}" target="_blank">{{ $slider->link }}</a></small><br>
                <small>Status: {{ $slider->status }}</small>
                <small>Order: {{ $slider->order }}</small> 
                <small>
                    <a href="{{ route('sliders.edit', $slider->id) }}" class="text-primary me-2" title="Edit">
                        <i class="fas fa-edit"></i>
                    </a>
                </small>
                <small>
                    <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" style="background: none; border: none; padding: 0; color: red;" title="Hapus">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </small>

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
                previewContainer.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '';
            previewContainer.style.display = 'none';
        }
    });
</script>
@endsection