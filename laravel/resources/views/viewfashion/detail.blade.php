<x-home>
	@section('section')
	<!-- Shop Details Section Begin -->
	@include('includes.section-shop-detail')
	<!-- Shop Details Section End -->

	<!-- Related Section Begin -->
	@include('includes.related-spad-detail')
	<!-- Related Section End -->
	@endsection

	@section('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });
                Object.size = function(obj) {
                    var size = 0,
                    key;
                    for (key in obj) {
                        if (obj.hasOwnProperty(key)) size++;
                    }
                    return size;
                };
                $('.add-cart').click(function(e) {
                    e.preventDefault();
                    var product_id = $(this).data('product_id');
                    var quantity = parseInt($('#quantity').val());;
                    var url = "{{ route('addcart') }}";
                    $.ajax(url, {
                        type: 'POST',
                        data: {
                            product_id: product_id,
                            quantity: quantity,
                        },
                        success: function (data) {
                            console.log('success');
                            var objData = JSON.parse(data);
                            var newQuantity = Object.size(objData.cart);
                            $('.cart-quantity').text(newQuantity);
                            Swal.fire({
                                icon: 'success',
                                title: 'Your Add Product To Cart',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        },
                       error: function () {
                            console.log('fail');
                            Swal.fire({
                                icon: 'error',
                                title: 'Your Add Product To Cart',
                                howConfirmButton: false,
                                timer: 1500
                            })
                        }
                    });
                });
            });
        </script>        
    @endsection
</x-home>