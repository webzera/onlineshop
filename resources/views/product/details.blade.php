@extends('layouts.product')

@section('content')
        <div class="product-details ptb-10 pb-90">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-12 col-lg-7 col-12">
                        <div class="product-details-img-content">
                            <div class="product-details-tab mr-70">
                                <div class="product-details-large tab-content">
                                
                                @if($product->productimages->first())
                                @foreach($product->productimages as $prod_image)
                                    <div class="tab-pane {{$loop->first ? 'active show' : ''}} fade" id="pro-details{{$loop->index}}" role="tabpanel">
                                        <?php
                                        $imageurl=url('/').'/storage/product/'.$prod_image->media_url;
                                        ?>
                                        <div class="easyzoom easyzoom--overlay">
                                            <a href="{{ $imageurl }}">
                                                <img src="{{ $imageurl }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                                @else
                                    <div class="tab-pane active show fade" id="pro-details" role="tabpanel">
                                        <?php
                                        $imageurl=asset('img/catimage.jpg');
                                        ?>
                                        <div class="easyzoom easyzoom--overlay">
                                            <a href="{{ $imageurl }}">
                                                <img src="{{ $imageurl }}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                @endif                             

                                </div>
                                <div class="product-details-small nav mt-12" role=tablist>
                                @if($product->productimages->first())
                                @foreach($product->productimages as $prod_image) 

                                    <a class="{{$loop->first ? 'active' : ''}} mr-12" href="#pro-details{{$loop->index}}" data-toggle="tab" role="tab" aria-selected="true">
                                        <?php
                                        $imageurl=url('/').'/storage/product/'.$prod_image->media_url;
                                        ?>
                                        <img src="{{$imageurl}}" height="62" width="62" alt="">
                                    </a>                                                                 
                                @endforeach
                                @else
                                <a class="active mr-12" href="#pro-details" data-toggle="tab" role="tab" aria-selected="true">
                                        <?php
                                        $imageurl=asset('img/catimage.jpg');
                                        ?>
                                        <img src="{{$imageurl}}" height="62" width="62" alt="">
                                    </a>
                                @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5 col-12">
                        <div class="product-details-content">
                            <h3>{{$product->product_name}}</h3>
                            <div class="rating-number">
                                <div class="quick-view-rating">
                                    <i class="pe-7s-star red-star"></i>
                                    <i class="pe-7s-star red-star"></i>
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                </div>
                                <div class="quick-view-number">
                                    <span>2 Ratting (S)</span>
                                </div>
                            </div>
                            <div class="details-price">
                                <span>Rs.{{$product->price}}</span>
                            </div>
                            <p>{{$product->prod_desc}}</p>
                            <div class="quick-view-select">
                                <div class="select-option-part">
                                    <label>Size*</label>
                                    <select class="select">
                                        <option value="">- Please Select -</option>
                                        <option value="">xl</option>
                                        <option value="">ml</option>
                                        <option value="">m</option>
                                        <option value="">sl</option>
                                    </select>
                                </div>
                                <div class="select-option-part">
                                    <label>Color*</label>
                                    <select class="select">
                                        <option value="">- Please Select -</option>
                                        <option value="">orange</option>
                                        <option value="">pink</option>
                                        <option value="">yellow</option>
                                    </select>
                                </div>
                            </div>
                            <div class="quickview-plus-minus">
                                <div class="cart-plus-minus">
                                    <input type="text" value="02" name="qtybutton" class="cart-plus-minus-box">
                                </div>
                                <div class="quickview-btn-cart">
                                    <a class="btn-hover-black" href="#">add to cart</a>
                                </div>
                                <div class="quickview-btn-wishlist">
                                    <a class="btn-hover" href="#"><i class="pe-7s-like"></i></a>
                                </div>
                            </div>
                            <div class="product-details-cati-tag mt-35">
                                <ul>
                                    <li class="categories-title">Categories :</li>
                                    <li><a href="#">fashion</a></li>
                                    <li><a href="#">electronics</a></li>
                                    <li><a href="#">toys</a></li>
                                    <li><a href="#">food</a></li>
                                    <li><a href="#">jewellery</a></li>
                                </ul>
                            </div>
                            <div class="product-details-cati-tag mtb-10">
                                <ul>
                                    <li class="categories-title">Tags :</li>
                                    <li><a href="#">fashion</a></li>
                                    <li><a href="#">electronics</a></li>
                                    <li><a href="#">toys</a></li>
                                    <li><a href="#">food</a></li>
                                    <li><a href="#">jewellery</a></li>
                                </ul>
                            </div>
                            <div class="product-share">
                                <ul>
                                    <li class="categories-title">Share :</li>
                                    <li>
                                        <a href="#">
                                            <i class="icofont icofont-social-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icofont icofont-social-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icofont icofont-social-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="icofont icofont-social-flikr"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-description-review-area pb-90">
            <div class="container">
                <div class="product-description-review text-center">
                    <div class="description-review-title nav" role=tablist>
                        <a class="active" href="#pro-dec" data-toggle="tab" role="tab" aria-selected="true">
                            Description
                        </a>
                        <a href="#pro-review" data-toggle="tab" role="tab" aria-selected="false">
                            Reviews (0)
                        </a>
                    </div>
                    <div class="description-review-text tab-content">
                        <div class="tab-pane active show fade" id="pro-dec" role="tabpanel">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in</p>
                        </div>
                        <div class="tab-pane fade" id="pro-review" role="tabpanel">
                            <a href="#">Be the first to write your review!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- related product area start -->
        @include('layouts.relatedproducts')        
        <!-- related product area end -->
@endsection
