@extends('layouts.cartlayout')

@section('content')
<div class="container">
	<div class="cart-main-area pt-19 pb-20">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                <h1 class="cart-heading">Your Cart</h1>
	                    <div class="table-content table-responsive">
	                        <table>
	                            <thead>
	                                <tr>
	                                	<th scope="col">#</th>	
	                                    <th>images</th>
	                                    <th>Product</th>
	                                    <th>Price</th>
	                                    <th>Quantity</th>
	                                    <th>remove</th>
	                                    <th>Total</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                            	{{-- {{dd($cartitems)}} --}}
	                            	@foreach ($cartitems as $cartitem)
	                                <tr>
	                                	<th scope="row">{{$loop->index+1}}</th>                                            
	                                    <td class="product-thumbnail">
	                                    	<?php
                    $imageurl=asset('img/catimage.jpg');
                    if(@$cartitem['item']->coverimage->first()->media_url)
                    {
                      $imageurl=@$cartitem['item']->coverimage->first()->media_url;
                      $imageurl=url('/').'/storage/product/'.$imageurl;
                    }
                     ?>
	                                        <a href="#"><img height="150" width="250" src="{{ $imageurl }}" alt="{{ $cartitem['item']['product_name'] }}"></a>
	                                    </td>
	                                    <td class="product-name"><a href="#">{{ $cartitem['item']['product_name'] }}</a></td>
	                                    <td class="product-price-cart"><span class="amount">{{ $cartitem['item']['price'] }}</span></td>
	                                    <td class="product-quantity">

	                                    	<form action="{{ route('cart::update', $cartitem['item']['id']) }}">   	
									      	<input name="quantity" type="number" value="{{ $cartitem['qty'] }}">
									      	<input type="submit" value="update">
									      	</form>                                                
	                                    </td>
	                                    <td class="product-remove"><a href="{{ route('cart::delete',$cartitem['item']['id']) }}"><i class="fas fa-trash-alt"></i>
				<i class="pe-7s-close"></i></a></td>
	                                    <td class="product-subtotal">{{ $cartitem['price'] }}</td>
	                                </tr>
	                                @endforeach
	                            </tbody>
	                        </table>
	                    </div>
	                    {{-- <div class="row">
	                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                            <div class="coupon-all">
	                                <div class="coupon">
	                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
	    								<input class="button" name="apply_coupon" value="Apply coupon" type="submit">
	                                </div>
	                                <div class="coupon2">
	                                    <input class="button" name="update_cart" value="Update cart" type="submit">
	                                </div>
	                            </div>
	                        </div>
	                    </div> --}}

	                    <div class="row">
	                        <div class="col-md-5 ml-auto">
	                            <div class="cart-page-total">
	                                <h2>Cart totals</h2>
	                                <ul>
	                                    <li>Subtotal<span>{{ $totalPrice }}</span></li>
	                                    <li>Total<span>{{ $totalPrice }}</span></li>
	                                </ul>
	                                <a href="{{ route('checkout.index') }}">Proceed to checkout</a>
	                            </div>
	                        </div>
	                    </div>

	            </div>
	        </div>
	    </div>
     </div>
</div>  

@endsection