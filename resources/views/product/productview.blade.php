@extends('layouts.product')

@section('content')
<div class="shop-page-wrapper shop-page-padding ptb-10">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.productleftbar')                    

            <div class="col-lg-9">
                <div class="shop-product-wrapper res-xl res-xl-btn">
                    <div class="shop-bar-area">
                        <div class="shop-bar pb-60">
                            <div class="shop-found-selector">
                                <div class="shop-found">
                                    <p><span>23</span> Product Found of <span>50</span></p>
                                </div>
                                <div class="shop-selector">
                                    <label>Sort By : </label>
                                    <select name="select">
                                        <option value="">Default</option>
                                        <option value="">A to Z</option>
                                        <option value=""> Z to A</option>
                                        <option value="">In stock</option>
                                    </select>
                                </div>
                            </div>
                            <div class="shop-filter-tab">
                                <div class="shop-tab nav" role=tablist>
                                    <a class="active" href="#grid-sidebar1" data-toggle="tab" role="tab" aria-selected="false">
                                        <i class="ti-layout-grid4-alt"></i>
                                    </a>
                                    <a href="#grid-sidebar2" data-toggle="tab" role="tab" aria-selected="true">
                                        <i class="ti-menu"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="shop-product-content tab-content">
                            <div id="grid-sidebar1" class="tab-pane fade active show">
                                <div class="row">
                                     @foreach ($products as $product)
                                    <div class="col-lg-6 col-md-6 col-xl-3">
                                        <div class="product-wrapper mb-30">
                                            <div class="product-img">
                                                <?php
                                                    $imageurl=asset('img/catimage.jpg');
                                                    if(@$product->coverimage->first()->media_url)
                                                    {
                                                      $imageurl=@$product->coverimage->first()->media_url;
                                                      $imageurl=url('/').'/storage/product/'.$imageurl;
                                                    }
                                                    ?>
                                                <a href="{{ route('productdetail', $product) }}">
                                                    <img src="{{$imageurl}}" alt="{{$product->product_name}}">
                                                </a>
                                                <span>hot</span>
                                                <div class="product-action">
                                                    <a class="animate-left" title="Wishlist" href="#">
                                                        <i class="pe-7s-like"></i>
                                                    </a>
                                                    <a class="animate-top" title="Add To Cart" href="{{ route('cart::add', $product) }}">
                                                        <i class="pe-7s-cart"></i>
                                                    </a>
                                                    <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#productModal{{$product->id}}" href="#">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="#">{{ $product->product_name }}</a></h4>
                                                <span>Rs.{{ $product->price }}</span>
                                            </div>
                                        </div>
                                    </div>  
                                    @endforeach
                                </div>
                            </div>
                            <div id="grid-sidebar2" class="tab-pane fade">
                                <div class="row">
                                    @foreach ($products as $product)
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="product-wrapper mb-30 single-product-list product-list-right-pr mb-60">
                                            <div class="product-img list-img-width">
                                                <a href="#">
                                                    <img src="front/img/product/fashion-colorful/1.jpg" alt="">
                                                </a>
                                                <span>hot</span>
                                                <div class="product-action-list-style">
                                                    <a class="animate-right" title="Quick View" data-toggle="modal" data-target="#productModal{{$product->id}}" href="#">
                                                        <i class="pe-7s-look"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content-list">
                                                <div class="product-list-info">
                                                    <h4><a href="#">Dagger Smart Trousers</a></h4>
                                                    <span>$150.00</span>
                                                    <p>Lorem ipsum dolor sit amet, mana consectetur adipisicing elit, sed do eiusmod tempor labore. </p>
                                                </div>
                                                <div class="product-list-cart-wishlist">
                                                    <div class="product-list-cart">
                                                        <a class="btn-hover list-btn-style" href="#">add to cart</a>
                                                    </div>
                                                    <div class="product-list-wishlist">
                                                        <a class="btn-hover list-btn-wishlist" href="#">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    @endforeach                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagination-style mt-30 text-center">
                    <ul>
                        <li><a href="#"><i class="ti-angle-left"></i></a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#">19</a></li>
                        <li class="active"><a href="#"><i class="ti-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
