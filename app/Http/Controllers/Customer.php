<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;

class Customer extends Controller
{
    /** 
     * Display a listing of the resource. 
     * TAMPILKAN TABEL CUSTOMER
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = DB::table('customer')->get();
        //dump($customer);        
        return view('menu1.data_customer', ['customer'=>$customer]);
    }

    public function viewTambahCustomerBlob()
    {
        $customer = DB::table('customer')->get();
        $provinsi = DB::table('provinsi')->get();
        $kota = DB::table('kota')->get();
        $kecamatan = DB::table('kecamatan')->get();
        $kelurahan = DB::table('kelurahan')->get();
        return view('menu1.tambah_customer_blob', ['customer'=>$customer, 'provinsi'=>$provinsi, 'kota'=>$kota, 'kecamatan'=>$kecamatan, 'kelurahan'=>$kelurahan]);
    }

    public function viewTambahCustomerFilename()
    {
        $customer = DB::table('customer')->get();
        $provinsi = DB::table('provinsi')->get();
        $kota = DB::table('kota')->get();
        $kecamatan = DB::table('kecamatan')->get();
        $kelurahan = DB::table('kelurahan')->get();
        return view('menu1.tambah_customer_filename', ['customer'=>$customer, 'provinsi'=>$provinsi, 'kota'=>$kota, 'kecamatan'=>$kecamatan, 'kelurahan'=>$kelurahan]);
    }

    public function getKota($id_prov){
    	echo json_encode(DB::table('kota')->where('id_provinsi', $id_prov)->get());
    }

    public function getKecamatan($id_kota){
    	echo json_encode(DB::table('kecamatan')->where('id_kota', $id_kota)->get());
    }

    public function getKelurahan($id_kecamatan){
    	echo json_encode(DB::table('kelurahan')->where('id_kecamatan', $id_kecamatan)->get());
    }

    /**
     * Store a newly created resource in storage.
     * INSERT DATA
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('customer')->insert(
            ['nama_customer'=> $request->input('nama'),
            'alamat_customer' => $request->input('alamat'),
            'foto' => $request->input('foto'),
            'id_kelurahan' => $request->input('id_kelurahan')]
        );
        return redirect( '/TabelCustomer' );
    }

    public function storeFilename(Request $request)
    {
       //get the base-64 from data
        $base64_str = substr($request->foto, strpos($request->foto, ",")+1);

        //decode base64 string
        $image = base64_decode($base64_str);
        $id_customer=DB::table('customer')->select('id_customer')->count()+1;
        $customer=DB::table('customer')->get();
        $storagePath = '/public/foto/fotocustomer'.$id_customer.'.png';
        Storage::put($storagePath,$image);


        DB::table('customer')->insert([
          'nama_customer'=> $request->input('nama'),
          'alamat_customer' => $request->input('alamat'),
          'foto' => $request->input('foto'),
          'file_path' => $storagePath,
          'id_kelurahan' => $request->input('id_kelurahan')
        ]);
        return redirect( '/TabelCustomer' );
    }

    // public function storeFilename(Request $request)
    // {
    //    //get the base-64 from data
    //     $base64_str = substr($request->foto, strpos($request->foto, ",")+1);

    //     //decode base64 string
    //     $image = base64_decode($base64_str);
    //     $id_customer=DB::table('customer')->select('id_customer')->count()+1;

    //     Storage::disk('local')->put($id_customer.'.png', $image);
    //     $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
    //      // echo $storagePath.'imgage.png'; 
    //     echo $storagePath."$id_customer.'.png'";
    //     $pathfix=$storagePath."$id_customer.'.png'";


    //     DB::table('customer')->insert(
    //         ['nama_customer'=> $request->input('nama'),
    //         'alamat_customer' => $request->input('alamat'),
    //         'foto' => $request->input('foto'),
    //         'file_path' => $request->input($pathfix),
    //         'id_kelurahan' => $request->input('id_kelurahan')]
    //     );
    //     return redirect( '/TabelCustomer' );
    // }




}
