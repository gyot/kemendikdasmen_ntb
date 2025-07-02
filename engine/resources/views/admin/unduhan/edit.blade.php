@extends('admin.main')

@section('content')
    <div class="">
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Edit Unduhan</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('home/unduhan/update') }}" method="POST" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                     <input type="hidden" required name="id" value="{{ $data->id }}">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card card-default">
                                <div class="card-header with-border">
                                    <h3 class="card-title">Detail</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Judul</label>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                          </div>
                                          <input type="text" class="form-control" required name="title" value="{{ $data->title }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">kategori</label>
                                        <select name="id_kategori" id="id_kategori" class="form-control" required>
                                            <option value="{{ $data->id_kategori }}">{{ $data->Kategori->title }}</option>
                                            @forelse(\App\Models\KategoriUnduhan::all() as $kategori)
                                                <option value="{{ $kategori->id }}">{{ $kategori->title }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gambar</label>
                                        <input type="file" name="thumbnail" id="thumbnail" onchange="loadFile(this)">
                                        <div>
                                            <img src="{{ $data->url_images() }}" id="pic" style="max-width: 200px;">
                                            <input type="hidden" name="hapus" id="hapus" value="no">
                                            <div class="pull-right" onclick="hapus()" style="width:60%;"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">File</label>
                                        <input type="file" name="file" id="file" onchange="loadFile2(this)">
                                        <div>
                                            <a href="{{ $data->url_file() }}">{{ $data->url_file() }}</a>
                                            
                                            <input type="hidden" name="hapus" id="hapus" value="no">
                                            <div class="pull-right" onclick="hapus()" style="width:60%;"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kontent</label>
                                        <textarea class="form-control textarea" required name="content">{{ $data->content }}</textarea>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="">Tags</label>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            
                                          </div>
                                          <input type="text" class="form-control" required name="tags" value="{{ $data->tags }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        {{ Form::select('status', [''=>'Status'] + \App\Models\HelperData::status_publish(), $data->status,['class'=>'form-control js-select', 'required'=>true])}}
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="date" class="form-control" name="tanggal" value="{{ date('Y-m-d', strtotime($data->tanggal)) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Penulis</label>
                                        <input type="text" class="form-control" required name="writer" value="{{ $data->writer }}">
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
