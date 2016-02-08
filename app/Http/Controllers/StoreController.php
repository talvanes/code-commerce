<?php

namespace PortalComercial\Http\Controllers;

use Illuminate\Http\Request;

use PortalComercial\Http\Requests;
use PortalComercial\Http\Controllers\Controller;
use PortalComercial\Category;
use PortalComercial\Product;
use PortalComercial\Tag;

class StoreController extends Controller
{
    public function index(Category $cat, Product $prod) {

        $categories = $cat->all();

        $featured = $prod->featured()->get();
        $recommended = $prod->recommended()->get();

        return view('store.index', compact('categories', 'featured', 'recommended'));
    }


    public function category(Category $cat, Product $prod, $id) {

        $categories = $cat->all();
        $category = $cat->find($id);

        $products = $prod->ofCategory($id)->get();

        return view('store.category', compact('categories', 'category', 'products'));
    }


    public function product(Category $cat, Product $prod, $id) {

        $categories = $cat->all();
        $product = $prod->find($id);

        return view('store.product', compact('categories', 'product'));
    }


    public function tag(Category $cat, Tag $t, $id) {

        $categories = $cat->all();

        $tag = $t->find($id);

        $products = $tag->products;

        return view('store.tag', compact('categories', 'tag', 'products'));
    }

}
