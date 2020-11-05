<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource. 
     * TAMPILKAN TABEL
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$category = DB::table('categories')->get();
        $product = DB::table('product')
        ->join('categories', 'categories.category_id', '=', 'product.category_id')
        ->select('product.product_id', 'categories.category_name', 'product.product_name', 
            'product.product_price', 'product.product_stock', 'product.explanation')
        ->get();
        //dump($product);
        return view('admin.form_edit_produk', ['product'=>$product]);
    }

    public function insertCategory(){
        $category = DB::table('categories')->get();
        //dump($category);
        return view('admin.form_pengisian_produk', ['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * INSERT DATA
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('product')->insert(
            ['product_id'=> $request->input('product_id'),
            'category_id' => $request->input('category_id'),
            'product_name' => $request->input('product_name'),
            'product_price' => $request->input('product_price'),
            'product_stock' => $request->input('product_stock'),
            'explanation' => $request->input('explanation')]
        );
        return redirect( '/EditProduk' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table('categories')->get();
        $product=DB::table('product')
            ->where('product_id', $id)->first();

        return view('admin.form_edit2_produk',['product'=> $product, 'category'=>$category] );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         DB::table('product')
            ->where('product_id', $id)
            ->update(
                ['product_id'=> $request->input('product_id'),
                'category_id' => $request->input('category_id'),
                'product_name' => $request->input('product_name'),
                'product_price' => $request->input('product_price'),
                'product_stock' => $request->input('product_stock'),
                'explanation' => $request->input('explanation')]
            );
        return redirect( '/EditProduk' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //var_dump($id);
        //return view('form_pengisian_kategori');
        DB::table('product')->where('product_id','=', $id)->delete();
        return redirect( '/EditProduk' );
    }
}
 