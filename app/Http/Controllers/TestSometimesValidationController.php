<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestSometimesValidationController extends Controller
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
            'value' => 'sometimes',
        ]);

        return [$request->input('value', 'unset')];
    }
}
