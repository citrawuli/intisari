<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class ModelBarang extends Controller
{
	/*
	200 is READ | OK (GET, PUT, DELETE)
	201 is CREATE (POST)
	*/
    public function indexBarang(){
    	$barang=Barang::all();
    	return response()->json($barang, 200);
    }

    public function selectBarang($id){
    	$barang=Barang::find($id);
    	return response()->json($barang, 200);
    }

    public function createBarang(Request $request){
    	$barang = new Barang;
    	$barang->nama_barang =$request->nama_barang;
    	$barang->save();

    	return response()->json([
    		"message"=>"Barang record created"
    	], 201);
    }

    public function updateBarang(Request $request, $id){
    	$barang= Barang::find($id);
    	$barang->nama_barang =$request->nama_barang;
    	$barang->save();

    	return response()->json([
    		"message"=>"Barang record updated"
    	], 200);
    }

    public function destroyBarang($id)
    {
        $barang= Barang::find($id);
 
        if (!$barang) {
            $message = [
                "message" => "id not found",
            ];
        } 
        else {
            $barang->delete();
            $message = [
                "message" => "Barang record deleted"
            ];
        }
 
        return response()->json($message, 200);
    }


}
