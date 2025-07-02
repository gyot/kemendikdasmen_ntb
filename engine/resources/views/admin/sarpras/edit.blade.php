@extends('admin.main')

@section('content')
    <div class="">
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Edit Sarana Prasarana</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('home/sarpras/update') }}" method="POST" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                     <input type="hidden" required name="id" value="{{ $data->id }}">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card card-default">
                                <div class="card-header with-border">
                                    <h3 class="card-title">Sarana</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                          </div>
                                          <input type="text" class="form-control" required name="title" value="{{ $data->title }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Foto</label>
                                        <input type="file" name="thumbnail" id="thumbnail" onchange="loadFile(this)">
                                        <div>
                                            <img src="{{ $data->url_images() }}" id="pic" style="max-width: 200px;">
                                            <input type="hidden" name="hapus" id="hapus" value="no">
                                            <div class="pull-right" onclick="hapus()" style="width:60%;"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kontent</label>
                                        <textarea class="form-control textarea" required name="content">{{ $data->content }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Satuan</label>
                                        {{ Form::select('satuan', [''=>'Satuan'] + \App\Models\HelperData::satuan(), $data->status,['class'=>'form-control js-select', 'required'=>true])}}
                                    </div>
                                    <div class="form-group">
                                        <label for="">Harga</label>
                                        <input type="text" class="form-control" name="harga" value="{{ $data->harga }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        {{ Form::select('status', [''=>'Status'] + \App\Models\HelperData::status_publish(), $data->status,['class'=>'form-control js-select', 'required'=>true])}}
                                    </div>
                                    
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </form>
                
                    
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function hapus() {
            $('#pic').attr('src','');
            $('#thumbnail').val('');
            $('#hapus').val('yes');
        }
    </script>
@endsection
