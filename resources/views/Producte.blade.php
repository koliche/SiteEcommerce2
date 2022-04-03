@extends('layouts.app')
 <!-- Compiled and minified CSS -->

 <!-- Compiled and minified JavaScript -->
     <style>


     </style>
@section('content')
 <div class="card small" style="height:600px;width:400px">
            <div class="card-image">
              <img style="height:500px;width:300px" src="https://img2.freepng.fr/20180620/opw/kisspng-smartphone-feature-phone-infinix-note-3-samsung-ga-5b2a69cd491f77.3747235215295062532995.jpg">
              <span class="card-title">{{$product["name"]}}</span>
            </div>
            <div class="card-content">
              <p >{{$product["description"]}}</p>
            </div>
            <div class="card-action">
              {{$product["price"]}} DH
            </div>
          </div> 
        

          <div><a href="{{route('product.form',$product["price"])}}" class="waves-effect waves-light btn">Add To Card</a></div>

         


@endsection
