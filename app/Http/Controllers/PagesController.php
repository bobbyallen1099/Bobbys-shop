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

}