 @extends('layouts.app')
@section('title', 'Shopping product')
@section('content')
 <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Cart</h2>
        </div>
    </section>
    <section class="section-content bg padding-y border-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <main class="col-sm-9">
                    @if (\Cart::isEmpty())
                        <p class="alert alert-warning">Your shopping cart is empty.</p>
                    @else
                        <div class="card">
                            <table class="table table-hover shopping-cart-wrap">
                                <thead class="text-muted">
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col" width="120">Quantity</th>
                                    <th scope="col" width="120">Price</th>
                                    <th scope="col" class="text-right" width="200">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Cart::getContent() as $product)
                                    <tr>
                                        <td>
                                            <figure class="media">
                                                <figcaption class="media-body">
                                                    <h6 class="title text-truncate">{{ Str::words($product->name,20) }}</h6>
                                                   
                                                </figcaption>
                                            </figure>
                                        </td>
                          
                                        <td>
                                            <div class="price-wrap">
                                               
                                                <var class="price">{{ $product->quantity  }}</var>
                                                <small class="text-muted">Quantity article(s)</small>
                                            </div>
                                        </td>

                                         <td>
                                            <div class="price-wrap">
                                                <var class="price">{{ $product->price }} €</var>
                                              
                                                <small class="text-muted">Prix unitaire</small>
                                            </div>
                                        </td>

                                        <td class="text-right">
                                            <a href="{{ route('cart.remove', $product->id) }}" class="btn btn-outline-danger"><i class="fa fa-times"></i> </a>
                                        </td>
              
                                    </tr>
                               
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                   @endif
                </main>
                <aside class="col-sm-3">

                    <div class="col">
                                <form method="post" action="{{ route('cart.clear')}}" class="card p-2">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <button class="btn btn-danger" type="submit"> Clear Cart</button>
                                    
                                </form>
                            </div><br>
                  
                    <p class="alert alert-success">Add USD 5.00 of eligible items to your order to qualify for FREE Shipping. </p>
                    <dl class="dlist-align h4">
                        <dt>Total:</dt>
                        <dd class="text-right"><strong>{{ Cart::getSubTotal() }} €</strong></dd>
                    </dl>
                    <hr>
                     
                    <figure class="itemside mb-3">
                    	  
                        <aside class="aside"><img src="{{ asset('frontend/images/icons/pay-visa.png') }}"></aside>
                        <div class="text-wrap small text-muted">
                            Pay 84.78 AED ( Save 14.97 AED ) By using ADCB Cards
                        </div>
                    </figure>
                    <figure class="itemside mb-3">
                        <aside class="aside"> <img src="{{ asset('frontend/images/icons/pay-mastercard.png') }}"> </aside>
                        <div class="text-wrap small text-muted">
                            Pay by MasterCard and Save 40%.
                            <br> Lorem ipsum dolor
                        </div>
                    </figure>
                     <a href="{{ route('site.products.stripe') }}" class="btn btn-success btn-lg btn-block">Payement carte bancaire </a>  <a href="{{ route('site.products.checkout') }}" class="btn btn-primary btn-lg btn-block">Payment paypalchekout</a>
                </aside>
            </div>
        </div>
    </section>

    @endsection