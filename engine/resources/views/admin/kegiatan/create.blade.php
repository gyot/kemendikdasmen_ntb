@extends('admin.main')

@section('content')
    <div class="" style="margin-top:10px;">
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Kegiatan</h3>
            </div>
            <div class="card-body">
                {{-- <form action="{{ url('home/gallery') }}" method="POST" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card card-default">
                                <div class="card-header with-border">
                                    <h3 class="card-title"> </h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" required name="title" value="{{ old('title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Sample Gambar</label>
                                        <input type="file" name="thumbnail" onchange="loadFile(this)">
                                        <div>
                                            <img src="" id="pic" style="max-width: 200px;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        {{ Form::select('status', [''=>'Status'] + \App\Models\HelperData::status_publish(), null,['class'=>'form-control js-select', 'required'=>true])}}
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </form> --}}
<div class="container">
<h3>Data Kegiatan LPMP NTB</h3>
{{-- @if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
   
{{-- @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
<div class="row">
    <div class="col-md-4">
        <strong>Original Image:</strong>
        <br/>
        <img src="/images/{{ Session::get('imageName') }}" />
    </div>
    <div class="col-md-4">
        <strong>Thumbnail Image:</strong>
        <br/>
        <img src="/thumbnail/{{ Session::get('imageName') }}" />
    </div>
</div>
@endif --}}
<div class="row">
    @if(isset($id))
    <div class="col-md-4">
        {!! Form::open(array('route' => 'kegiatan.update','enctype' => 'multipart/form-data')) !!}
        <div class="row">
            <div class="col-md-12">
                <br/>
                {!! Form::hidden('id', $id, array('required')) !!}
                <label>Nama Kegiatan</label>
                {!! Form::text('nama_kegiatan', $data->nama_kegiatan,array('class' => 'form-control','placeholder'=>'Masukkan nama kegiatan','required')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br/>
                <label>Tanggal Mulai</label>
                {!! Form::date('tanggal_mulai', $data->tanggal_mulai,array('class' => 'form-control','placeholder'=>'Masukkan tanggal mulai','required')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br/>
                <label>Tanggal Selesai</label>
                {!! Form::date('tanggal_selesai', $data->tanggal_selesai,array('class' => 'form-control','placeholder'=>'Masukkan tanggal selesai','required')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br/>
                {!! Form::hidden('id', $id, array('required')) !!}
                <label>Pola Kegiatan</label>
                {!! Form::text('pola', $data->pola,array('class' => 'form-control','placeholder'=>'Masukkan pola kegiatan','required')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br/>
                <label>Link Pendaftaran</label>
                {!! Form::text('link', $data->link,array('class' => 'form-control','placeholder'=>'Masukkan link','required')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br/>
                <label>Status Kegiatan</label>
                {!! Form::select('status', ['Aktif' => 'Aktif', 'Non Aktif' => 'Non Aktif', 'Disembunyikan' => 'Disembunyikan'], $data->status, ['class' => 'form-control','required']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br/>
                <label>Gambar</label>
                {!! Form::file('gambar', array('class' => 'form-control','onchange'=>'loadFile(this)')) !!}
                <div>
                    <img src="{{ asset('thumbnail')}}/{{ $data->img }}" id="pic" style="max-width: 200px;">
                    <input type="hidden" name="hapus" id="hapus" value="no">
                    <div class="pull-right" onclick="hapus()" style="width:60%;"><i class="fa fa-trash" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br/>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
{!! Form::close() !!}
    </div>
    @else
    <div class="col-md-4">
        {!! Form::open(array('route' => 'kegiatanPost','enctype' => 'multipart/form-data')) !!}
        <div class="row">
            <div class="col-md-12">
                <br/>
                <label>Nama Kegiatan</label>
                {!! Form::text('nama_kegiatan', null,array('class' => 'form-control','placeholder'=>'Masukkan nama kegiatan')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br/>
                <label>Tanggal Mulai</label>
                {!! Form::date('tanggal_mulai', null,array('class' => 'form-control','placeholder'=>'Masukkan tanggal mulai')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br/>
                <label>Tanggal Selesai</label>
                {!! Form::date('tanggal_selesai', null,array('class' => 'form-control','placeholder'=>'Masukkan tanggal selesai')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br/>
                <label>Pola Kegiatan</label>
                {!! Form::text('pola', null,array('class' => 'form-control','placeholder'=>'Masukkan pola kegiatan .. JP')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br/>
                <label>Link Pendaftaran</label>
                {!! Form::text('link', null,array('class' => 'form-control','placeholder'=>'Masukkan link')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br/>
                <label>Status Kegiatan</label>
                {!! Form::select('status', ['Aktif' => 'Aktif', 'Non Aktif' => 'Non Aktif', 'Disembunyikan' => 'Disembunyikan'], null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br/>
                <label>Gambar</label>
                {!! Form::file('gambar', array('class' => 'form-control','onchange'=>'loadFile(this)')) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br/>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
{!! Form::close() !!}
    </div>
    @endif
    <div class="col-md-8">
        <table id="tb-kegiatan" class="table table-hover table-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th></th>
                    <th>Tema</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no=0 @endphp
                @foreach ($data_all as $data)
                @php $no++ @endphp
                <tr>
                    <td>{{$no}}</td>
                    <td>
                        <a href="{{ asset('images/')}}/{{$data->img }}">
                            <img src="{{ asset('thumbnail/')}}/{{$data->img }}" alt="" srcset="">
                        </a>
                    </td>
                    <td>{{$data->nama_kegiatan}}</td>
                    <td>{{$data->tanggal_mulai}}</td>
                    <td>{{$data->status}}</td>
                    <td>
                        <a href="{{url('/home/kegiatan/')}}/{{$data->id_kegiatan}}/edit"><i class="btn btn-warning text-white" >edit</i> </a>
                       
                        <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini??')" href="{{url('/home/kegiatan/destroy')}}/{{$data->id_kegiatan}}"><i class="btn btn-danger text-white">hapus</i></a>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
                    
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        $(function() {
            $('#tb-kegiatan').DataTable(
        //         {
        //     dom: 'Bfrtip',
        //     buttons: [
        //         'copy', 'csv', 'excel', 'pdf', 'print'
        //     ]
        // }
                );
        });
    </script>
    @endpush
@endsection
