@extends('admin.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default " style="margin-top:15px;">
                <div class="card-header">
                    <div class="card-actions">
                        <a class="" data-action="collapse"><i class="mdi mdi-minus"></i></a>
                        <a class="btn-minimize" data-action="expand"><i class="mdi mdi-arrow-expand"></i></a>
                        <a class="btn btn-primary btn-sm text-white pull-right" href="{{ url('home/kliping/create') }}"><i class="mdi mdi-plus"></i> Add Data</a>
                    </div>
                    <h4 class="card-title m-b-0">Kliping </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Opsi</th>
                                    <th>Photo</th> 
                                    <th>Title</th>
                                    <th>Sumber</th>
                                    <th>Viewers</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Status</th> 
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($data_all as $data)
                                    <tr>
                                        <td>
            
                                            <a href="{{ url('home/kliping/'.$data->id.'/edit') }}" class="text-inverse p-r-5"
                                                data-toggle="tooltip" 
                                                title="Edit" 
                                                data-original-title="Edit">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </a>
                                            
                                            <a href="{{ url('home/kliping/destroy', $data->id) }}" class="text-inverse" 
                                                title="Delete" 
                                                data-toggle="tooltip" 
                                                data-original-title="Delete"
                                                onclick="return confirm('Are You Sure Delete?')"
                                                >
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                            <!--<a href="{{url('/')}}/kliping/{{$data->id}}/{{ $data->slug }}" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i><i class="fa fa-eye" aria-hidden="true"></i></a>-->
                                            <a href="{{url('/')}}/upload/kliping/{{$data->file_kliping}}" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                            
                                            
                                            <a id="downloadButton" href="javascript:void(0)" onclick="dnld('{{url('/')}}/upload/kliping/{{$data->file_kliping}}','{{ $data->title }}')"><i class="fa fa-download" aria-hidden="true"></i></a>
                                            
                                        </td>
                                        
                                        <td><img src="{{asset('upload/kliping')}}/{{ $data->images }}" width="100px"></td>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->writer }}</td>
                                        <td>{{ $data->viewer }}</td>
                                        <td>{{ $data->kategori }}</td>
                                        <td>{{ $data->tanggal }}</td>
                                        <td>{{ $data->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8"></td>
                                </tr>
                            </tfoot>
                        </table>
                        <button id='downloadBtn'>Download</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script>
html2canvas($('#content')[0], {
                    onrendered: function(canvas) {
                        var imgData = canvas.toDataURL('image/png');
                        var pdf = new jsPDF();
                        pdf.addImage(imgData, 'PNG', 0, 0);
                        pdf.save('downloaded_page.pdf');
                    }
                });
</script>
@endsection
