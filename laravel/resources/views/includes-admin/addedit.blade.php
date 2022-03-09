<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
	@csrf
    @if ($method == 'PUT')
      @method('PUT')
    @endif
	<div class="form-group select" style="width: 97%; margin-left: 19px;">
    	<label>Category</label>
	   <select name="category_id" class="form-control">
	    	@foreach($categories as $id => $category)
			<option value="{{ $id }}" 
				@if($id == @$product->category_id)
				selected
				@endif
			>
				{{ $category->name }}
			</option>
			@endforeach
	    </select>
  	</div>
	<div class="card-body">
	  	<div class="form-group">
	    	<label >Name</label>
	    	<input name="product_name" type="name" class="form-control"  placeholder=" Product name ..." value="{{ old('product_name', @$product->product_name) }}">
		    	@foreach ($errors->get('product_name') as $message)
		    		<span style="color: red">{{$message}}</span>
		    	@endforeach
	  	</div>

	  	<div class="form-group">
	    	<label >Code</label>
	    	<input  name="code"  class="form-control" placeholder="Enter Code" value="{{ old('code', @$product->code) }}">
	    	@if ($errors->has('code'))
	        <span style="color: red">{{ $errors->first('code') }}</span>
				@endif
	  	</div>
	  	<!-- <div class="form-group">
	    	<label >Img Url</label>
	    	<input value="{{ @$product->img_url }}" name="img_url"  class="form-control"  placeholder="Enter email">
	  	</div> -->
	    <div class="form-group">
	    	<label >Price</label>
	    	<input  name="price" type="name" class="form-control"  placeholder="$" value="{{ old('price', @$product->price) }}">
	    	@if ($errors->has('price'))
	        <span style="color: red">{{ $errors->first('price') }}</span>
				@endif
	  	</div>
	  	<div class="form-group">
	    	<label >Quantity</label>
	    	<input  name="quantity" class="form-control"  placeholder="Quantity" value="{{ old('quantity', @$product->quantity) }}">
	    	@if ($errors->has('quantity'))
	        <span style="color: red">{{ $errors->first('quantity') }}</span>
				@endif
	  	</div>
      <div class="form-group">
	    	<label>Sale Off</label>
	    	<input  name="sale_off" class="form-control"  placeholder="50%" value="{{ old('sale_off', @$product->sale_off) }}">
	    	@if ($errors->has('sale_off'))
	        <span style="color: red">{{ $errors->first('sale_off') }}</span>
				@endif
	  	</div>
			<div class="form-group">
				<label for="image">Image</label>
				<div class="input-group">
			  	<div class="custom-file">
              <input type="file" class="custom-file-input" id="image" name="img_url" value="{{ old('img_url', @$product->img_url) }}">
              <label class="custom-file-label" for="image">
                @if (isset($product))
                  {{ $product->img_url }}
                @else
                  Choose file
                @endif
              </label>
            </div>
					</div>
					@if ($errors->has('img_url'))
	        <span style="color: red">{{ $errors->first('img_url') }}</span>
				@endif
		  	</div>
	  	<div class="col-sm-6">
			<!-- checkbox -->
			<div class="form-group">
				<div class="form-check">
				   <input name="status" class="form-check-input" type="checkbox" value="1"
              @if (@$product->status) checked @endif
            >
				  <label class="form-check-label">Status</label>
				</div>
			</div>
        </div>
	</div>
	<!-- /.card-body -->

	<div class="card-footer">
  		<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>
@section('script')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#image').change(function(e) {
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
      });
    });
  </script>
@endsection