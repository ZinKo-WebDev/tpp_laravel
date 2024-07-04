<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        if ($products) {
            return ProductResource::collection($products);
        } else {
            return response()->json(['' => 'No Record Available'], 200);
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'image' => 'string|nullable|max:255',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'All fields are mandetory.',
                'error' => $validator->messages()
            ], 422);
        }
        $newProduct = Product::create([
            'name' => $request->name,
            'type' => $request->type,
            'image' => $request->image,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
        return response()->json([
            'message' => 'Product Created Successfully.',
            'data' => new ProductResource($newProduct),
        ], 200);
    }
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function update(Request $request,Product $product)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'image' => 'string|nullable|max:255',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'All fields are mandetory.',
                'error' => $validator->messages()
            ], 422);
        }
        $product->update([
            'name' => $request->name,
            'type' => $request->type,
            'image' => $request->image,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);
        return response()->json([
            'message' => 'Product Updated Successfully.',
            'data' => new ProductResource($product),
        ], 200);
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'message' => 'Product Deleted Successfully.',
        ], 200);


    }
}
