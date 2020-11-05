@extends('template.main')
@section('topnav', 'Dashboard')

@section('container')
<div class="col-12 mt-5">
    <div class="card">
      <div class="card-body">
        <h4 class="title">Hai Selamat Datang!</h4><br>

        <a href="{{url('/download')}}">
        	<button class="btn btn-outline-info mb-2 ml-1" >Downloadable File</button>
        </a>
        
        </div>
    </div>
</div>
@endsection