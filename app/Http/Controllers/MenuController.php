<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class MenuController extends Controller
{
    /**
     * Update session for menu
     * @return Response
     */
    public function update(request $request)
    {
        if( $request->closed == 1) {
            $request->session()->push('menu_closed', $request->closed);
        } else {
            $request->session()->forget('menu_closed');
        }
    }

}