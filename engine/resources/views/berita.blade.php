@extends('admin.main')

@section('content')
<div class="" style="margin-top:10px;">
    <div class="card card-default">
        <div class="card-header with-border">
            <h3 class="card-title">Berita</h3>
        </div>
        <div class="card-body">
            <form action="{{ url('home/berita') }}" method="POST" role="form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card card-default">
                            <div class="card-header with-border">
                                <h3 class="card-title"> </h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Judul</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" required name="title" value="{{ old('title') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="id_kategori" id="id_kategori" class="form-control" required>
                                        <option value="">Pilih Kategori</option>
                                        @forelse(\App\Models\KategoriBerita::all() as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->title }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input type="file" name="thumbnail" onchange="loadFile(this)">
                                    <div>
                                        <img src="" id="pic" style="max-width: 200px;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Konten</label>
                                    <div id="toolbar">
                                        <select class="ql-font">
                                            <option selected></option>
                                            <option value="serif"></option>
                                            <option value="monospace"></option>
                                        </select>
                                        <select class="ql-size">
                                            <option value="small"></option>
                                            <option selected></option>
                                            <option value="large"></option>
                                            <option value="huge"></option>
                                        </select>
                                        <button class="ql-bold"></button>
                                        <button class="ql-italic"></button>
                                        <button class="ql-underline"></button>
                                        <select class="ql-header">
                                            <option value="1"></option>
                                            <option value="2"></option>
                                            <option selected></option>
                                        </select>
                                        <button class="ql-list" value="bullet"></button>
                                        <button class="ql-image"></button>
                                        <button class="ql-video"></button>
                                        <button class="ql-emoji"></button>
                                        <!-- <button id="wrap-left-btn">⬅️ Wrap Left</button>
                                        <button id="wrap-right-btn">➡️ Wrap Right</button> -->
                                    </div>

                                    <div id="editor-container"></div>

                                    <!-- <button id="previewBtn">👁️ Preview</button>
                                    <button id="saveBtn">💾 Simpan Konten</button> -->

                                    <div id="preview-container" style="display: none;">
                                        <h3>Preview Konten:</h3>
                                        <div id="preview-content"></div>
                                    </div>
                                    <!--<textarea class="form-control textarea" required id="textarea" name="content">{{ old('content') }}</textarea>-->
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    {{ Form::select('status', [''=>'Status'] + \App\Models\HelperData::status_publish(), null,['class'=>'form-control js-select', 'required'=>true])}}
                                </div>
                                <div class="form-group">
                                    <label for="">Tags, <span style="font-size:10pt;">Separete with commas</span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        </div>
                                        <input type="text" class="form-control" required name="tags" value="{{ old('tags') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal</label>
                                    <input type="date" class="form-control" required name="tanggal" value="{{ old('tanggal') }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Penulis</label>
                                    <input type="text" class="form-control" required name="writer" value="{{ old('writer') }}">
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </form>


        </div>
    </div>
</div>
@endsection
@section('script')
quillGenerator();
@endsection