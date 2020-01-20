@extends('layouts.app')

@section('title')
boco | Admin Panel
@endsection

@section('content')
     <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content padding-y-sm bg">
        <div class="container-fluid">

            <header class="section-heading heading-line">
                <h4 class="title-section bg">FEATURED PRODUCTS</h4>
            </header>
            <div class="row">
            	@foreach($products as $product)
                <div class="col-md-3">
                    <figure class="card card-product">
                        <div class="img-wrap"><img src="{{ URL::to('/') }}/images/{{ $product->image }}"  width="100%" height="300" /></div>
                        <figcaption class="info-wrap">
                            <h4 class="title"><a href="">{{$product->title}}</a></h4>
                            <p class="desc"></p>
                            <!-- rating-wrap.// -->
                        </figcaption>
                        <div class="bottom-wrap">
                            <a href="{{route('site.products.details', $product->id)}}" class="btn btn-sm btn-primary float-right">Vire details</a>
                            <div class="price-wrap h5" style="color: red; font-weight: bold;font-size: 2rem">
                                <span class="price-new">{{ $product->price}} €</span> 
                            </div>
                            <!-- price-wrap.// -->
                        </div>
                        <!-- bottom-wrap.// -->
                    </figure>
                </div>
                <!-- col // -->
                  @endforeach

                  <div class="container">
                      {{ $products->links() }}
                  </div>
               </section>
           </div>
@endsection