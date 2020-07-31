<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestFilledValidationController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'filled' => 'filled',
        ]);

        return [$request->input('filled', 'unset')];
    }
}
