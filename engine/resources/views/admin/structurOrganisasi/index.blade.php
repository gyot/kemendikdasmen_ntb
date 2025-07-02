@extends('admin.main')

@section('content')
    <div class="" style="margin-top:10px;">
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Structure Organisasi</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('home/structure') }}" method="POST" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card card-default">
                                <div class="card-header with-border">
                                    <h3 class="card-title"> </h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" class="form-control" required name="title" value="{{ $data[0]->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gambar</label>
                                        <input type="file" name="thumbnail" id="thumbnail" onchange="loadFile(this)">
                                        <div>
                                            <img src="{{ $data[0]->url_images() }}" id="pic" style="max-width: 200px;">
                                            <input type="hidden" name="hapus" id="hapus" value="no">
                                            <div class="pull-right" onclick="hapus()" style="width:60%;"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kontent</label>
                                        <textarea class="form-control textarea" required name="content">{{ $data[0]->content }}</textarea>
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
