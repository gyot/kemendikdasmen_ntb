@extends('admin.main')

@section('content')
<div class="container py-5">
    <div class="card">
        <div class="card-header bg-white border-bottom">
            <h3 class="mb-0">Edit Berita</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('konten.update', ['jenis'=>$jenis, 'id'=>$id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="hidden" name="id" value="{{ $data->id }}">

                <div class="row">
                    <!-- Kolom 1 -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Judul</label>
                            <input type="text" class="form-control" name="title" required value="{{ $data->title }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Kategori</label>
                            <select name="id_kategori" class="form-select" required>
                                <option value="{{ $data->id_kategori }}">{{ $data->Kategori->title }}</option>
                                @foreach(\App\Models\KategoriBerita::all() as $kategori)
                                    @if($kategori->id != $data->id_kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Gambar</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="form-control" onchange="previewImage(event)">
                            <div class="mt-2 d-flex align-items-center gap-2">
                                <img src="{{ $data->url_images() }}" id="pic" style="max-width: 120px;" class="img-thumbnail">
                                <input type="hidden" name="hapus" id="hapus" value="no">
                                <button type="button" onclick="hapus()" class="btn btn-outline-danger btn-sm" title="Hapus Gambar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">File</label>
                            <input type="file" name="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip" class="form-control">
                            <small class="form-text text-muted">Opsional, jika ada file yang ingin dilampirkan.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tags</label>
                            <input type="text" class="form-control" name="tags" required value="{{ $data->tags }}">
                        </div>
                    </div>

                    <!-- Kolom 2 -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Status</label>
                            {!! Form::select('status', [''=>'Status'] + \App\Models\HelperData::status_publish(), $data->status, ['class'=>'form-select', 'required'=>true]) !!}
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" value="{{ date('Y-m-d', strtotime($data->tanggal)) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Penulis</label>
                            <input type="text" class="form-control" name="writer" required value="{{ $data->writer }}">
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
                    </div>
                    <div id="konten" name="konten" class="border rounded p-2" style="min-height: 120px;"></div>
                    <textarea id="content" name="content" hidden>{{ $data->content }}</textarea>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary px-5 py-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function hapus() {
        document.getElementById('pic').src = '';
        document.getElementById('thumbnail').value = '';
        document.getElementById('hapus').value = 'yes';
    }

    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('pic');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection

@section('script')
<script>
    quillGenerator();
    let content = document.getElementById('content').value;
    quill.root.innerHTML = content;
</script>
@endsection
