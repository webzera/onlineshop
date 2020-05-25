  <div class="popular-product-area wrapper-padding-3 pt-5 pb-15">
      <div class="container-fluid">
          <div class="section-title-6 text-center mb-50">
              <h2>Popular Product</h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
          </div>
          <div class="product-style">
              <div class="popular-product-active owl-carousel">
                @foreach ($products as $product)

                  <div class="product-wrapper">
                      <div class="product-img">
                      <?php
                        $imageurl=asset('img/catimage.jpg');
                        if(@$product->coverimage->first()->media_url)
                        {
                          $imageurl=@$product->coverimage->first()->media_url;
                          $imageurl=url('/').'/storage/product/'.$imageurl;
                        }
                        ?>
                          <a href="#">
                              <img src="{{$imageurl}}" alt="{{$product->product_name}}">
                          </a>
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
                      <div class="funiture-product-content text-center">
                          <h4><a href="product-details.html">{{ $product->product_name }}</a></h4>
                          <span>Rs. {{ $product->price }}</span>
                      </div>
                  </div>     

                @endforeach
              </div>
          </div>
      </div>
  </div>