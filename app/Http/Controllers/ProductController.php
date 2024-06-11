<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products=[
            ["Apple MacBook Pro 17","Silver","Laptop",2999],
            ["Magic Mouse 2","Black","Accessories",99]
        ];
        // dd($data);
        return view('product.index',compact('products'));
    }
}
