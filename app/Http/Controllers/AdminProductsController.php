<?php

namespace PortalComercial\Http\Controllers;

use Illuminate\Http\Request;

use PortalComercial\Http\Requests;
use PortalComercial\Http\Controllers\Controller;

use PortalComercial\Product;

class AdminProductsController extends Controller
{
    /** @var Product */
    private $products;
    
    public function __construct (Product $products) {
        $this->products = $products;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->products->all();
        
        return view('admin-products', compact('products'));
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\PortalComercial\Product $product)
    {
        if (!empty($product)):
            $price = 'R$ ' . number_format($product->price,2,',','.');
            return "<p><b>{$product->name}:</b> {$product->description} ({$price})</p>";
        endif;
        
        return "There's no product like this!";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
