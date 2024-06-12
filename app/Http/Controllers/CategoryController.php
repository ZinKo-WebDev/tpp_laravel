<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // $data=[
        //     ["Stark","Brandon",18],
        //     ["Grayjoy","Thiron",21],
        //     ["Gilbart","Elena",24],
        // ];
        // dd($data);
        $categories = Category::all();
        return view('category.index',compact("categories"));
    }
    public function result()
    {
        return view('category.result');
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        Category::create([
           "name"=> $request->name,
        ]);
//        dd($request->all());
     return redirect()->route('categoryIndex');
    }
}
