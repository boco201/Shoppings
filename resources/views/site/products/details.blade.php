@extends('layouts.app')

@section('title')
boco | Admin Panel
@endsection

@section('content')
  <section class="section-content bg padding-y border-top">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row no-gutters">
                            <aside class="col-sm-7 border-right">
                                <article class="gallery-wrap">
                                    <div class="img-big-wrap">
                                        <div>
                                            <a href=""><img src="{{ URL::to('/') }}/images/{{ $product->image }}"  width="100%" height="400" /></a>
                                        </div>
                                    </div>
     
                                    <!-- slider-nav.// -->
                                </article>
                                <!-- gallery-wrap .end// -->
                            </aside>
                            <aside class="col-sm-5">
                                <article class="p-5">
                                    <h3 class="title mb-3">{{$product->title}}</h3>

                                    <div class="mb-3">
                                        <var class="price h3 text-warning">
        <span class="currency">EUR €</span><span class="num">{{$product->price}}</span>
    </var>
                                        <span>/per kg</span>
                                    </div>
                                    <!-- price-detail-wrap .// -->
                                    <dl>
                                        <dt>Description</dt>
                                        <dd>
                                            <p>{{$product->description}} </p>
                                        </dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3">Model#</dt>
                                        <dd class="col-sm-9">{{$product->sku}}</dd>

                                        <dt class="col-sm-3">Color</dt>
                                        <dd class="col-sm-9">Black and white </dd>

                                        <dt class="col-sm-3">Delivery</dt>
                                        <dd class="col-sm-9">Russia, USA, and Europe </dd>
                                    </dl>
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
                                    <!-- rating-wrap.// -->
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <dl class="dlist-inline">
                                                <dt>Quantity: </dt>
                                                <dd>
                                                    <select class="form-control form-control-sm" style="width:70px;">
                                                        <option> 1 </option>
                                                        <option> 2 </option>
                                                        <option> 3 </option>
                                                    </select>
                                                </dd>
                                            </dl>
                                            <!-- item-property .// -->
                                        </div>
                                        <!-- col.// -->
                                        <div class="col-sm-7">
                                            <dl class="dlist-inline">
                                                <dt>Size: </dt>
                                                <dd>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                        <span class="form-check-label">SM</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                        <span class="form-check-label">MD</span>
                                                    </label>
                                                    <label class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                        <span class="form-check-label">XXL</span>
                                                    </label>
                                                </dd>
                                            </dl>
                                            <!-- item-property .// -->
                                        </div>
                                        <!-- col.// -->
                                    </div>
                                    <!-- row.// -->
                                    <hr>
                                    <a href="#" class="btn  btn-primary"> Buy now </a>
                                     <div class="col">
                                <form method="post" action="{{ route('cart.add')}}" class="form-inline my-lg-0">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                    <button class="btn btn-primary" type="submit"> Add To Cart</button>
                                    
                                </form>
                            </div>
                                  
                                </article>
                                <!-- card-body.// -->
                            </aside>
                            <!-- col.// -->
                        </div>
                        <!-- row.// -->
                    </div>
                    <!-- card.// -->

                </div>
                <div class="col-md-12">
                    <article class="card mt-4">
                        <div class="card-body">
                            <h4>Detail overview</h4>
                            <p>{{$product->description}} <p/>
                        </div>
                        <!-- card-body.// -->
                    </article>
                </div>
            </div>
        </div>
    </section>

@endsection