@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default " style="margin-top:15px;">
                <div class="card-header">
                    <div class="card-actions">
                        <a class="" data-action="collapse"><i class="mdi mdi-minus"></i></a>
                        <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                        <a class="btn btn-primary btn-sm text-white pull-right" data-toggle="modal" data-target="#modal-add-gallery"><i class="mdi mdi-plus"></i> Upload Gambar</a>
                    </div>
                    <h4 class="card-title m-b-0">Gallery : {{ $dataa->title }} </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Opsi</th>
                                    <th>Gambar</th> 
                                    <th>Title</th>                                    
                                    <th>Status</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data_all as $data)
                                    <tr>
                                        <td>
                                            
                                            <a href="{{ url('home/gallery/delgambar', $data->id) }}" class="text-inverse" 
                                                title="Delete" 
                                                data-toggle="tooltip" 
                                                data-original-title="Delete"
                                                onclick="return confirm('Are You Sure Delete?')"
                                                >
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                            
                                        </td>
                                        
                                        <td><img src="{{ $data->url_images() }}" width="100px"></td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->status_text() }}</td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    {{ $data_all->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-add-gallery" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <form action="{{ url('home/gallery/upload') }}" method="POST" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default">Add New Gallery</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control" id="id" name="id" type="hidden" value="{{ $dataa->id }}">
                        <div class="form-group mb-3">
                            <label class="form-control-label" for="exampleFormControlInput1">Judul</label>
                            <div class="input-group input-group-merge input-group-alternative">
                                <input class="form-control" name="title" placeholder="Name" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Status</label>
                            {{ Form::select('status', [''=>'Status'] + \App\Models\HelperData::status_publish(), null,['class'=>'form-control js-select', 'required'=>true])}}
                        </div>
                        <div class="form-group">
                            <label for="">Gambar</label>
                            <input type="file" name="thumbnail[]" onchange="loadFile(this)" multiple>
                            <div>
                                <img src="" id="pic" style="max-width: 200px;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="saveNewServer" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
