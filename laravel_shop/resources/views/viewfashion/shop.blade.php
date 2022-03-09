<x-home >
    @section('section')

    @include('includes.breadcrumb-option')

    @include('includes.shop-spad')

    @endsection
    
    @section('script')
        <script type="text/javascript">
            $('.add-cart').click(function(e) {
                e.preventDefault();
                var product_id = $(this).data('product_id');
                var quantity = 1;
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
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                });
            });
        </script>        
    @endsection
</x-home>
