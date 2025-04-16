<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        $response = [
            'status' => 'success',
            'data' => $products
        ];

        return response()->json($response, 200);
    }


    public function addProduct(Request $request)
    {

        $fields = $request->validate([
            'name' => 'string|required',
            'price' => 'numeric|required',
            'description' => 'string|required',
            'stock' => 'integer|required',
        ]);

        // Create a new product
        $product = Product::create([
            'name' => $fields['name'],
            'price' => $fields['price'],
            'description' => $fields['description'],
            'stock' => $fields['stock'],
        ]);

        return response()->json(['message' => 'Product added successfully', 'data' => $product], 201);
    }

    public function show(Product $product)
    {
        return response()->json(['data' => $product], 200);
    }
}
