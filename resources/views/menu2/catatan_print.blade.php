<style type="text/css">
  img{
    padding-left: 2px;
  }
  font{
    font-size: xx-small;
  }
  .Row {
    display: table;
    width: 100%; /*Optional*/
    table-layout: auto; /*Optional*/
    border-spacing: 2mm;
    margin-top:2mm /*Optional*/
}
.Column {
    display: table-cell;
    width:100px;
    white-space: nowrap;
}
.Column1 {
    display: table-cell;
    max-width: 50px;
}
.col {
    display: table-cell;
}

.grid-container {
  display: grid;
  grid-template-columns: repeat(5, 143.6px);
  grid-template-rows: repeat(8, 68px);
  gap: 6px 7px;
  grid-template-areas:
    ". . . . ."
    ". . . . ."
    ". . . . ."
    ". . . . ."
    ". . . . ."
    ". . . . ."
    ". . . . ."
    ". . . . .";
  }
</style>



@php
for ($x = 1; $x <= 8; $x++) { @endphp
<div class="Row">

    <div class="Column" style="margin-left: 37 px">
      <div class="coba" style="height: 68.031496px; width:143.622047244px;"> 
        <img src="data:image/png;base64,{!! \DNS2D::getBarcodePNG($id_barang, 'QRCODE')!!}" style="height: 37.795276px; width:37.795276px"alt="barcode"/>
        <div class="coba1" style="margin-top: 1px; margin-right:37.795276px;">
          <font size="xx-small"><strong>{{$id_barang}}</strong></font>
        </div>
        <div class="coba2" style="margin-top:2px; margin-right:45.354331px;">
          @foreach($barang as $b)
            <font size="xx-small"> {{$b->nama_barang}} </font>
          @endforeach
        </div>
      </div>
    </div>

    <div class="Column">
      <div class="coba" style="height: 68.031496px; width:143.622047244px;"> 
        <img src="data:image/png;base64,{!! \DNS2D::getBarcodePNG($id_barang, 'QRCODE')!!}" style="height: 37.795276px; width:37.795276px"alt="barcode"/>
        <div class="coba1" style="margin-top: 1px; margin-right:37.795276px;">
          <font size="xx-small"><strong>{{$id_barang}}</strong></font>
        </div>
        <div class="coba2" style="margin-top:2px; margin-right:45.354331px;">
          @foreach($barang as $b)
            <font size="xx-small"> {{$b->nama_barang}} </font>
          @endforeach
        </div>
      </div>
    </div>

    <div class="Column">
      <div class="coba" style="height: 68.031496px; width:143.622047244px;"> 
        <img src="data:image/png;base64,{!! \DNS2D::getBarcodePNG($id_barang, 'QRCODE')!!}" style="height: 37.795276px; width:37.795276px"alt="barcode"/>
        <div class="coba1" style="margin-top: 1px; margin-right:37.795276px;">
          <font size="xx-small"><strong>{{$id_barang}}</strong></font>
        </div>
        <div class="coba2" style="margin-top:2px; margin-right:45.354331px;">
          @foreach($barang as $b)
            <font size="xx-small"> {{$b->nama_barang}} </font>
          @endforeach
        </div>
      </div>
    </div>

    <div class="Column">
      <div class="coba" style="height: 68.031496px; width:143.622047244px;"> 
        <img src="data:image/png;base64,{!! \DNS2D::getBarcodePNG($id_barang, 'QRCODE')!!}" style="height: 37.795276px; width:37.795276px"alt="barcode"/>
        <div class="coba1" style="margin-top: 1px; margin-right:37.795276px;">
          <font size="xx-small"><strong>{{$id_barang}}</strong></font>
        </div>
        <div class="coba2" style="margin-top:2px; margin-right:45.354331px;">
          @foreach($barang as $b)
            <font size="xx-small"> {{$b->nama_barang}} </font>
          @endforeach
        </div>
      </div>
    </div>

    <div class="Column">
      <div class="coba" style="height: 68.031496px; width:143.622047244px;"> 
        <img src="data:image/png;base64,{!! \DNS2D::getBarcodePNG($id_barang, 'QRCODE')!!}" style="height: 37.795276px; width:37.795276px"alt="barcode"/>
        <div class="coba1" style="margin-top: 1px; margin-right:37.795276px;">
          <font size="xx-small"><strong>{{$id_barang}}</strong></font>
        </div>
        <div class="coba2" style="margin-top:2px; margin-right:45.354331px;">
          @foreach($barang as $b)
            <font size="xx-small"> {{$b->nama_barang}} </font>
          @endforeach
        </div>
      </div>
    </div>
    

</div> 
@php } @endphp 


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








  

@php
for ($x = 1; $x <= 8; $x++) { @endphp

  <div class="Row">

    <div class="Column">
      <div class="coba" style="height: 68.031496px; width:143.622047244px;"> 
        <img src="data:image/png;base64,{!! \DNS2D::getBarcodePNG($id_barang, 'QRCODE')!!}" style="height: 37.795276px; width:37.795276px"alt="barcode"/>
        
      </div>
    </div>
    
    <div class="col">
      <div class="coba1" style="margin-top: 1px; margin-right:37.795276px;">
        <font size="1"><strong>{{$id_barang}}</strong></font>
      </div>
      <div class="coba2" style="margin-top:2px; margin-right:45.354331px;">
        @foreach($barang as $b)
          <font size="1"> {{$b->nama_barang}} </font>
        @endforeach
      </div>
    </div>


    <div class="Column">
      <div class="coba" style="height: 68.031496px; width:143.622047244px;"> 
       <img src="data:image/png;base64,{!! \DNS2D::getBarcodePNG($id_barang, 'QRCODE')!!}" style="height: 37.795276px; width:37.795276px"alt="barcode"/>
    </div>
    </div>

    <div class="col">
      <div class="coba1" style="margin-top: 1px; margin-right:37.795276px;">
        <font size="1"><strong>{{$id_barang}}</strong></font>
      </div>
      <div class="coba2" style="margin-top:2px; margin-right:45.354331px;">
        @foreach($barang as $b)
          <font size="1"> {{$b->nama_barang}} </font>
        @endforeach
      </div>
    </div>

    <div class="Column">
      <div class="coba" style="height: 68.031496px; width:143.622047244px;"> 
        <img src="data:image/png;base64,{!! \DNS2D::getBarcodePNG($id_barang, 'QRCODE')!!}" style="height: 37.795276px; width:37.795276px"alt="barcode"/>
      </div>
    </div>

    <div class="Column">
      <div class="coba" style="height: 68.031496px; width:143.622047244px;"> 
        <img src="data:image/png;base64,{!! \DNS2D::getBarcodePNG($id_barang, 'QRCODE')!!}" style="height: 37.795276px; width:37.795276px"alt="barcode"/>
      </div>
    </div>

    <div class="Column">
      <div class="coba" style="height: 68.031496px; width:143.622047244px;">
        <img src="data:image/png;base64,{!! \DNS2D::getBarcodePNG($id_barang, 'QRCODE')!!}" style="height: 37.795276px; width:37.795276px"alt="barcode"/>
      </div>
    </div>
  </div> 
@php } @endphp 

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



