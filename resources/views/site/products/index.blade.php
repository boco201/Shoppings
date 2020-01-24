@extends('layouts.app')

@section('title')
boco | Admin Panel
@endsection

@section('content')
     <!-- ========================= SECTION CONTENT ========================= -->
    <section class="section-content padding-y-sm bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="https://www.dg-annonces.com"><img src="{{ asset('frontend/images/iles.jpg')}}" class="d-block w-100" alt="iles" width="100%" height="400"></a>
        <div class="carousel-caption d-none d-md-block">
          <h1><a href="https://www.dg-annonces.com"> Vas-sy découvrir dg-annonces </a></h1>
          <p>Participer .</p>
        </div>
      </div>
      <div class="carousel-item">
         <img src="{{ asset('frontend/images/ocean.jpg')}}" class="d-block w-100" alt="ocean" width="100%" height="400">
        <div class="carousel-caption d-none d-md-block">
           <h1>COMORES LIBRE, PUBLIER UNE ANNONCE</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
         <img src="{{ asset('frontend/images/iles.jpg')}}" class="d-block w-100" alt="cocotier" width="100%" height="400">
        <div class="carousel-caption d-none d-md-block">
           <h1><a href="/articles/posts/create"> COMORES LIBRE, PUBLIER UN ARTICLE </a></h1>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
 <div class="col-md-2">
     <h1>Pub de notre site</h1>
     <img src="{{ asset('frontend/images/iles.jpg')}}" class="d-block w-100" alt="cocotier" width="100%" height="300">
 </div>
 </div>
 </div>
<div class="container-fluid">
            <header class="section-heading heading-line">
                <h4 class="title-section bg">NOUVELLES COLLECTIONS


                </h4>
            </header>
            <div class="row">
            	@foreach($products as $product)
                <div class="col-md-3">
                    <figure class="card card-product">
                        <div class="img-wrap"><a href="{{ $product->path()}}"><img src="{{ URL::to('/') }}/images/{{ $product->image }}"  width="100%" height="300" /></a></div>
                        <figcaption class="info-wrap">
                            <h4 class="title"><a href="{{ $product->path()}}">{{$product->title}}</a></h4>
                            <p class="desc">{{Str::limit($product->description, 100) }}</p>
                            <!-- rating-wrap.// -->
                        </figcaption>
                 
                        <div class="bottom-wrap">
                            <a href="{{ $product->path()}}" class="btn btn-sm btn-primary float-right">Vire details</a>

                            <div class="price-wrap h5" style="color: red; font-weight: bold;font-size: 2rem">
                                <span class="price-new">{{ $product->price}} €</span> 
                            </div>
                              <div class="rating-wrap">

                                        <ul class="rating-stars">
                                            <li style="width:80%" class="stars-active">
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </li>
                                        </ul>
                                        <div class="label-rating">132 reviews</div>
                                        <div class="label-rating">154 orders </div>
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