@extends('layouts.app')

@section('content')
<div class="container">
        <h2>Product list</h2>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-4">
            <div class="card">
                <?php
                    $imageurl=asset('img/catimage.jpg');
                    if(@$product->coverimage->first()->media_url)
                    {
                      $imageurl=@$product->coverimage->first()->media_url;
                      $imageurl=url('/').'/storage/product/'.$imageurl;
                    }
                     ?>
              <img class="card-img-top" src="{{$imageurl}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">{{ $product->product_name }}</h5>
                <p class="card-text">{{ $product->prod_desc }}</p>
                {{-- <p>₹ &#8360; &#8377;</p> --}}
                <h3>Rs. {{ $product->price }}</h3>
                <a href="{{ route('cart::add', $product) }}" class="btn btn-primary">Add Card</a>
              </div>
            </div>
            </div>
            @endforeach
        </div>

</div>
@endsection
