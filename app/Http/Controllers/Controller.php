<?php

namespace App\Http\Controllers;

use App\Models\Models\Product as ModelsProduct;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Stripe\Stripe;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   
   
   
   
      public function index()
    {
       $product=Product::all();
       return view('hom')->with(["product"=>$product]);
    }
    public function formpaye()
    {
       return view('cardForm');
    }
    public function show($id){
      $article=Product::find(2);
      return view('Producte')->with(["product"=>$article]);
  }
  public function store(Request $request)
  {
    return $request;
      $amount = 1000;

      if($request->filled('premium')) $amount += 500;

      $result = \Stripe\Charge::create(array(
        "currency" => "cad",
        "customer" => "hhhhh",
        "amount"   => 200 // amount in cents                                                 
   ));

     

     

     
  }
/*  public function charge(Request $request){
    $charge = Stripe::charges ()->create([
        'currency' => 'USD',
        'source' => $request->payment_method,
        'amount' => $request->tags,
        'description' => 'Test Stripe Laravel 8'
]);
$chargeId = $charge ['id'];
if ($chargeId) {
        // save order in orders table ...
        // clearn cart
        session ()->forget ('cart');
        return redirect()->route('panier',$chargeId)->with('success','Payment success');
    }
else {
        return redirect()->back();
}
}
    */
}
