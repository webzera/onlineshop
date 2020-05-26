<div class="flex">

@foreach( $addmores as $key => $addmore)
{{-- {{dd($loop->index)}} --}}
<div class="row" wire:key="{{$key}}">
  <div class="col-md-3">
    <div class="form-group">
      <label class="bmd-label-floating" for="spec_head">Specification Header</label>

      <select class="form-control m-bot15" name="spec_head[]">
	    @if ($specheads->count())
	        @foreach($specheads as $spechead)
	            <option {{ $addmore['specification_id'] == $spechead->id ? 'selected="selected"' : '' }} value="{{ $spechead->id }}">{{ $spechead->name }}</option>
	        @endforeach   
	    @endif
	</select>

      </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
    <label class="bmd-label-floating" for="pro_attribute">Attribute</label>
    <select class="form-control m-bot15" name="pro_attribute[]">
	    @if ($attributes->count())
	        @foreach($attributes as $attribute)
	            <option {{ $addmore['attribute_id'] == $attribute->id ? 'selected="selected"' : '' }} value="{{ $attribute->id }}">{{ $attribute->name }}</option>
	        @endforeach   
	    @endif
	</select>

    </div>
  </div>
	<div class="col-md-4">
		<div class="form-group">
			<label class="" for="attribute_value">Value</label>
			<input type="text" class="form-control" name="attribute_value[]" value="{{$addmore['value']}}">			
		</div>
	</div>
	<div class="col-md-1">
		<span wire:click="remove({{$key}})" class="fa fa-times text-red p-2 cursor-pointer"></span>
	</div>

</div>
@endforeach
	<div class="row">
		<div class="col-md-12">
			<div class="pull-right">
				<span wire:click="increment" class="fa fa-plus cursor-pointer px-2 py-4"> Add</span>
			</div>
		</div>
	</div>
</div>