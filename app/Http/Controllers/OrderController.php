<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
       return view('order.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'telephone' => ['required', 'string'],
            'email' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);

//        dd($request->all());
        return response()->json($request->only(['name', 'telephone', 'email', 'description']));
    }
}
