<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestRequiredValidationController extends Controller
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
            'value' => 'required',
        ]);
        
        return [$request->input('value', 'unset')];
    }
}
