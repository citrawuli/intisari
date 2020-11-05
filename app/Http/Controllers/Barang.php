<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use \PDF;

class Barang extends Controller
{
    /** 
     * Display a listing of the resource. 
     * TAMPILKAN TABEL BARANG
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = DB::table('barang')->get();
        //dump($barang);        
        return view('menu2.data_barang', ['barang'=>$barang]);
    }

    public function barcodeScanner()
    {
      return view('menu2.barcode_scanner');
    }

    public function barcodeGenerator()
    {
        // $id_barang=DB::table('barang')
        //     ->where('id_barang', $id)->first();

        return view('menu2.barcode_generator');
    }

    /**
     * Store a newly created resource in storage.
     * INSERT DATA
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function printBarcode($id)
    {
        $barang=DB::table('barang')->where('id_barang', $id)->get();
        $id_barang=$id;
        // dump($barang);
        $pdf = PDF::loadView('menu2.barcode_print', ['barang'=>$barang, 'id_barang'=>$id_barang]); 
        $pdf->setPaper('f4',  'potrait'); 
        return $pdf->stream(); 
        //return view('menu2.barcode_print', ['barang'=>$barang, 'id_barang'=>$id_barang]);
    }

    public function printBarcode2(Request $request)
    {
        $barang=DB::table('barang')->where('id_barang', $request->id_barang)->first();
        // dump($barang);
        // $pdf = PDF::loadView('menu2.barcode_print', ['barang'=>$barang]); 
        // $pdf->setPaper('a4',  'potrait'); 
        // return $pdf->stream(); 
        return view('menu2.barcode_print', ['barang'=>$barang]);
    }

   



}
