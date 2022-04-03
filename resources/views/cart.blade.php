@extends('layouts.app')

@section('content')
          <main class="my-8">
            <div class="container px-6 mx-auto">
                <div class="flex justify-center my-6">
                    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                      @if ($message = Session::get('success'))
                          <div class="p-4 mb-3 bg-green-400 rounded">
                              <p class="text-green-800">{{ $message }}</p>
                          </div>
                      @endif
                        <h3 class="text-3xl text-bold">Cart List</h3>
                      <div class="flex-1">
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                          <thead>
                            <tr class="h-12 uppercase">
                              <th class="hidden md:table-cell"></th>
                              <th class="text-left">Name</th>
                              <th class="pl-5 text-left lg:text-right lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qtd</span>
                                <span class="hidden lg:inline">Quantity</span>
                              </th>
                              <th class="hidden text-right md:table-cell"> price</th>
                              <th class="hidden text-right md:table-cell"> Remove </th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($cartItems as $item)
                            <tr>
                              <td class="hidden pb-4 md:table-cell">
                                <a href="#">
                                  <img src="data:image/jpeg;base64,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" class="w-20 rounded" alt="Thumbnail">
                                </a>
                              </td>
                              <td>
                                <a href="#">
                                  <p class="mb-2 md:ml-4">{{ $item->name }}</p>
                                  
                                </a>
                              </td>
                              <td class="justify-center mt-6 md:justify-end md:flex">
                                <div class="h-10 w-28">
                                  <div class="relative flex flex-row w-full h-8">
                                    
                                    <form action="{{ route('cart.update') }}" method="POST">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $item->id}}" >
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                    class="w-6 text-center bg-gray-300" />
                                    <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500 btn m-2 text-center">update</button>
                                    </form>
                                  </div>
                                </div>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                    ${{ $item->price }}
                                </span>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                  @csrf
                                  <input type="hidden" value="{{ $item->id }}" name="id">
                                  <button class="px-2 pb-2 ml-2  text-white bg-red-600 btn m-2  text-center">x</button>
                              </form>
                                
                              </td>
                            </tr>
                            @endforeach
                             
                          </tbody>
                        </table>
                        <div>
                         Total: ${{ Cart::getTotal() }}
                        </div>
                        <div>formpaye
                          <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button class="px-2 pb-2 ml-2 text-red-800 bg-red-300 btn m-2  text-center">Remove All Cart</button>
                          </form>
                          <br/>
                            <a href="{{ route('stripe') }}"><button  class="px-2 pb-2 ml-2 text-red-800 bg-red-300 btn m-2  text-center">paye</button></a>
                        </div>


                      </div>
                    </div>
                  </div>
            </div>
        </main>
    @endsection