@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default " style="margin-top:15px;">
                <div class="card-header">
                    <div class="card-actions">
                        <a class="" data-action="collapse"><i class="mdi mdi-minus"></i></a>
                        <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                        <a class="btn btn-primary btn-sm text-white pull-right" href="{{ url('home/konten/berita/create') }}"><i class="mdi mdi-plus"></i> Add Data</a>
                    </div>
                    <h4 class="card-title m-b-0">Berita </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Opsi</th>
                                    
                                    <th>Photo</th> 
                                    <th>Title</th>
                                    <th>Penulis</th>
                                    <th>Viewers</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Status</th> 
                                    <th></th> 
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data_all as $data)
                                    <tr>
                                        <td>
                                            {{-- @if(Auth::user()->name=="admin") --}}
            
                                            <a href="{{ url('home/konten/berita/'.$data->id.'/edit') }}" class="text-inverse p-r-5"
                                                data-toggle="tooltip" 
                                                title="Edit" 
                                                data-original-title="Edit">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                                            </a>
                                            
                                            <a href="{{ url('home/konten/berita/destroy', $data->id) }}" class="text-inverse" 
                                                title="Delete" 
                                                data-toggle="tooltip" 
                                                data-original-title="Delete"
                                                onclick="return confirm('Are You Sure Delete?')"
                                                >
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                            {{-- @endif --}}
                                            <a href="{{url('/')}}/post/berita/{{$data->id}}/{{ $data->slug }}" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{url('/')}}/post/berita-unduh/{{$data->id}}/{{ $data->slug }}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a>
                                            
                                        </td>
                                        
                                        <td><img src="{{ $data->url_images() }}" width="100px"></td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->writer }}</td>
                                        <td>{{ $data->viewer }}</td>
                                        {{-- {{ $berita->Kategori->nama ?? '-' }} --}}
                                        <td>{{ $data->Kategori->title }}</td>
                                        <td>{{ $data->tanggal }}</td>
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
@endsection
