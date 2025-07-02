@extends('admin.main')

@section('content')
    <div class="" style="margin-top:10px;">
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">slider</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('home/slider') }}" method="POST" role="form" enctype="multipart/form-data">
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
                                        <label for="">Url</label>
                                        <div class="input-group mb-3">
                                        <input type="text" class="form-control" required name="url" value="{{ old('url') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Urutan</label>
                                        <div class="input-group mb-3">
                                        <input type="text" class="form-control" required name="order" value="{{ old('order') }}">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">Gambar</label>
                                        <input type="file" name="thumbnail" onchange="loadFile(this)">
                                        <div>
                                            <img src="" id="pic" style="max-width: 200px;">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        {{ Form::select('status', [''=>'Status'] + \App\Models\HelperData::status_publish(), null,['class'=>'form-control js-select', 'required'=>true])}}
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="date" class="form-control" required name="tanggal" value="{{ old('tanggal') }}">
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
