@extends('admin.main')

@section('content')
<div class="container">
    <h3>Manajemen Slider</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Link</label>
            <input type="url" name="link" class="form-control">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active">Aktif</option>
                <option value="inactive">Nonaktif</option>
            </select>
        </div>
        <button class="btn btn-primary">Tambah Slider</button>
    </form>

    <hr>

    <h4>Reorder Slider</h4>
    <ul id="slider-list" class="list-group">
        @foreach ($sliders as $slider)
            <li class="list-group-item" data-id="{{ $slider->id }}">
                <strong>{{ $slider->title ?? '(Tanpa Judul)' }}</strong> | Order: {{ $slider->order }}
            </li>
        @endforeach
    </ul>
</div>
@endsection

@push('scripts')
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
</script>
@endpush