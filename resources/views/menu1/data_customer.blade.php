@extends('template.main')
@section('topnav', 'Data Customer')

@section('container')

<!-- Table start -->
<div class="col-12 mt-5">
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
                  <th scope="col">Foto</th>
                  <th scope="col">File Path</th>
                  <th scope="col">ID Kelurahan</th>
                  <!-- <th scope="col">ACTION</th> -->
                </tr>
              </thead>
              
              <tbody>
                @foreach( $customer as $cus )
                <tr>
                  <th scope="row" width="20%" text-align="center">{{ $cus->id_customer }}</th>
                  <td>{{ $cus->nama_customer }}</td>
                  <td>{{ $cus->alamat_customer }}</td>
                  <td><img src="{{ $cus->foto }}"></td>
                  <td>{{ $cus->file_path }}</td>
                  <td>{{ $cus->id_kelurahan }}</td>
              <!--     <td>
                    
                    <a href="{{ url( '/EditCustomer/' . $cus->id_customer ) }}" class="badge badge-success">Edit</a>                    
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
<!-- Table end -->

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