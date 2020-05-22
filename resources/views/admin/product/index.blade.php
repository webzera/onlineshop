@extends('admin.layouts.main')
@section('styles')
<style type="text/css">
.btn-sm{
padding: 0.25rem 0.5rem;
font-size: 0.7875rem;
line-height: 1.5;
border-radius: 0.2rem;
}
.btn-danger {

    color: #fff;
    background-color: #e3342f;
    border-color: #e3342f;

}
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Product</h1>
          </div><!-- /.col -->
			<div class="col-sm-6">
            <a href="{{route('product.create')}}" type="button" class="float-right btn btn-success"><i class="fa fa-folder"></i> Create New Product</a>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
              @include('flash::message')
                <h5 class="card-title">Product Lists</h5>

				<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th></th>
      <th>Name</th>
      {{-- <th>Category</th>
      <th>Subcategory</th> --}}
      <th>Price</th>
      {{-- <th>SKU</th> --}}
      <th>Weightage</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($allproduct as $latest): ?>
      <tr>
        <?php
        $imageurl=asset('img/catimage.jpg');
        if(@$latest->coverimage->first()->media_url)
        {
          $imageurl=@$latest->coverimage->first()->media_url;
          $imageurl=url('/').'/storage/product/'.$imageurl;
        }
         ?>
        
      <td><img src="{{$imageurl}}" width="100" /></td>
      <td>{{$latest->product_name}}</td>    
     {{--  <td>{{$latest->categories->cate_name}}</td>         
      <td>{{$latest->subcategories->subcate_name}}</td>  --}}        
      <td>Rs.{{$latest->price}}</td>         
      {{-- <td>{{$latest->SKU}}</td>          --}}
      <td>{{$latest->weightage}}</td>         
      <td>
        <div class="columns is-mobile">          
          <div class="column is-one-half">
            <a href="{{route('product.edit', $latest->id)}}" class="button is-light is-fullwidth"><button type="button" class="btn btn-primary btn-sm" > Edit </button></a>        
          </div>
          <span class="column is-one-half">
          <form method="POST" action="{{route('product.destroy', $latest->id)}}"> 
            @csrf 
            {{ method_field('DELETE') }} 
            <input class="btn-sm btn btn-danger"  value="Delete" type="submit">
            </form>          
          </li></a>
          </span>
        </div>
      </td>
    </tr>
  <?php  endforeach; ?>

  </tbody>
{{$allproduct->links()}}
</table>
{{$allproduct->links()}}
</div>
              </div>
            </div>


          </div>
          <!-- /.col-md-6 -->

          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection

@section('scripts')

@endsection
