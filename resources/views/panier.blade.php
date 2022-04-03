@extends('layouts.app')
 <!-- Compiled and minified CSS -->

 <!-- Compiled and minified JavaScript -->
     <style>


     </style>
@section('content')
@if(session('cart'))
      <div class="row">
      @foreach(session('cart') as $id=>$details)
              <div class="col s3">
                  <div class="card">
                      <div class="card-image">
                          <span class="card-title">{{$details['name']}}</span>
                      </div>
                      <div class="card-content">
                          <p>Price : {{$details['price']}}</p>
                          <p>Quantity available : {{$details['quantity']}}</p>
                      </div>
                  </div>
              </div>

      @endforeach
          <a href="#">Payer</a>
      </div>
  @endif
  @endsection