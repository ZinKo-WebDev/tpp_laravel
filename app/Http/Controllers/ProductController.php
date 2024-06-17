<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function index()
    {
        $product_item = Product::with('images')->get();
        return view('product.index', compact('product_item'));
    }

    public function create()
    {
        return view('product.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $product = Product::create($request->only('name', 'type', 'price', 'quantity'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->move(public_path('uploads'), $filename);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $filename,
                ]);
            }
        }

        return redirect()->route('productIndex');
    }


    public function edit($id)
    {
        $data = Product::with('images')->find($id);

        if (!$data) {
            return redirect()->route('productIndex')->withErrors('Product not found.');
        }

        return view('product.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->only('name', 'type', 'price', 'quantity'));

        if ($request->hasFile('images')) {
            foreach ($product->images as $image) {
                $imagePath = public_path($image->image_path);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }

            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = $image->move(public_path('uploads'), $filename);
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $filename,
                ]);
            }
        }

        return redirect()->route('productIndex');
    }

    public function destroy(Product $productdel)
    {
        foreach ($productdel->images as $image) {
            $imagePath = public_path($image->image_path);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        $productdel->delete();
        return redirect()->route('productIndex');
    }
}
