<?php

namespace PortalComercial\Http\Controllers;

use Illuminate\Http\Request;

use PortalComercial\Http\Requests;
use PortalComercial\Http\Controllers\Controller;
use PortalComercial\Category;
use PortalComercial\Product;

class StoreController extends Controller
{
    public function index(Category $cat, Product $prod) {

        $categories = $cat->all();

        $featured = $prod->featured()->get();
        $recommended = $prod->recommended()->get();

        return view('store.index', compact('categories', 'featured', 'recommended'));
    }
}
