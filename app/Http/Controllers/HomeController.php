<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
  
       
    public function index()
    {
       $product=Product::all();
       return view('hom')->with(["product"=>$product]);
    }
    public function show($id){
      $article=Product::find($id);
      return view('Producte')->with(["product"=>$article]);
  }
  public function form($price){
    $price=$price;
    return view('pyment')->with(["price"=>$price]);
}
public function addToPanier($id){
  $product=Product::find($id);
  $cart=session()->get('cart');
  $cart[$id]=[
      'name' => $product->name,
      'quantity' => $product->quantity,
      'price' => $product->price,
      'image' => $product->image,
  ];
  session()->put('cart',$cart);
  return redirect()->back()->with('success',"Product added successfuly");
}
public function panier()
    {
       return view('panier');
    }
}
