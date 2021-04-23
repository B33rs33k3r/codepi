<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function product(Request $request)
    {
        $validated = $request->validate([
            'carac1' => ['required', 'string', 'max:510'],
            'carac2' => ['required', 'string', 'max:255'],
            'carac3' => ['required', 'number', 'max:999']
        ]);

        return 'yolo';
    }

    public function category(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:510'],
        ]);
    }
}
