<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $products=[
        //     ["Apple MacBook Pro 17","Silver","Laptop",2999],
        //     ["Magic Mouse 2","Black","Accessories",99]
        // ];
        $products = Product::all();
        // dd($data);
        return view('product.index',compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        Product::create([
            'name'=> $request->name,
            'color'=> $request->color,
            'category'=> $request->category,
            'price'=> $request->price,
            'image'=> $request->image,

        ]);
        return redirect()->route('productIndex');
    }
    public function edit($id)
    {

        $product = Product:: where('id', $id)->first();
        return view('product.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
        $product->update([
            'name' => $request->input('name'),
            'color' => $request->input('color'),
            'category' => $request->input('category'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
        ]);

        return redirect()->route('productIndex');
    }

}

