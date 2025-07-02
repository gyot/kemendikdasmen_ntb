@extends('admin.main')

@section('content')
    <div class="" style="margin-top:10px;">
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Berita</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('home/sarpras') }}" method="POST" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card card-default">
                                <div class="card-header with-border">
                                    <h3 class="card-title"> </h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <div class="input-group mb-3">
                                        <input type="text" class="form-control" required name="title" value="{{ old('title') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Foto</label>
                                        <input type="file" name="thumbnail" onchange="loadFile(this)">
                                        <div>
                                            <img src="" id="pic" style="max-width: 200px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Penjelasan</label>
                                        <textarea class="form-control textarea" required name="content">{{ old('content') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Satuan</label>
                                        {{ Form::select('satuan', [''=>'Satuan'] + \App\Models\HelperData::satuan(), null,['class'=>'form-control js-select', 'required'=>true])}}
                                    </div>
                                    <div class="form-group">
                                        <label for="">harga</label>
                                        <input type="text" class="form-control" required name="harga" value="{{ old('harga') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        {{ Form::select('status', [''=>'Status'] + \App\Models\HelperData::status_publish(), null,['class'=>'form-control js-select', 'required'=>true])}}
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
