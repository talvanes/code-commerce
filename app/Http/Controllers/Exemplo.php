<?php

namespace PortalComercial\Http\Controllers;

use PortalComercial\Category;

use Illuminate\Http\Request;

use PortalComercial\Http\Requests;
use PortalComercial\Http\Controllers\Controller;

class Exemplo extends Controller
{
    private $categories;
    
    // constructor
    public function __construct(Category $categories)
    {
        $this->middleware('guest');
        $this->categories = $categories;
    }
    
    // [ Show exemplo ]
    public function exemplo() {
        $categories = $this->categories->all();
        
        //return view('exemplo')->with('nome', $nome);
        /*return view('exemplo', [
            'nome' => $nome,
            'sobrenome' => $sobrenome
        ]);*/
        return view('exemplo', compact('categories'));
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
