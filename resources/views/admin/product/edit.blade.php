@extends('admin.layouts.main')
@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<style>
.material-icons.md-48 { font-size: 48px; }
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <a href="{{route('product.index')}}" type="button" class="pull-right btn btn-info"><i class="fa fa-folder"></i> View Product</a>
                  <h4 class="card-title">Create Product</h4>
                  
                </div>
                @include('_includes.messages')
                <div class="card-body">

                  <form action="{{route('product.update', $product->id)}}" enctype="multipart/form-data" method="post">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating" for="product_name">Product Name<span style="color: red;">*</span></label>
                          <input type="text" class="form-control" value="{{ $product['product_name'] }}" name="product_name" id="product_name">
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                        <label class="bmd-label-floating" for="SKU">Product SKU<span style="color: red;">*</span></label>
                        <input type="text" value="{{ $product['SKU'] }}" class="form-control" name="SKU" id="SKU">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="bmd-label-floating" for="brand">Product Brand<span style="color: red;">*</span></label>
                        <input type="text" value="{{ $product['brand'] }}" class="form-control" name="brand" id="brand">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label>Product Description <span style="color: red;">*</span></label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>
                            <textarea name="prod_desc" id="prod_desc" class="form-control" rows="4">{{ $product['prod_desc'] }}</textarea>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <?php
                          $imageurl=asset('img/catimage.jpg');
                          if(@$product->coverimage->first()->media_url)
                          {
                            $imageurl=@$product->coverimage->first()->media_url;
                            $imageurl=url('/').'/storage/product/'.$imageurl;
                          }
                           ?>
                        <div style="height: 110px;"><img src="{{ $imageurl }}" width="100px" /><br></div>
                        <div class="form-group">
                          <label class="material-icons md-48" for="prod_image">wallpaper</label>
                          <input type="file" id="prod_image" name="prod_image[]" multiple value="" /><span>Product Image upload</span>  {{-- <span style="color: blue" > Check image height 1200x500 </span> --}}
                          </div>
                      </div>
                    </div>   

                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating" for="price">Product Price<span style="color: red;">*</span></label>
                          <input type="text" value="{{ $product['price'] }}" class="form-control" name="price" id="price">
                          </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Market Price</label>
                          <input name="maket_price" value="{{ $product['maket_price'] }}" id="maket_price" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Suplier Price</label>
                          <input name="supplier_price" value="{{ $product['supplier_price'] }}" id="supplier_price" type="text" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Discount Price</label>
                          <input name="dis_price" value="{{ $product['dis_price'] }}" id="dis_price" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">

                         <div class="form-group">
                          <label for="category_id">Select Category <span style="color: red;">*</span></label>
                          <select multiple class="form-control" id="category_id" name="category_id[]">
                            <!-- <option value=''>-select category-</option> -->
                            <?php $allcate=App\Category::where('order', '3')->get(); ?>
                            @foreach ($allcate as $category)
                              @if($category->parentCategory)
                                <option <?php foreach ($cate as $cat) { if($cat->id==$category->id) { ?>selected <?php } } ?> value="{{ $category->id }}">{{ $category->parentCategory->parentCategory->name }} <strong>-</strong> {{ $category->parentCategory->name }} <strong>-</strong> {{ $category->name }}</option>
                              @endif                             
                            @endforeach
                          </select>
                        </div>

                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary pull-right">Update Product</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            



          </div>
        </div>
      </div>
    
    <!-- /.content -->
  </div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>

$(document).ready(function() {
  $("#category_id").select2({
    tags: true,
  });
});

</script>
@endsection