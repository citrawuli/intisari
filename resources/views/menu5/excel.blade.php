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
</div>
@endsection