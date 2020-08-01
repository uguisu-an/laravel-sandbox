<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SyncController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return [
            'products' => Product::all(),
        ];
    }
}
