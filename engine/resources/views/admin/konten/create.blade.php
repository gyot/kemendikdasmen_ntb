@extends('admin.main')

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header bg-white border-bottom">
            <h3 class="mb-0">Tambah {{ucwords($jenis)}}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('konten.store', ['jenis' => $jenis]) }}" method="POST" enctype="multipart/form-data">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <!-- Kolom 1 -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold">Judul</label>
                            <input type="text" class="form-control" required id="title" name="title" value="{{ old('title') }}">
                        </div>

                        <div class="mb-3">
                            <label for="id_kategori" class="form-label fw-semibold">Kategori</label>
                            <select name="id_kategori" id="id_kategori" class="form-select" required>
                                <option value="">Pilih Kategori</option>
                                @forelse($kategori as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->title }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Gambar</label>
                            <input type="file" name="thumbnail" class="form-control" onchange="previewImage(event)">
                            <div class="mt-2">
                                <img src="" id="pic" class="img-thumbnail" style="max-width: 200px;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">File</label>
                            <input type="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip" class="form-control">
                            <small class="form-text text-muted">Opsional, jika ada file yang ingin dilampirkan.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tags <span class="text-muted">(pisahkan dengan koma)</span></label>
                            <input type="text" class="form-control" name="tags" value="{{ old('tags') }}" required>
                        </div>
                    </div>

                    <!-- Kolom 2 -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Penulis</label>
                            <input type="text" class="form-control" name="writer" value="{{ old('writer') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Status</label>
                            {!! Form::select('status', [''=>'Status'] + \App\Models\HelperData::status_publish(), null, ['class'=>'form-select', 'required'=>true]) !!}
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Konten</label>
                    <div id="toolbar" class="mb-2">
                        <select class="ql-font"></select>
                        <select class="ql-size"></select>
                        <button class="ql-bold"></button>
                        <button class="ql-italic"></button>
                        <button class="ql-underline"></button>
                        <select class="ql-header">
                            <option value="1"></option>
                            <option value="2"></option>
                            <option selected></option>
                        </select>
                        <button class="ql-link"></button>
                        <button class="ql-list" value="bullet"></button>
                        <button class="ql-image"></button>
                        <button class="ql-video"></button>
                        <button class="ql-emoji"></button>
                        <button id="insert-table" type="button"><i class="fas fa-table"></i></button>
                    </div>
                    <div id="konten" name="konten" class="border rounded p-2" style="min-height:300px">{{ old('content') }}</div>
                    <textarea id="content" name="content" hidden></textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-5 py-2">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = function(){
        const output = document.getElementById('pic');
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

quillGenerator();
</script>
@endsection
