@extends('layouts.cartlayout')

@section('content')
<div class="container">
	<h2>Checkout</h2>	
	<h3>Shipping Information</h3>

	<form method="POST" action="{{ route('order.store') }}">
		@csrf	
		{{-- @include('_errors') --}}
		<div class="form-group">
			<label for="shipping_fullname">Full Name</label>
			<input type="text" name="shipping_fullname" class="form-control">
		</div>
		<div class="form-group">
			<label for="shipping_state">State</label>
			<input type="text" name="shipping_state" class="form-control">
		</div>
		<div class="form-group">
			<label for="shipping_city">City</label>
			<input type="text" name="shipping_city" class="form-control">
		</div>
		<div class="form-group">
			<label for="shipping_pincode">Pincode</label>
			<input type="number" name="shipping_pincode" class="form-control">
		</div>
		<div class="form-group">
			<label for="shipping_address">Full Address</label>
			<input type="text" name="shipping_address" class="form-control">
		</div>
		<div class="form-group">
			<label for="">Mobile</label>
			<input type="text" name="shipping_phone" class="form-control">
		</div>

		<h5>Payment Option</h5>

		<div class="form-check">
			<label class="form-check-label">
				<input type="radio" class="form-check-input" name="payment_method" value="cash_on_delivery">Cash on delivery
			</label>
		</div>
		<div class="form-check">
			<label class="form-check-label">
				<input type="radio" class="form-check-input" name="payment_method" value="paypal">Paypal
			</label>
		</div>


		<button type="submit" class="btn btn-primary mt-2">Place Order</button>
	</form>		
</div>  
@endsection