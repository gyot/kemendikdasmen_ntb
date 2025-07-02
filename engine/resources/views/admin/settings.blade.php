@extends('admin.main')

@section('content')
    <div class="" style="margin-top:10px;">
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Settings</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('home/settings') }}" method="POST" role="form" enctype="multipart/form-data">
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
                                        <label for="">Logo</label>
                                        <input type="file" name="logo" onchange="loadFile(this)">
                                        <div>
                                            <img src="{{ $data[0]->url_logo() }}" id="pic" style="max-width: 200px;">
                                            <input type="hidden" name="hapus" id="hapus" value="no">
                                            <div class="pull-right" onclick="hapus()" style="width:60%;"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Favicon</label>
                                        <input type="file" name="favicon" onchange="loadFile1(this)">
                                        <div>
                                            <img src="{{ $data[0]->url_favicon() }}" id="pic1" style="max-width: 200px;">
                                            <input type="hidden" name="hapus" id="hapus" value="no">
                                            <div class="pull-right" onclick="hapus()" style="width:60%;"><i class="fa fa-trash" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Footer</label>
                                        <input type="text" class="form-control" required name="footer" value="{{ $data[0]->footer }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Facebook</label>
                                        <input type="text" class="form-control" required name="facebook" value="{{ $data[0]->facebook }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Twitter</label>
                                        <input type="text" class="form-control" required name="twitter" value="{{ $data[0]->twitter }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Instagram</label>
                                        <input type="text" class="form-control" required name="instagram" value="{{ $data[0]->instagram }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Youtube</label>
                                        <input type="text" class="form-control" required name="youtube" value="{{ $data[0]->youtube }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Whatsapp</label>
                                        <input type="text" class="form-control" required name="whatsapp" value="{{ $data[0]->whatsapp }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <input type="text" class="form-control" required name="alamat" value="{{ $data[0]->alamat }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" class="form-control" required name="phone" value="{{ $data[0]->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">HP</label>
                                        <input type="text" class="form-control" required name="hp" value="{{ $data[0]->hp }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control" required name="email" value="{{ $data[0]->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Map</label>
                                        <input type="text" class="form-control" required name="map" value="{{ $data[0]->map }}">
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
@endsection
