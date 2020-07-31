<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestNullableValidationController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'nullable' => 'nullable',
        ]);
    }
}
