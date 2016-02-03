<?php

namespace PortalComercial\Http\Controllers;

use Illuminate\Http\Request;

use PortalComercial\Http\Requests;
use PortalComercial\Http\Controllers\Controller;
use PortalComercial\Http\Requests\CategoryRequest;

use PortalComercial\Category;

class CategoryController extends Controller
{
    private $categoryModel;
    
    public function __construct(Category $category){
        $this->categoryModel = $category;
    }
    
    public function index()
    {
        $categories = $this->categoryModel->paginate(10);
        
        return view('category.index', compact('categories'));
    }
    
    public function create()
    {
        return view('category.create');
    }
	
	public function store(CategoryRequest $request) {
		$input = $request->all();
		
		$category = $this->categoryModel->fill($input);
		
		$category->save();
		
		return redirect()->route('categories');
	}
	
	public function edit($id)
	{
		$category = $this->categoryModel->find($id);
		
		return view('category.edit', compact('category'));
	}
	
	public function update(CategoryRequest $request, $id) {
		$input = $request->all();
		$this->categoryModel->find($id)->update($input);
		
		return redirect()->route('categories');
	}
	
	public function destroy($id)
	{
		$this->categoryModel->find($id)->delete();
		
		return redirect()->route('categories');
	}
}
