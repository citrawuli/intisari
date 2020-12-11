<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use Maatwebsite\Excel\Validators\Failure;
use Session;
use DB;


class MyController extends Controller
{
    public function importExportView() {
        $customeer = DB::table('customeer')->get();
        //dump($customeer);        
        return view('menu5.excel', ['customeer'=>$customeer]);
    }

    public function export() {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import(Request $request) {
        
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:xls'
		]);
 		
		try {
		    // import data
 			$file = $request->file('file')->store('import');
            $import = new UsersImport;
            $import->import($file);
			// Excel::import(new UsersImport,request()->file('file'));
			// $failure = $import->failures();
			// dd($import->failures());

			// if($failure->isNotEmpty()){
			//   	return back()->withFailures($failure);
			// }
		} catch (\ValidationException $e) {
		    $failures = $e->failures();
     
		    foreach ($failures as $failure) {
		        $failure->row(); // row that went wrong
		        $failure->attribute(); // either heading key (if using heading row concern) or column index
		        $failure->errors(); // Actual error messages from Laravel validator
		        $failure->values(); // The values of the row that has failed.
		    }
		    return back()->withFailures($failures);
		} catch (\ErrorException $e) {
		    return back()->withErrors("There's something wrong. Please check the excel file and its format.");
		} 

		if($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

		// notifikasi dengan session
		Session::flash('sukses','Data Customer Berhasil Diimport!');
 
		// alihkan halaman kembali
		return back();
    }


}
