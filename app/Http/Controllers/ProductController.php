<?php

namespace PortalComercial\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\DocBlock\Tag;
use PortalComercial\Http\Requests;
use PortalComercial\Http\Controllers\Controller;
use PortalComercial\Http\Requests\ProductRequest;

use PortalComercial\Product;
use PortalComercial\Category;
use PortalComercial\ProductImage;
use PortalComercial\User;

class ProductController extends Controller
{
    private $productModel;

    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productModel->paginate(10);

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category, User $user)
    {
        $categories = $category->lists('name', 'id');
        $users = $user->lists('name', 'id');

        return view('product.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Category $category, User $user)
    {
        $product = $this->productModel->find($id);
        $categories = $category->lists('name', 'id');
        $users = $user->lists('name', 'id');

        return view('product.edit', compact('product', 'categories', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productModel->find($id)->delete();

        return redirect()->route('products');
    }


    /**
     *
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function image($id)
    {
        $product = $this->productModel->find($id);

        return view('product.image', compact('product'));
    }

    /**
     *
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createImage($id)
    {
        $product = $this->productModel->find($id);

        return view('product.create_image', compact('product'));
    }

    /**
     *
     *
     * @param Requests\ProductImageRequest $request
     * @param $id
     * @param ProductImage $productImage
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeImage(Requests\ProductImageRequest $request, ProductImage $productImage, $id)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImage::create([
            'product_id' => $id,
            'extension' => $extension
        ]);

        Storage::disk('public_local')->put("{$image->id}.{$extension}", File::get($file));

        return redirect()->route('products.image', ['id' => $id]);
    }


    /**
     *
     *
     * @param ProductImage $productImage
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroyImage(ProductImage $productImage, $id)
    {

        $image = $productImage->find($id);

        if (file_exists(public_path("uploads/{$image->id}.{$image->extension}"))):
            Storage::disk('public_local')->delete("{$image->id}.{$image->extension}");
        endif;

        $product = $image->product;
        $image->delete();

        return redirect()->route('products.image', ['id' => $product->id]);
    }


    /**
     *
     *
     * @param \PortalComercial\Tag $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tags(\PortalComercial\Tag $tag)
    {
        $tags = $tag->paginate(10);

        return view('product.tags', compact('tags'));
    }

    /**
     *
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tagCreate()
    {
        return view('product.create_tag');
    }

    /**
     *
     *
     * @param Requests\ProductTagRequest $request
     * @param \PortalComercial\Tag $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function tagStore(Requests\ProductTagRequest $request, \PortalComercial\Tag $tag)
    {
        $input = $request->all();

        $tag->create([
            'name' => $input['tag']
        ]);

        return redirect()->route('products.tags');
    }


    /**
     *
     *
     * @param \PortalComercial\Tag $productTag
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function tagDelete(\PortalComercial\Tag $productTag, $id)
    {
        $tag = $productTag->find($id);
        $tag->delete();

        return redirect()->route('products.tags');
    }


    /**
     *
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function productTags($id)
    {
        if ($id):
            $product = $this->productModel->find($id);
            $tags = $product->tags->all();
            return view('product.product_tags', compact('product', 'tags'));
        endif;

        return view('product.product_tags');

    }


    /**
     *
     *
     * @param \PortalComercial\Tag $tag
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addProductTags(\PortalComercial\Tag $tag, $id)
    {
        $tags = $tag->lists('name', 'id');

        return view('product.product_add_tag', compact('tags', 'id'));
    }

    /**
     *
     *
     * @param Request $request
     * @param Product $prod
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeProductTags(Request $request, $id)
    {
        $input = $request->all();

        if ($id):
            // update tags for an existing product
            $product = $this->productModel->find($id);

            if ( !in_array($input['tag'], $product->tags()->lists('id')->all()) ):
                $product->tags()->attach($input['tag']); // ****
            endif;

        endif;

        return redirect()->route('product.tags.index', ['id' => $id]);
    }

    /**
     *
     *
     * @param \PortalComercial\Tag $tag
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteProductTags($id, $tag) {
        $product = $this->productModel->find($id);
        $product->tags()->detach($tag);

        return redirect()->route('product.tags.index', ['id' => $id]);
    }

}
