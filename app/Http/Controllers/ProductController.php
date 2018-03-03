<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category')->orderBy('created_at', 'DESC')->paginate(12);
        return view('product.index', compact('products'));
    }

    public function show(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }
}
