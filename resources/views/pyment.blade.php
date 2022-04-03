@extends('layouts.app')
 <!-- Compiled and minified CSS -->

 <!-- Compiled and minified JavaScript -->
     <style>


     </style>
@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <h1 class="text-xl">Créer votre évènement</h1>
            <form action="{{ route('product.store') }}" id="form" method="post" class="my-4">
                @csrf
              
                
                <input id="tags" type="text" value="{{$price}}" name="tags" class="block" />

                <input type="hidden" name="payment_method" id="payment_method" />
                <!-- Stripe Elements Placeholder -->
                <div id="card-element"></div>

                <button class="mt-3" id="submit-button">    Paye</button>
            </form>
        </div>
    </section>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
     const stripe = Stripe(" {{ env('STRIPE_KEY') }} ");
     const elements = stripe.elements();
     const cardElement = elements.create('card', {
         classes: {
             base: 'StripeElement bg-white w-1/2 p-2 my-2 rounded-lg'
         }
     });
     cardElement.mount('#card-element');
     const cardButton = document.getElementById('submit-button');
     cardButton.addEventListener('click', async(e) => {
         e.preventDefault();
         const { paymentMethod, error } = await stripe.createPaymentMethod(
             'card', cardElement
         );
         if (error) {
             alert(error)
         } else {
             document.getElementById('payment_method').value = paymentMethod.id;
         }
         document.getElementById('form').submit();
     });
 </script>
    @endsection