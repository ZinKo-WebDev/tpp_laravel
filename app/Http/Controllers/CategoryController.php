<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data=[
            ["Stark","Brandon",18],
            ["Grayjoy","Thiron",21],
            ["Gilbart","Elena",24],
        ];
        // dd($data);
        return view('category.index',compact("data"));
    }
    public function result()
    {
        return view('category.result');
    }
}
