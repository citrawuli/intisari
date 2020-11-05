@extends('template.main')
@section('topnav', 'Tambah Customer File Name')

@section('container')

<!-- Konten start -->

<head>
 
</head>

  <div class="col-12 mt-5">
    <div class="card">
      <div class="card-body">
        <h4 class="header-title">Formulir Tambah Customer</h4>
        <form method="POST" action="{{ url('/storeCustomerFileName')}}">
          @csrf

<!-- nama
alamat
provinsi
kota
kecamatan
kodepos -kelurahan
foto      ambil foto
Simpan Data -->

          <div class="form-group ">
            <label for="inputNama">Nama Lengkap</label>
            <input type="text" class="form-control " id="inputNama" maxlength="50"  required="" name="nama" placeholder="Masukkan nama lengkap">
          </div>

          <div class="form-group">
            <label for="inputAlamat">Alamat</label>
            <input type="text" class="form-control " id="inputAlamat" maxlength="50" required=""  name="alamat" placeholder="Masukkan alamat">
            <small id="alamatHelp" class="form-text text-muted">Contoh : Jl. Dharmawangsa Barat No.55</small>
          </div>

          <div class="form-group">
            <label for="id_provinsi">Provinsi</label>
            <div class="">
              <select class="form-control " id="id_provinsi" required=""  name="id_provinsi" >
              <option disabled selected="">Pilih Provinsi</option>
              @foreach($provinsi as $prov)
              <option value="{{ $prov->id_provinsi }}">{{$prov->nama_provinsi}}</option>
              @endforeach
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="id_kota">Kabupaten/Kota</label>
            <div class="">
              <select class="form-control " id="id_kota" required=""  name="id_kota" onchange="">
              <option disabled selected="">Pilih Kota</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="id_kecamatan">Kecamatan</label>
            <div class="">
              <select class="form-control " id="id_kecamatan"  name="id_kecamatan" >
              <option disabled selected="">Pilih Kecamatan</option>
              <!-- @foreach($kecamatan as $kec)
              <option value="{{ $kec->id_kecamatan }}">{{$kec->nama_kecamatan}}</option>
              @endforeach -->
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="id_kelurahan">Kode Pos - Kelurahan</label>
            <div class="">
              <select class="form-control " id="id_kelurahan"  name="id_kelurahan" >
              <option disabled selected="">Pilih Kode Pos - Kelurahan</option>
              <!-- @foreach($kelurahan as $kel)
              <option value="{{ $kel->kodepos }} - {{ $kel->id_kelurahan }}">{{ $kel->kodepos }} - {{$kel->nama_kelurahan }}</option>
              @endforeach -->
              </select>
            </div>
          </div>


          <div class="">
            <video autoplay="true" id="video-webcam" width="300">Izinkan untuk Mengakses Webcam untuk Demo</video><br>
            <canvas id="canvas"></canvas><br>
            <img src="" id="img"><br>
            <input type="" hidden="" id="foto" name="foto">
            <button id="snap">Ambil Gambar</button>
          </div> 

          <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Simpan Data</button>
        </form>
      </div>
    </div>
  </div>


<!-- Konten end -->

@endsection


@section('script')

<script>
  $(document).ready(function() {
      $('#id_provinsi').on('change', function(){
      let prov = $(this).val();
      $('#id_kota').empty();
      $('#id_kota').append('<option value="null" selected="disabled"> -- Processing --</option>');
      var url = "{{URL('/getKota')}}";
      var dltUrl = url+"/"+prov;
          $.ajax({
              type:'GET',
              url:dltUrl,
              // url:'/getKota/'+prov,
              success:function(response){
                var response = JSON.parse(response);
                console.log(response);
                $('#id_kota').empty();
                $('#id_kota').append('<option value="null" selected="selected">Pilih Kota</option>');
                response.forEach(element=>{
                  $('#id_kota').append(`<option value="${element['id_kota']}"> ${element['nama_kota']}</option>`);
                });
              }
          });
      });
  });
</script>  
 
<script>
  $(document).ready(function() {
      $('#id_kota').on('change', function(){
      let kota = $(this).val();
      $('#id_kecamatan').empty();
      $('#id_kecamatan').append('<option value="null" selected="disabled"> -- Processing --</option>');
      var url = "{{URL('/getKecamatan')}}";
      var dltUrl = url+"/"+kota;
          $.ajax({
              type:'GET',
              url:dltUrl,
              // url:'/getKecamatan/'+kota,
              success:function(response){
                var response = JSON.parse(response);
                console.log(response);
                $('#id_kecamatan').empty();
                $('#id_kecamatan').append('<option value="null" selected="selected">Pilih Kecamatan</option>');
                response.forEach(element=>{
                  $('#id_kecamatan').append(`<option value="${element['id_kecamatan']}"> ${element['nama_kecamatan']}</option>`);
                });
              }
          });
      });
  });
