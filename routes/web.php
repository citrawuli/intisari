<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



/*LANGSUNG KE VIEW*/

Route::get('/', function () {
    return view('template.dashboard');
});

Route::get('/loginWithAPI', function () {
    return view('menu4.loginAPI');
});


Route::get('/download', function () {
	$filepath=public_path()."/downloadable_file.pdf";
	$filename="Dokumentasi dan User Manual.pdf";
	$headers=array('Content-Type' => 'application/pdf');

	if(file_exists($filepath)){
        // Send Download
        return \Response::download( $filepath, $filename, $headers );
    } else {
        // Error
        exit( 'Requested file does not exist on our server!' );
    }
});

/*LEWAT CONTROLLER */

Route::get('/TabelCustomer', 'Customer@index'); // View Tabel Customer
Route::get('/TambahCustomerBlob', 'Customer@viewTambahCustomerBlob'); // View Form Isi
Route::get('/TambahCustomerFilename', 'Customer@viewTambahCustomerFilename'); // View Form Isi
Route::get('/getKota/{id_prov}', 'Customer@getKota'); //AJAX
Route::get('/getKecamatan/{id_kota}', 'Customer@getKecamatan');//AJAX
Route::get('/getKelurahan/{id_kecamatan}', 'Customer@getKelurahan');//AJAX
Route::post('/storeCustomer', 'Customer@store');//post form to DB
Route::post('/storeCustomerFileName', 'Customer@storeFilename');//post form to DB

Route::get('/ListBarang', 'Barang@index'); // View Tabel Barang
Route::get('/BarcodeScanner', 'Barang@barcodeScanner'); // View Scanner
Route::get('/BarcodeGenerator', 'Barang@barcodeGenerator'); // View Scanner
Route::get('/printBarcode/{id_barang}', 'Barang@printBarcode'); //View Laman Print

Route::get('/ListToko', 'Toko@index'); // View Tabel List Toko
Route::get('/TitikAwal', 'Toko@viewTitikAwal'); // View Titik Awal
Route::get('/TitikKunjungan', 'Toko@viewTitikKunjungan'); // View Titik Kunjungan
Route::post('/storeToko', 'Toko@store'); // Store Titik Awal
Route::get('/getBarcode/{id}', 'Toko@getBarcode'); // Store Titik Awal
Route::get('/printBarcodeToko/{barcode}', 'Toko@printBarcodeToko'); //View Laman Print

Route::get('/export', 'MyController@export')->name('export');
Route::get('/importExportView', 'MyController@importExportView');
Route::post('/import', 'MyController@import')->name('import');
