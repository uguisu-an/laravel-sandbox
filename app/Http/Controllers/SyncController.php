<?php

namespace App\Http\Controllers;

use App\Product;
use App\UpdateSequenceNumber;
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
        $request->validate([
            'last_update_count' => 'filled|integer',
        ]);
        $last_update_count = $request->input('last_update_count', 0);
        return [
            'products' => Product::withTrashed()->where('update_count', '>', $last_update_count)->get(),
        ];
    }
}
