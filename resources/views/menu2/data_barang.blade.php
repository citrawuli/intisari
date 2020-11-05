@extends('template.main')
@section('topnav', 'Data Barang')

@section('container')

<!-- Table start -->
<div class="col-12 mt-5">
  <div class="card">
    <div class="card-body">
      <h4 class="header-title">Tabel Barang</h4>
        <div class="single-table">
          <div class="table-responsive">
            <table id="dataTablex" class="table table-hover progress-table text-center">
              <thead class="text-uppercase">
                <tr>
                  <th scope="col">ID Barang</th>
                  <th scope="col">Nama Barang</th>
                  <th scope="col">Timestamp</th>
                  <th scope="col">ACTION</th>
                </tr>
              </thead>
              
              <tbody>
                @foreach( $barang as $bar )
                <tr>
                  <th scope="row" width="20%" text-align="center">{{ $bar->id_barang }}</th>
                  <td>{{ $bar->nama_barang }}</td>
                  <td>{{ $bar->timestamp }}</td>
                  <td>
                    <a href="{{ url( '/printBarcode/' . $bar->id_barang ) }}" class="btn btn-primary btn-xs mb-3" >Print Barcode</a>
               <!--      <a href="#" class="text-secondary"><i class="fa fa-edit"></i></a>
                    <a href="#" class="text-danger"><i class="ti-trash"></i></a> -->
                   <!--  <a href="#exampleModal" data-toggle="modal" class="badge badge-important">Delete</a> -->

                  </td>
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