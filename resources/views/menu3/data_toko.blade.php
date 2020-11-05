@extends('template.main')
@section('topnav', 'Data Toko')

@section('container')

<!-- Table start -->
<div class="col-12 mt-5">
  <div class="card">
    <div class="card-body">
      <h4 class="header-title">Tabel Toko</h4>
        <div class="single-table">
          <div class="table-responsive">
            <table id="dataTablex" class="table table-hover progress-table text-center">
              <thead class="text-uppercase">
                <tr>
                  <th scope="col">Barcode</th>
                  <th scope="col">Nama Toko</th>
                  <th scope="col">Latitude</th>
                  <th scope="col">Longitude</th>
                  <th scope="col">Accuracy</th>
                  <th scope="col">ACTION</th>
                </tr>
              </thead>
              
              <tbody>
                @foreach( $toko as $tk )
                <tr>
                  <th scope="row" width="20%" text-align="center">{{ $tk->barcode }}</th>
                  <td>{{ $tk->nama_toko }}</td>
                  <td>{{ $tk->latitude }}</td>
                  <td>{{ $tk->longitude }}</td>
                  <td>{{ $tk->accuracy }}</td>
                  <td>
                    <a href="{{ url( '/printBarcodeToko/' . $tk->barcode ) }}" class="btn btn-primary btn-xs mb-3" >Print Barcode</a>
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