@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default " style="margin-top:15px;">
                <div class="card-header">
                    <div class="card-actions">
                        <a class="" data-action="collapse"><i class="mdi mdi-minus"></i></a>
                        <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                        <a class="btn btn-primary btn-sm text-white pull-right" href="{{ route('kategori.create',['jenis'=>$jenis]) }}"><i class="mdi mdi-plus"></i> Add Data</a>
                    </div>
                    <h4 class="card-title m-b-0">Kategori Berita </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Opsi</th>
                                    
                                    <th>Name</th>
                                    <th>Status</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($kategori as $data)
                                    <tr>
                                        <td>
                                            
                                            <a href="{{ route('kategori.edit', [ 'id' => $data->id, 'jenis' => $jenis]) }}" class="text-inverse p-r-5"
                                                data-toggle="tooltip" 
                                                title="Edit" 
                                                data-original-title="Edit">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                                {{-- <i class="fa fa-pencil-square-o" aria-hidden="true"></i> --}}
                                            </a>
                                            
                                            <form action="{{ route('kategori.destroy', [ 'id' => $data->id, 'jenis' => $jenis]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger p-0" title="Delete">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                            
                                        </td>
                                        
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
                        
                </div>
            </div>
        </div>
    </div>
@endsection
