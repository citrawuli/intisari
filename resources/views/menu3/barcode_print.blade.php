<center style="margin-top: 50px">
	<h4>{{$barcode}}</h4>
	<img src="data:image/png;base64,{{DNS2D::getBarcodePNG($barcode, 'QRCODE', 10, 10)}}" alt="barcode">
</center>
