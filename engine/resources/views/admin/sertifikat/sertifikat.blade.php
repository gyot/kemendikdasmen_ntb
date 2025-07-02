@extends('layouts.front')
@section('content')
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb bg-transparent pl-0 mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">ZI-WBK</li>
        </ol>
    </div>
</nav>
<section class="banner_page" width="100%">
    <div class="container" >
        <h1>Sertifikat</h1>
        <!--<div class="row">-->
        <!--    <div class="col-md-7">-->
        <!--        <img data-toggle="modal" data-target=".bd-example-modal-lg" src="{{asset('assets/images/zi-wbk/struk.jpeg')}}" style="width:100%" >-->
        <!--    </div>-->
        <!--    <div class="col-md-5">-->
    		  <!--      <h2>6 Pengungkit ZI-WBK</h2>-->
    
        <!--            <ol style="font-size:18px">-->
        <!--              <li><a class="btn btn-link" href="{{ url('zi1') }}">1. Manajemen Perubahan</a></li>-->
        <!--              <li><a class="btn btn-link" href="{{ url('zi2') }}">2. Penataan Tata Laksana</a></li>-->
        <!--              <li><a class="btn btn-link" href="{{ url('zi3') }}">3. Penataan Sistem Manajemen SDM</a></li>-->
        <!--              <li><a class="btn btn-link" href="{{ url('zi4') }}">4. Penguatan Akuntabilitas</a></li>-->
        <!--              <li><a class="btn btn-link" href="{{ url('zi5') }}">5. Penguatan Pengawasan</a></li>-->
        <!--              <li><a class="btn btn-link" href="{{ url('zi6') }}">6. Peningkatan Kualitas Pelayanan Publik</a></li>-->
        <!--            </ol> -->
    		  <!--  </div>-->
        <!--</div>-->
         
    </div>
</section>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        
        <!--<img data-toggle="modal" data-target=".bd-example-modal-lg" src="../lpmpntb/resources/views/front/struk.jpeg" style="width:100%" >-->
    </div>
  </div>
</div>

<section>
	<div class="container">
		<div class="row">
		    <div class="pb-5 col-md-8">
		        <h3 align="center">Import Excel File in Laravel</h3>
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
                   <form method="post" enctype="multipart/form-data" action="{{ url('/sertifikat/import') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                     <table class="table">
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
                     <h3 class="panel-title">Customer Data</h3>
                    </div>
                    <div class="panel-body">
                     <div class="table-responsive">
                      <table class="table table-bordered table-striped">
                       <tr>
                        <th>Customer Name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Postal Code</th>
                        <th>Country</th>
                       </tr>
                       @foreach($data as $row)
                       <tr>
                        <td>{{ $row->CustomerName }}</td>
                        <td>{{ $row->Gender }}</td>
                        <td>{{ $row->Address }}</td>
                        <td>{{ $row->City }}</td>
                        <td>{{ $row->PostalCode }}</td>
                        <td>{{ $row->Country }}</td>
                       </tr>
                       @endforeach
                      </table>
                     </div>
                    </div>
                   </div>
    		</div>
    		<div class="col-md-4">
                @include('layouts/widget_biasa')
                    

            </div>
		</div>
	</div>
</section>
@endsection
