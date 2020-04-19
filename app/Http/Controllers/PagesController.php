<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use App\ProductImage;

class PagesController extends Controller
{
    /**
     * Show home page
     * @return Response
     */
    public function index()
    {
        $products = Product::latest()->limit(8)->get();

        return view('index', compact('products'));
    }

    /**
     * Show about page
     * @return Response
     */
    public function about()
    {
        return view('about');
    }

    /**
     * Show products page
     * @return Response
     */
    public function products()
    {
        $products = Product::latest()->get();

        return view('products', compact('products'));
    }

    /**
     * Show product page
     * @return Response
     */
    public function product(Product $product)
    {
        return view('product', compact('product'));
    }
}