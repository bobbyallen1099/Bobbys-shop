<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    /**
     * Show home page
     * @return Response
     */
    public function index()
    {
        return view('index');
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
        return view('products');
    }

    /**
     * Show product page
     * @return Response
     */
    public function product($product)
    {
        return view('product');
    }
}