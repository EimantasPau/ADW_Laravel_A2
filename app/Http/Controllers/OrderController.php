<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
use Stripe\Charge;
use Stripe\Stripe;


class OrderController extends Controller
{
    public function index() {
        $orders = Order::whereUserId(Auth::user()->id)->with('products')->get();
        return view('order.index', compact('orders'));
    }

    public function checkout() {
        if(!Cart::session(Auth::user()->id)->isEmpty()){
            $total = Cart::session(Auth::user()->id)->getTotal();
            $orderItems = Cart::session(Auth::user()->id)->getContent();
            return view('cart.checkout', ['total'=> $total, 'orderItems'=>$orderItems]);
        }
        return redirect('/');
    }

    public function charge(Request $request) {

        if(Cart::session(Auth::user()->id)->isEmpty()) {
           return redirect()->route('cart.show');
        }

        Stripe::setApiKey('sk_test_lx4qHrzmxu2yiIfEbAURRS5q');
        try {
            Charge::create(array(
                "amount" => Cart::getTotal() * 100,
                "currency" => "gbp",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Order payment."
            ));
            $this->create();
            Cart::clear();
        } catch (Exception $e) {
                return redirect()->route('order.checkout')->with('error', $e->getMessage());
        }
        return redirect()->route('product.index')->with('successMessage', 'Your payment has been successful!');
    }

    public function create() {
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'total_price' => Cart::getTotal()
        ]);

        $orderLines = Cart::session(Auth::user()->id)->getContent();
        foreach($orderLines as $line) {
            $product = Product::findOrFail($line->id);
            $order->products()->attach($product, ['line_quantity' => $line->quantity]);
            $product->decrement('quantity', $line->quantity);
        }

    }

}
