<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
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
    public function create()
    {
        $categories = ProductCategory::latest()->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request){

        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'double'],
            'category' => ['nullable', 'string'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'draft' => ['nullable'],
        ]);


        $product = Product::create();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->start_date = $request->start_date;
        $product->end_date = $request->end_date;
        $product->live = $request->draft != null ? 0 : 1;
        $product->save();

        return redirect(route('admin.products.index'));


    }
    public function show(Product $product)
    {
        dd($product);
    }
    public function edit(){}
    public function update(){}
    public function confirmdelete(){}
    public function delete(){}

}