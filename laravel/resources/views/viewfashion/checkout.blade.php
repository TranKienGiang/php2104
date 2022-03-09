<x-home>
	@section('section')
	@include('includes.section-checkout')
	@endsection
	@section('script')
    <script type="text/javascript">
      	$(document).ready(function() {
        	$('.purchase').click(function(e) {
         		e.preventDefault();
	          	// var productEl = $(this).parent().parent();
	          	// var product_id = $(this).data('product_id');
	          	var name = $('.name').val(),
            		phone = $('.phone').val(),
            		email = $('.email').val(),
            		address = $('.address').val();
            		note = $('.note').val();
            		total_price = $('.total_price').text();
          		var url = "{{ route('order.purchase') }}";
	          	$.ajax(url, {
	            	type: 'POST',
		            data: {
		              name: name,
		              phone: phone,
		              address: address,
		              email: email,
		              note:note,
		              total_price:total_price,
		            },
	            	success: function (data) {
	              		console.log('success');
			            Swal.fire({
			                icon: 'success',
			                title: 'Thank you!',
			                showConfirmButton: false,
			            });
	              		window.location.href = '/';
	            	},
	            	error: function () {
	              		console.log('fail');
	              		Swal.fire({
			                icon: 'error',
			                title: 'Failed!',
			                showConfirmButton: false,
	              		});
	            	}
          		});
        	});
      	});
    </script>
  	@endsection
</x-home>