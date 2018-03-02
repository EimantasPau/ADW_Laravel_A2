<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Darryldecode\Cart\Exceptions\InvalidItemException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class CartController extends Controller
{
    public function add($id) {
        $product = Product::findOrFail($id);
        if($product->quantity <= 0){
            Session::flash('errorMessage', 'This product is out of stock!');
            return redirect()->back();
        }
        $userId = Auth::user()->id;
        try {
            Cart::session($userId)->add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => array()]
            );
        } catch (\Darryldecode\Cart\Facades\InvalidItemException $e){
            return redirect()->back()->with('errorMessage' , $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('errorMessage' , $e->getMessage());
        }
        Session::flash('successMessage', "Item added to the cart!");
        return redirect()->back();
    }

    public function show() {
        $userId = Auth::user()->id;
        try {
            $cartItems = Cart::session($userId)->getContent();
        } catch (\Exception $e) {
            return view('cart.index')->with('errorMessage', $e->getMessage());
        }
        return view('cart.index', compact('cartItems'));
    }

    public function clear() {
        $userId = Auth::user()->id;
        Cart::session($userId)->clear();
        Session::flash('successMessage', 'Cart has been emptied!');
        return redirect()->back();
    }
}
