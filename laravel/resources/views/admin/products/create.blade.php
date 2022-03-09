<x-admin>
	<div class="card card-success">
		<div class="card-header">
	    	<h3 class="card-title">Create Product</h3>
	  	</div>
  	</div>
	@if (session('msg'))
	  	<div class="alert alert-success">
	    	{{session('msg')}}
	  	</div>
	@endif

	@if (session('error'))
		<div class="alert alert-success">
		{{session('error')}}
		</div>
	@endif

	@include('includes-admin.addedit',[
	'action' => route('admin.products.store'),
	'method' => 'POST',
	])
</x-admin>