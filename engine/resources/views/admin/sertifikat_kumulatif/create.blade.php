@extends('admin.main')

@section('content')
    <div class="" style="margin-top:10px;">
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Sertifikat Kumulatif LPMP NTB</h3>
            </div>
            <div class="card-body">
                <!--<h3 align="center">Import Excel File in Laravel</h3>-->
                    <br />
                   @if(count($errors) > 0)
                    <div class="alert alert-danger">
                     Upload Validation Error<br><br>
                     <ul>
                      @foreach($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                     </ul>
                    </div>
                   @endif
                
                   @if($message = Session::get('success'))
                   <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                           <strong>{{ $message }}</strong>
                   </div>
                   @endif
                   <form method="post" enctype="multipart/form-data" action="{{ url('/home/sertifikatKumulatif/import') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                     <table class="table">
                         
                        <tr>
                            <td width="40%" align="right"><label>Pilih Kegiatan</label></td>
                            <td><select name="id_kegiatan" id="id_kegiatan" class="form-control" required>
                                            <option value="">Pilih Kegiatan</option>
                                            <?php if(Auth::user()->name=="admin"){ ?>
                                             @forelse(\App\Models\Kegiatan::all() as $kegiatan)
                                                <option value="{{ $kegiatan->id_kegiatan }}">{{ $kegiatan->nama_kegiatan }}</option>
                                            @empty
                                            @endforelse
                                             <?php }  else{?>
                                            @forelse(\App\Models\Kegiatan::where(['id_seksi' =>Auth::user()->id_seksi])->get() as $kegiatan)
                                           
                                                <option value="{{ $kegiatan->id_kegiatan }}">{{ $kegiatan->nama_kegiatan }}</option>
                                            @empty
                                            @endforelse
                                            <?php } ?>
                            </select>
                            </td>
                        </tr>
                      <tr>
                         
                       
                       <td width="40%" align="right"><label>Upload Data Peserta</label></td>
                       <td width="30">
                        <input type="file" name="select_file" />
                       </td>
                       <td width="30%" align="left">
                        <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                       </td>
                      </tr>
                      <tr>
                       <td width="40%" align="right"></td>
                       <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                       <td width="30%" align="left"></td>
                      </tr>
                     </table>
                    </div>
                   </form>
                   
                   <br />
                   <div class="panel panel-default">
                    <div class="panel-heading">
                     <h3 class="panel-title">Data Sertifikat</h3>
                    </div>
                    <div class="panel-body">
                     <div class="table-responsive">
                      <table id="tb-sertifikat" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No. Sertifikat</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Pola</th>
                                    <th>Nama</th>
                                    <th>Instansi</th>
                                    <th>Kategori</th>
                                    <th>Jenjang Sekolah</th>
                                    <th>Kabupaten/Kota</th>
                                    <th>Status</th>
                                    <th>Link</th>
                                </tr>
                            </thead>
                        <tbody>
                       @foreach($data as $row)
                       <tr>
                            @php
                                $date = DateTime::createFromFormat("Y-m-d",  $row->tanggal_kegiatan);
                                $date1 = DateTime::createFromFormat("Y-m-d",  $row->tanggal_selesai);
                                $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                            @endphp    
                        <td>{{ $row->nomor_sertifikat }}</td>
                        <td>{{ $row->nama_kegiatan }}</td>
                        <td>
                            {{$date->format("d")}} {{$bulan[$date->format("m")-1]}} {{$date->format("Y")}} 
                            <!--{{ $row->tanggal_kegiatan }}-->
                        </td>
                        <td>
                            {{$date1->format("d")}} {{$bulan[$date1->format("m")-1]}} {{$date1->format("Y")}} 
                            <!--{{ $row->tanggal_selesai }}-->
                        </td>
                        <td>{{ $row->pola }}</td>
                        <td>{{ $row->nama_peserta }}</td>
                        <td>{{ $row->instansi_peserta }}</td>
                        <td>{{ $row->kategori_peserta }}</td>
                        <td>{{ $row->jenjang_sekolah }}</td>
                        <td>{{ $row->kabupaten_kota }}</td>
                        <td>{{ $row->status }}</td>
                        <td><a href="{{url('sertifikat_kumulatif')}}/{{ $row->id_kegiatan }}">{{url('sertifikat_kumulatif')}}/{{ $row->id_kegiatan }}</a></td>
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
        $('#tb-sertifikat').DataTable(
            {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    }
            );
    });
    </script>
    @endpush
@endsection
