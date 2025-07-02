@extends('admin.main')

@section('content')
@push('scripts')
    <script>
    $('body').loadingModal({
          position: 'auto',
          text: 'Membuat Kode QR . . .',
          color: '#fff',
          opacity: '0.7',
          backgroundColor: 'rgb(0,0,0)',
          animation: 'doubleBounce'
        });
        $('body').loadingModal('show');
        </script>
    <div class="" style="margin-top:10px;">
        <div class="card card-default">
            <div class="card-header with-border">
                <h3 class="card-title">Sertifikat</h3>
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
                   <form method="post" enctype="multipart/form-data" action="{{ url('/home/sertifikat/import') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                     <table class="table">
                        <!-- <tr>-->
                        <!--    <td width="40%" align="right"><label>Pilih Kegiatan</label></td>-->
                        <!--    <td>-->
                        <!--        <input name="id_kegiatan" id="id_kegiatan" class="form-control" list="brow" required>-->
                        <!--        <datalist id="brow">-->
                        <!--          <?php if(Auth::user()->name=="admin"){ ?>-->
                        <!--                     @forelse(\App\Models\Kegiatan::all() as $kegiatan)-->
                        <!--                        <option onselec="$('#data').val('{{ $kegiatan->id_kegiatan }}')" value="{{ $kegiatan->id_kegiatan }}">{{ $kegiatan->nama_kegiatan }}</option>-->
                        <!--                    @empty-->
                        <!--                    @endforelse-->
                        <!--                     <?php }  else{?>-->
                        <!--                    @forelse(\App\Models\Kegiatan::where(['id_seksi' =>Auth::user()->id_seksi])->get() as $kegiatan)-->
                                           
                        <!--                        <option onclick="$('#data').val('{{ $kegiatan->id_kegiatan }}')" value="{{ $kegiatan->id_kegiatan }}">{{ $kegiatan->nama_kegiatan }}</option>-->
                        <!--                    @empty-->
                        <!--                    @endforelse-->
                        <!--                    <?php } ?>-->
                        <!--        </datalist>  -->
                        <!--        <input name="data" id="data" type="text"/>-->
                                
                            <!--    <select name="id_kegiatan" id="id_kegiatan" class="form-control" required>-->
                            <!--                <option value="">Pilih Kegiatan</option>-->
                            <!--                <?php if(Auth::user()->name=="admin"){ ?>-->
                            <!--                 @forelse(\App\Models\Kegiatan::all() as $kegiatan)-->
                            <!--                    <option value="{{ $kegiatan->id_kegiatan }}">{{ $kegiatan->nama_kegiatan }}</option>-->
                            <!--                @empty-->
                            <!--                @endforelse-->
                            <!--                 <?php }  else{?>-->
                            <!--                @forelse(\App\Models\Kegiatan::where(['id_seksi' =>Auth::user()->id_seksi])->get() as $kegiatan)-->
                                           
                            <!--                    <option value="{{ $kegiatan->id_kegiatan }}">{{ $kegiatan->nama_kegiatan }}</option>-->
                            <!--                @empty-->
                            <!--                @endforelse-->
                            <!--                <?php } ?>-->
                            <!--</select>-->
                        <!--    </td>-->
                        <!--</tr>-->
                      <tr>
                       <td width="40%" align="right"><label>Select File for Upload</label></td>
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
  <!--                  <button id="bt_qr" class="btn btn-primary">-->
  <!--                      <div class="spinner-border"></div>-->
  <!--                      <div id="buat">Buat Kode QR</div>-->
  <!--                      <div id="loadingQr">-->
  <!--                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>-->
  <!--Loading...-->
  <!--                      </div>-->
  <!--                  </button>-->
                    <!--<div id="loadingQr" class="spinner-border" role="status">-->
                    <!--  <span class="sr-only">Loading...</span>-->
                    <!--</div>-->
                    <div class="panel-body">
                     <div class="table-responsive">
                      <table id="tb-sertifikat" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. Sertifikat</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Pola</th>
                                    <th>Nama</th>
                                    <th>Instansi</th>
                                    <th>Jabatan</th>
                                    <th>Jenjang Sekolah</th>
                                    <th>Kabupaten/Kota</th>
                                    <th>Surel</th>
                                    <th>Jenis Kegiatan</th>
                                    <th>Status</th>
                                    <th>Kode QR</th>
                                </tr>
                            </thead>
                        <tbody>
                        @php $no=0; @endphp
                       @foreach($data as $row)
                       @php $no++ @endphp
                       <tr>
                        <td>{{$no}}</td>
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
                        <td>{{ $row->surel }}</td>
                        <td>{{ $row->jenis_kegiatan }}</td>
                        <td>{{ $row->status }}</td>
                        <td><a href="{{url('images/qrcode-')}}{{ $row->id_sertifikat }}.png">{{url('images/qrcode-')}}{{ $row->id_sertifikat }}.png</a></td>
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
        $("#bt_qr").attr("disabled","true")
        $("#buat").hide();
        $("#loadingQr").show();
        $.get("/home/sertifikat/generate", function(data, status){
            $("#loadingQr").hide();
            $("#buat").show();
            $("#bt_qr").removeAttr("disabled");
            $('body').loadingModal('hide');
          });
    $(function() {
        var table = $('#tb-sertifikat').DataTable( {
                lengthChange: false,
                dom: 'Bfrtip',
                buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print', 'colvis' ]
            } );
         
            table.buttons().container()
                .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    });
    </script>
    @endpush
@endsection
