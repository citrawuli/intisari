<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use \PDF;

class Toko extends Controller
{
    /** 
     * Display a listing of the resource. 
     * TAMPILKAN TABEL BARANG
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $toko = DB::table('lokasi_toko')->get();
        //dump($barang);        
        return view('menu3.data_toko', ['toko'=>$toko]);
    }

    public function viewTitikAwal()
    {    
        return view('menu3.input_toko');
    }

    public function store(Request $request)
    {
        DB::table('lokasi_toko')->insert(
            ['nama_toko' => $request->input('nama'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'accuracy' => $request->input('accuracy')]
        );
        return redirect( '/ListToko' );
    }

    public function viewTitikKunjungan(){
        return view('menu3.data_kunjungan');
    }

    public function getBarcode($id){
      $toko = DB::table('lokasi_toko')->where('barcode', $id)->get();
      return json_encode($toko);
    }

    public function printBarcodeToko($id)
    {
      $lokasi_toko=DB::table('lokasi_toko')->where('barcode', $id)->get();
      $barcode=$id;
      // dump($lokasi_toko);
      $pdf = PDF::loadView('menu3.barcode_print', ['lokasi_toko'=>$lokasi_toko, 'barcode'=>$barcode]); 
      $pdf->setPaper('f4',  'potrait'); 
      return $pdf->stream(); 
        
    }


    

   



}
