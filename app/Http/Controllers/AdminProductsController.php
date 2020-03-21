<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use App\ProductImage;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminProductsController
{
    /**
     * Show all products
     * @return Response
     */
    public function index()
    {
        $products = Product::latest()->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show create form
     * @return Response
     */
    public function create()
    {
        $categories = ProductCategory::latest()->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a new product
     * @param request $request
     * @return Redirect
     */
    public function store(Request $request){

        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'category' => ['nullable', 'string'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'draft' => ['nullable'],
        ]);

        $category_id = ProductCategory::firstOrCreate([
            'name' => $request->category
        ]);

        $product = Product::create();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->start_date = $request->start_date;
        $product->end_date = $request->end_date;
        $product->live = $request->draft != null ? 0 : 1;
    
        $product->category_id = $category_id->id;
        $product->save();

        return redirect(route('admin.products.images', $product));
    }

    /**
     * Show product images
     * @param Product $product
     * @return Response
     */
    public function images(Product $product){
        $images = ProductImage::where('product_id', $product->id)->get();

        return view('admin.products.images', compact('product', 'images'));
    }

    /**
     * Store new images
     * @param Product $product
     * @return Response
     */
    public function storeimages(Request $request, Product $product ){
        if(!empty($request->files)) {
            foreach ($request->files as $file)
            {
                $imageName = $file->getClientOriginalName();

                $file->move(public_path('shop/images/'.$product->id),$imageName);
                
                $imageUpload = new ProductImage();
                $imageUpload->file_name = $imageName;
                $imageUpload->product_id = $product->id;
                $imageUpload->save();

                return response()->json(['success'=>$imageName]);
            }
        }
    }

    /**
     * Delete image
     * @param Product $product
     * @param ProductImage $image
     * @return Response
     */
    public function deleteimage(Product $product, ProductImage $image){
        $image->delete();
        return redirect(route('admin.products.images', $product));
    }

    /**
     * Show product
     * @param Product $product
     * @return Response
     */
    public function show(Product $product)
    {
        $images = ProductImage::where('product_id', $product->id)->get();
        return view('admin.products.show', compact('product', 'images'));
    }

    /**
     * Show edit product form
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product){
        $categories = ProductCategory::latest()->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update product
     * @param Product $product
     * @param Request $request
     * @return Redirect
     */
    public function update(Request $request, Product $product){
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'category' => ['nullable', 'string'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'draft' => ['nullable'],
        ]);


        $category_id = ProductCategory::firstOrCreate([
            'name' => $request->category
        ]);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->start_date = $request->start_date;
        $product->end_date = $request->end_date;
        $product->live = $request->draft != null ? 0 : 1;
    
        $product->category_id = $category_id->id;
        $product->save();

        return redirect(route('admin.products.show', $product));
    }

    /**
     * Show confirm delete page
     * @param Product $product
     * @return Response
     */
    public function confirmdelete(){}

    /**
     * Delete product
     * @param Product $product
     * @return Redirect
     */
    public function delete(){}

}