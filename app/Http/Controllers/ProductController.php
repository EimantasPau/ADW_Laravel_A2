<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $q = Product::with('category');
        if($request->has('search')){
            $search = $request->input('search');
            $searchTrim = trim($search);
            if($searchTrim != ''){
                $q->where(function($query) use ($searchTrim){
                    $query->where('name', 'LIKE','%' . $searchTrim . '%');
                    $query->orWhere('description', 'LIKE', '%' . $searchTrim . '%');
                });

            }
            Session::flash('searchMessage', $searchTrim);
        }

        if($request->has('category_id')){
            $category = $request->input('category_id');
            $q->where('category_id', $category);
        }

        if($request->has('minimumPrice')){
            $min = $request->input('minimumPrice');
            $minTrim = trim($min);
            if($minTrim != ''){
                $q->where('price', '>=', floatval($minTrim));
            }
        }
        if($request->has('maximumPrice')){
            $max = $request->input('maximumPrice');
            $maxTrim = trim($max);
            if($maxTrim != ''){
                $q->where('price', '<=', floatval($maxTrim));
            }
        }

        if($request->has('orderBy')){
            $orderBy = $request->input('orderBy');
            $q->orderBy($orderBy, 'ASC');
        }

        if($request->has('paginate')){
            $products = $q->paginate($request->input('paginate'));
        } else {
            $products = $q->paginate(12);
        }


        $categories = Category::all();
        return view('product.index', compact('products','categories'));
    }


    public function show(Request $request, $id)
    {
        $product = Product::findOrFail($id);
//        $rating = round($product->reviews()->avg('rating'), 1);

        return view('product.show', compact('product', 'rating'));
    }
}
