@extends('template.main')
@section('topnav', 'Data Input Toko')

@section('container')

<div class="col-12 mt-5">
<div class="card">
  <div class="card-body">
  	<h4 class="header-title">Formulir Tambah Lokasi Toko</h4>
  	<br>
		<form method="post" action="{{ url('/storeToko')}}">
			@csrf

        <div class="form-group">
          <label for="inputNama">Nama</label>
          <input type="text" class="form-control" name ="nama" id="nama" placeholder="Nama Toko" required="">
        </div>


				<div class="form-row">

          <div class="col-md-4 mb-4">
          	<label for="inputLatitude">Latitude</label>
          	<input type="text" class="form-control" name ="latitude" id="latitude" placeholder="Latitude" readonly required="">
        	</div>

	        <div class="col-md-4 mb-4">
	          <label for="inputLongitude">Longitude</label>
						<input type="text" class="form-control" name ="longitude" id="longitude" placeholder="Longitude" readonly required="">
	        </div>
        
	        <div class="col-md-4 mb-4">
	          <label for="inputAccuracy">Accuracy</label>
						<input type="text" class="form-control" name ="accuracy" id="accuracy" placeholder="Accuracy" readonly required="">
					</div>

       	</div>
		
				<!--MODAL-->
				<div class="modal fade" id="modal-maps" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">

							<div class="modal-header">
								<h6 class="modal-title">Lokasi Toko</h6>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<i class="ti-close"></i>
								</button>
							</div>

							<div class="modal-body">
								<div id="modal" style="height: 400px; position: relative; overflow: hidden; border: 1px solid gray;"> </div> 
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
							</div>

						</div>
					</div>
				</div>

        <button  class="btn btn-primary mb-2" type="button" onclick="getlocation();">Geolocation</button> 
				<button type="submit" class="btn btn-outline-success mb-2 ml-1">Submit Data</button>
    </form>
  </div>
</div>
</div>



@endsection

@section('script')

<script src="https://maps.google.com/maps/api/js?sensor=false"></script>  

<script>
var latitude = document.getElementById("latitude");
var longitude = document.getElementById("longitude");
var akurasi = document.getElementById("accuracy");
		function getlocation(){ 
			if(navigator.geolocation){ 
				navigator.geolocation.getCurrentPosition(showLoc, errHand, geoOptions); 
			} 
		} 

		function showLoc(pos){ 
			latt = pos.coords.latitude; 
			long = pos.coords.longitude; 
			var accr = pos.coords.accuracy;
         
			latitude.value = latt;
			longitude.value = long;
			akurasi.value = accr;

			var lattlong = new google.maps.LatLng(latt, long); 
			var optiones = { 
				center: lattlong, 
				zoom: 10, 
				mapTypeControl: true, 
				navigationControlOptions: {style:google.maps.NavigationControlStyle.SMALL} 
			} 
			var mapg = new google.maps.Map(document.getElementById("modal"), optiones); 
			$('#modal-maps').modal('show');
			var marker = new google.maps.Marker({position:lattlong, map:mapg, title:"You are here!"}); 
		} 

		const geoOptions = {
    		enableHighAccuracy: true,
    		maximumAge: 30000,
    		timeout: 27000
		};
		
		function errHand(err) { 
			switch(err.code) { 
				case err.PERMISSION_DENIED: 
					result.innerHTML = "The application doesn't have the permission" + 
							"to make use of location services" 
					break; 
				case err.POSITION_UNAVAILABLE: 
					result.innerHTML = "The location of the device is uncertain" 
					break; 
				case err.TIMEOUT: 
					result.innerHTML = "The request to get user location timed out" 
					break; 
				case err.UNKNOWN_ERROR: 
					result.innerHTML = "Time to fetch location information exceeded"+ 
					"the maximum timeout interval" 
					break; 
			} 
		} 
</script>

@endsection