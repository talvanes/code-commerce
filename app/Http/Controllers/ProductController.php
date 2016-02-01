<?php

namespace PortalComercial\Http\Controllers;

use Illuminate\Http\Request;

use PortalComercial\Http\Requests;
use PortalComercial\Http\Controllers\Controller;
use PortalComercial\Http\Requests\ProductRequest;

use PortalComercial\Product;

class ProductController extends Controller
{
    private $productModel;
	
	public function __construct (Product $product) {
		$this->productModel = $product;
	}
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productModel->all();
		
		return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $input = $request->all();
		
		$product = $this->productModel->fill($input);
		$product->featured = $request->has('featured');
		$product->recommend = $request->has('recommend');
		
		$product->save();
		
		return redirect()->route('products');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productModel->find($id);
		
		return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $input = $request->all();
		
		$product = $this->productModel->find($id);
		$product->featured = $request->has('featured');
		$product->recommend = $request->has('recommend');
		
		$product->update($input);
		
		return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productModel->find($id)->delete();
		
		return redirect()->route('products');
    }
}
