@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default " style="margin-top:15px;">
                <div class="card-header">
                    <div class="card-actions">
                        <a class="" data-action="collapse"><i class="mdi mdi-minus"></i></a>
                        <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                        <a class="btn btn-primary btn-sm text-white pull-right" href="{{ url("home/kategoriPsrb/create") }}"><i class="mdi mdi-plus"></i> Add Data</a>
                    </div>
                    <h4 class="card-title m-b-0">Kategori PSRB </h4>
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
                                @forelse($data_all as $data)
                                    <tr>
                                        <td>
                                            
                                            <a href="{{ url("home/kategoriPsrb/".$data->id."/edit") }}" class="text-inverse p-r-5"
                                                data-toggle="tooltip" 
                                                title="Edit" 
                                                data-original-title="Edit">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            
                                            <a href="{{ url("home/kategoriPsrb/destroy", $data->id) }}" class="text-inverse" 
                                                title="Delete" 
                                                data-toggle="tooltip" 
                                                data-original-title="Delete"
                                                onclick="return confirm('Are You Sure Delete?')"
                                                >
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                            
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
