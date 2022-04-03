<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
class CartController extends Controller
{
    public function cartList()
    {
        $cartItems =Cart::getContent();
        // dd($cartItems);
        return view('cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
    public function call(Request $request) {
        \Stripe\Stripe::setApiKey('sk_test_51KeqI0HtIjZjTus1Y9lVRr4fVY7gW1KVf1kqv1t0QZRyitm3TsyqXvN8owJ3xP2LBzOzslE3j4DE23puISmd3lw300MDebJloR');
        $customer = \Stripe\Customer::create(array(
          'name' => 'test',
          'description' => 'test description',
          'email' => 'email@gmail.com',
          'source' => $request->input('stripeToken'),
           "address" => ["city" => "San Francisco", "country" => "US", "line1" => "510 Townsend St", "postal_code" => "98140", "state" => "CA"]

      ));

        
            \Stripe\Charge::create ( array (
                    "amount" => 300 * 100,
                    "currency" => "usd",
                    "customer" =>  $customer["id"],
                    "description" => "Test payment."
            ) );
            return view ( 'cardForm' );
        
    }
}
