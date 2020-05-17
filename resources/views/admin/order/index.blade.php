@extends('admin.layouts.main')
@section('styles')
<style type="text/css">

</style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Order</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
      <a href="{{route('order.create')}}" type="button" class="float-right btn btn-success"><i class="fa fa-folder"></i> New Order</a>
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
                <h5 class="card-title">Order List</h5>

        <div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th></th>
      <th>Name</th>      
      <th>Email</th>      
      <th></th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($orders as $order): ?>
      <tr>
      <td><img src="{{url('/')}}/storage/customer/{{ $order['order_image'] }}" height="60px" /></td>
      <td>{{$order->name}}</td>
      <td>{{$order->email}}</td>            
      <td><a href="{{route('adminuser.edit', $order->id)}}" class="button is-light is-fullwidth"><button type="button" class="btn btn-info btn-sm">Edit</button></a></td>
    </tr>
  <?php  endforeach; ?>

  </tbody>
{{$orders->links()}}
</table>
{{$orders->links()}}
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
