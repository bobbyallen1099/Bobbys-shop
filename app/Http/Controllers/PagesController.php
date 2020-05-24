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
        $products = Product::latest()->isLive()->limit(8)->get();

        return view('index', compact('products'));
    }


    /**
     * Show products page
     * @return Response
     */
    public function products()
    {
        $products = Product::latest()->isLive()->get();

        return view('products', compact('products'));
    }

    /**
     * Show product page
     * @return Response
     */
    public function product(Product $product)
    {
        if(check_if_product_is_live($product)) {
            return view('product', compact('product'));
        } else {
            return view('404');
        }
    }


    /**
     * Show basket page
     * @return Response
     */
    public function basket()
    {
        return view('basket');
    }
}