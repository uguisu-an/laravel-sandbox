<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestPresentValidationController extends Controller
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
            'value' => 'present',
        ]);

        return [$request->input('value', 'unset')];
    }
}
