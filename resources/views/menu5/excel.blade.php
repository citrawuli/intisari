@extends('template.main')
@section('topnav', 'Laravel Excel Customer')

@section('container')
<div class="col-md-12"><br>
	{{-- notifikasi form validasi --}}
		@if (count($errors)>0)
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Upload Validation Error! Import was unsuccessfull.</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span class="fa fa-times"></span>
			</button>
			<ul>
				@foreach($errors->all() as $error)
      			<li>{{ $error }}</li>
     			@endforeach
			</ul>
		</div>
		@endif

		@if(session()->has('failures'))
        <table class="table table-danger">
            <tr>
                <th>Row</th>
                <th>Attribute</th>
                <th>Value</th>
                <th>Errors</th>          
            </tr>
            @foreach (session()->get('failures') as $validation)
                <tr>
                    <td>{{ $validation->row() }}</td>
                    <td>{{ $validation->attribute() }}</td>
                    <td>
                        {{ $validation->values()[$validation->attribute()] }}
                    </td>
                    <td>
                        <ul>
                            @foreach ($validation->errors() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </td>   
                </tr>
            @endforeach
        </table>
        @endif

		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif
 
		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $sukses }}</strong>
		</div>
		@endif

	<br>
    <div class="card">
      <center>
        <div class="card-body">
          	<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-4">
                	<div class="custom-file">
					<input type="file" name="file" class="form-control">
					</div>
                </div><br>
                

                <button class="btn btn-success">Import Data Customer</button>
                <!--<a class="btn btn-warning" href="{{ route('export') }}">Export User Customer</a>-->
            </form>

			
        </div>
      </center>
    </div>

    <br>
    <div class="card">
    <div class="card-body">
      <h4 class="header-title">Tabel Customer</h4>
        <div class="single-table">
          <div class="table-responsive">
            <table id="dataTablex" class="table table-hover progress-table text-center">
              <thead class="text-uppercase">
                <tr>
                  <th scope="col">ID Customer</th>
                  <th scope="col">Nama Customer</th>
                  <th scope="col">Alamat Customer</th>
                  <th scope="col">ID Kelurahan</th>
                  <!-- <th scope="col">ACTION</th> -->
                </tr>
              </thead>
              
              <tbody>
                @foreach( $customeer as $cus )
                <tr>
                  <th scope="row" width="20%" text-align="center">{{ $cus->id_customeer }}</th>
                  <td>{{ $cus->nama_customer }}</td>
                  <td>{{ $cus->alamat_customer }}</td>
                  <td>{{ $cus->id_kelurahan }}</td>
              <!--     <td>
                    
                    <a href="{{ url( '/EditCustomer/' . $cus->id_customeer ) }}" class="badge badge-success">Edit</a>                    
                    <a href="#exampleModal" data-toggle="modal" class="badge badge-important">Delete</a>

                  </td> -->
                </tr>
                @endforeach
              </tbody>
            </table>
          
          </div>
        </div>
      </div>
    </div>
    
</div>
@endsection

@section('script')





<!-- Start datatable css -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('backend/css/dataTables.bootstrap4.min.css') }}">
<!--     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">

<script type="text/javascript">
  $(document).ready(function() {
    $('#dataTablex').DataTable( {
       lengthMenu: [[10 , 25 , 50 , -1 ], [10 , 25 , 50 , "All"]]
        
    } );
} );
</script>
@endsection