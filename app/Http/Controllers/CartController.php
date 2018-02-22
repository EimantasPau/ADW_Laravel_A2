<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add($id) {
        $product = Product::findOrFail($id);
        if($product->quantity <= 0){
            Session::flash('errorMessage', 'This product is out of stock!');
            return redirect()->back();
        }
        $userId = Auth::user()->id;
        Cart::session($userId)->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array()
        ));
        Session::flash('successMessage', "Item added to the cart!");
        return redirect()->back();
    }

    public function show() {
        $userId = Auth::user()->id;
        $cartItems = Cart::session($userId)->getContent();
        return view('cart.index', compact('cartItems'));
    }

    public function clear() {
        $userId = Auth::user()->id;
        Cart::session($userId)->clear();
        Session::flash('successMessage', 'Cart has been emptied!');
        return redirect()->back();
    }
}