</script> 


<script>
  $(document).ready(function() {
      $('#id_kecamatan').on('change', function(){
      let kec = $(this).val();
      $('#id_kelurahan').empty();
      $('#id_kelurahan').append('<option value="null" selected="disabled"> -- Processing --</option>');
      var url = "{{URL('/getKelurahan')}}";
      var dltUrl = url+"/"+kec;
          $.ajax({
              type:'GET',
              url:dltUrl,
              // url:'/getKelurahan/'+kec,
              success:function(response){
                var response = JSON.parse(response);
                console.log(response);
                $('#id_kelurahan').empty();
                $('#id_kelurahan').append('<option value="null" selected="selected">Pilih Kelurahan</option>');
                response.forEach(element=>{
                  $('#id_kelurahan').append(`<option value="${element['id_kelurahan']}"> ${element['kodepos']} - ${element['nama_kelurahan']}</option>`);
                });
              }
          });
      });
  });
</script> 




<!-- <script>
  $(document).ready(function() {
      $('#id_provinsi').on('change', function(){
      let prov = $(this).val();
      $('#id_kota').empty();
      $('#id_kota').append('<option value="null" selected="disabled"> -- Processing --</option>');
          $.ajax({
              type:'GET',
              url:'/getKota/'+prov,
              success:function(response){
                var response = JSON.parse(response);
                console.log(response);
                $('#id_kota').empty();
                $('#id_kota').append('<option value="null" selected="selected">Pilih Kota</option>');
                response.forEach(element=>{
                  $('#id_kota').append(`<option value="${element['id_kota']}"> ${element['nama_kota']}</option>`);
                });
              }
          });
      });
  });
</script>  
 
<script>
  $(document).ready(function() {
      $('#id_kota').on('change', function(){
      let kota = $(this).val();
      $('#id_kecamatan').empty();
      $('#id_kecamatan').append('<option value="null" selected="disabled"> -- Processing --</option>');
          $.ajax({
              type:'GET',
              url:'/getKecamatan/'+kota,
              success:function(response){
                var response = JSON.parse(response);
                console.log(response);
                $('#id_kecamatan').empty();
                $('#id_kecamatan').append('<option value="null" selected="selected">Pilih Kecamatan</option>');
                response.forEach(element=>{
                  $('#id_kecamatan').append(`<option value="${element['id_kecamatan']}"> ${element['nama_kecamatan']}</option>`);
                });
              }
          });
      });
  });
</script> 


<script>
  $(document).ready(function() {
      $('#id_kecamatan').on('change', function(){
      let kec = $(this).val();
      $('#id_kelurahan').empty();
      $('#id_kelurahan').append('<option value="null" selected="disabled"> -- Processing --</option>');
          $.ajax({
              type:'GET',
              url:'/getKelurahan/'+kec,
              success:function(response){
                var response = JSON.parse(response);
                console.log(response);
                $('#id_kelurahan').empty();
                $('#id_kelurahan').append('<option value="null" selected="selected">Pilih Kelurahan</option>');
                response.forEach(element=>{
                  $('#id_kelurahan').append(`<option value="${element['id_kelurahan']}"> ${element['kodepos']} - ${element['nama_kelurahan']}</option>`);
                });
              }
          });
      });
  });
</script>  -->





<!-- <script type"text/javascript">
  $('#inputProvinsi').on('change', function(e){
      console.log(e);
      
</script>
 -->

        




  <script>
    var video = document.querySelector("#video-webcam");

    navigator.mediaDevices.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

    if (navigator.mediaDevices.getUserMedia) {
        navigator.getUserMedia({ video: true }, handleVideo, videoError);
    }

    function handleVideo(stream) {
        video.srcObject=stream;
        video.play();
        console.log(stream);
    }

    function videoError(e) {
        // do something
        alert("Izinkan menggunakan webcam untuk demo!")
    }

    function takeSnapshot() {
        var img = document.getElementById('img');
        var context;
        var width = video.offsetWidth
                , height = video.offsetHeight;

        canvas = document.getElementById('canvas');
        canvas.width = width;
        canvas.height = height;

        context = canvas.getContext('2d');
        context.drawImage(video, 0, 0, width, height);

        var foto= canvas.toDataURL('image/png');
        img.src = foto;
        $('#foto').val(foto);
        $('#canvas').hide();

    }

    $('#snap').click(function(e){
      e.preventDefault();
      takeSnapshot();
    })

  </script> 




@endsection