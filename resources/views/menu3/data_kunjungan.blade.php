@extends('template.main')
@section('topnav', 'Data Kunjungan Salesman')

@section('container')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <center>
        <div class="card-body">
          <h4 class="card-title">Geolocation</h4>
          <div>
            <button type="button" class="btn btn-primary btn-xs mb-3" id="startButton">Start</button>
            <button type="button" class="btn btn-outline-danger btn-xs mb-3" id="resetButton">Reset</button>
          </div>
                
          <div>
            <br><video id="video" width="300" height="200" style="border: 1px solid gray"></video>
          </div>
               
          <div id="sourceSelectPanel" style="display:none">
            <label for="sourceSelect">Change video source:</label>
            <select id="sourceSelect" style="max-width:400px"></select>

          </div>

          <pre><code id="result" type="hidden"></code></pre>
          <p><a href="https://github.com/zxing-js/library/tree/master/docs/examples/multi-camera/"></a></p>
        </div>
      </center>
    </div>
  </div>

  <div class="col-xl-6 col-lg-12">
    <br>
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Lokasi Toko</h6>
                                    
        <div class="form-group">
          <label for="latitude">Latitude :</label>
          <input name="latitudetoko" id="latitudetoko" readonly class="form-control"></input>
        </div>
          
        <div class="form-group">
          <label for="longitude">Longitude :</label>
          <input name="longitudetoko" id="longitudetoko" readonly class="form-control"></input>
        </div>
          
        <div class="form-group">
          <label for="accuracy">Accuracy :</label>
          <input name="accuraccytoko"id="accuraccytoko" readonly class="form-control"></input>
        </div>

      </div>
    </div>
  </div>
  
  <div class="col-xl-6 col-lg-12">
    <br>
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Lokasi Sales</h6>

        <div class="form-group">
          <label for="latitude">Latitude :</label>
          <input name="latitudesales" id="latitudesales" readonly class="form-control"></input>
        </div>

        <div class="form-group">
          <label for="longitude">Longitude :</label>
          <input name="longitudesales" id="longitudesales" readonly class="form-control"></input>
        </div>

        <div class="form-group">
          <label for="accuracy">Accuracy :</label>
          <input name="accuraccysales"id="accuraccysales" readonly class="form-control"></input>
        </div>

      </div>
    </div>
  </div>

</div>
@endsection

  
@section('script')

  <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
  <script type="text/javascript">

    var latitudetoko;
    var longitudetoko;
    var accuraccytoko;

    var latitudesales;
    var longitudesales;
    var accuraccysales;

    var ress;
    var jarak;

        
    window.addEventListener('load', function () {
      getlocation();

      let selectedDeviceId;
      const codeReader = new ZXing.BrowserMultiFormatReader()
      console.log('ZXing code reader initialized')
      codeReader.listVideoInputDevices()
        .then((videoInputDevices) => {
          const sourceSelect = document.getElementById('sourceSelect')
          selectedDeviceId = videoInputDevices[0].deviceId
          if (videoInputDevices.length >= 1) {
            videoInputDevices.forEach((element) => {
              const sourceOption = document.createElement('option')
              sourceOption.text = element.label
              sourceOption.value = element.deviceId
              sourceSelect.appendChild(sourceOption)
            })

            sourceSelect.onchange = () => {
              selectedDeviceId = sourceSelect.value;
            };

            const sourceSelectPanel = document.getElementById('sourceSelectPanel')
            sourceSelectPanel.style.display = 'block'
          }

          document.getElementById('startButton').addEventListener('click', () => {
            codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
              if (result) {
                console.log(result)
                document.getElementById('result').textContent = result.text;
                ress = document.getElementById('result').textContent = result.text;
                databarcode();
        
              }
              if (err && !(err instanceof ZXing.NotFoundException)) {
                console.error(err)
                document.getElementById('result').textContent = err

              }
            })
            console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
          })

          document.getElementById('resetButton').addEventListener('click', () => {
            codeReader.reset()
            document.getElementById('result').textContent = '';
            console.log('Reset.')
          })

        })
        .catch((err) => {
          console.error(err)
        })
    })

    function databarcode(){
      console.log('barcode');
      console.log(ress);
      jQuery.ajax({
        url : 'getBarcode/' +ress,
        type : "GET",
        dataType : "json",
        success:function(data){
          jQuery.each(data, function(key,value){
            document.getElementById('latitudetoko').value =value.latitude;
            document.getElementById('longitudetoko').value =value.longitude;
            document.getElementById('accuraccytoko').value =value.accuracy;
            latitudetoko=value.latitude;
            longitudetoko=value.longitude;
            accuraccytoko=value.accuracy;

            jarak = getDistanceFromLatLonInKm(latitudetoko,longitudetoko,latitudesales,longitudesales);
            console.log('nilai Latt Toko');
            console.log(latitudetoko);
            console.log('nilai Long Toko');
            console.log(longitudetoko);
            console.log('nilai Latt Sales');
            console.log(latitudesales);
            console.log('nilai Long Sales');
            console.log(longitudesales);
            console.log('nilai jarak');
            console.log(jarak);
            var totalAccr = accuraccytoko + accuraccysales;
            console.log('nilai total Accr');
            console.log(totalAccr);
            ratakurasi = totalAccr/2;
            console.log('nilai rata akurasi');
            console.log(ratakurasi);
            if(jarak<=ratakurasi){
              alert('lokasi diterima');
            }
            else{
              alert('lokasi ditolak');
            }
          });
        }
      });
    }

    var latitudesk = document.getElementById("latitudesales");
    var longitudesk = document.getElementById("longitudesales");
    var akurasisk = document.getElementById("accuraccysales");
    var ratakurasi;
       
        
    function getlocation(){ 
		  if(navigator.geolocation){ 
			 navigator.geolocation.getCurrentPosition(showLoc, errHand, {enableHighAccuracy: true}); 
		  } 
	  } 

	  function showLoc(pos){ 
      latt = pos.coords.latitude; 
      long = pos.coords.longitude; 
      var accr = pos.coords.accuracy; 

      console.log(latt);
      console.log(long);
      console.log(accr);
  		latitudesk.value = latt;
  		longitudesk.value = long
  		akurasisk.value = accr;
      latitudesales = latt;
      longitudesales = long;
      accuraccysales = accr;
  	} 

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
      
    function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
      var R = 6371; // Radius of the earth in km
      var dLat = deg2rad(lat2-lat1); // deg2rad below
      var dLon = deg2rad(lon2-lon1);
      var a =
      Math.sin(dLat/2) * Math.sin(dLat/2) +
      Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
      Math.sin(dLon/2) * Math.sin(dLon/2);

      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
      var d = R * c * 1000; // Distance in m
      return d;
    }
        
    function deg2rad(deg) {
      return deg * (Math.PI/180)
    }

  </script>
@endsection