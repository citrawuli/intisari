<style type="text/css">
  @page {size: F4 potrait; margin-left: 12.44px; margin-top: 15;}
  body {font-size: 7pt;}
  td { border:0px solid !important; width: 146.9px; height: 64.031496 px; text-align: center; padding-bottom: 2.1; padding-top: 3; padding-left: 2.5;}
  img{text-align: left;}
  tr{margin-top:2mm;}
}

</style>

<body>
  <table width="100%" style="margin-top: 1mm" >
      @php for($i=0;$i<8;$i++){ @endphp
      <tr>
        <td align="center">
          <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($id_barang, 'C128')}}" height="15" width="100" >
          <br>{{$id_barang}}
          @foreach($barang as $b)
          <br>{{$b->nama_barang}}
          @endforeach
        </td>
        <td align="center">
          <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($id_barang, 'C128')}}" height="15" width="100">
          <br>{{$id_barang}}
          @foreach($barang as $b)
          <br>{{$b->nama_barang}}
          @endforeach
        </td>
        <td align="center">
          <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($id_barang, 'C128')}}" height="15" width="100">
          <br>{{$id_barang}}
          @foreach($barang as $b)
          <br>{{$b->nama_barang}}
          @endforeach
        </td>
        <td align="center">
          <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($id_barang, 'C128')}}" height="15" width="100">
          <br>{{$id_barang}}
          @foreach($barang as $b)
          <br>{{$b->nama_barang}}
          @endforeach
        </td>
        <td align="center">
          <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($id_barang, 'C128')}}" height="15" width="100">
          <br>{{$id_barang}}
          @foreach($barang as $b)
          <br>{{$b->nama_barang}}
          @endforeach
        </td>
      </tr>
      @php } @endphp
  </table>
</body>

<!--   <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('11', 'C39')}}" alt="barcode" />
  <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('12', 'C39+')}}" alt="barcode" />
  <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('13', 'C39E')}}" alt="barcode" />
  <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('14', 'C39E+')}}" alt="barcode" />
  <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('15', 'C93')}}" alt="barcode" />
  <br/>
  <br/>
  <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('19', 'S25')}}" alt="barcode" />
  <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('20', 'S25+')}}" alt="barcode" />
  <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('21', 'I25')}}" alt="barcode" />
  <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('22', 'MSI+')}}" alt="barcode" />
  <img src="data:image/png;base64,{{DNS1D::getBarcodePNG('23', 'POSTNET')}}" alt="barcode" />
  <br/>
  <br/>
  <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('16', 'QRCODE')}}" alt="barcode" />
  <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('17', 'PDF417')}}" alt="barcode" />
  <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('18', 'DATAMATRIX')}}" alt="barcode" /> -->

