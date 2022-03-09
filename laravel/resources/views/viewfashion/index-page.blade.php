<x-home>
    @section('section')
    <!-- Hero Section Begin -->
    @include('includes.section-overlay')
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    @include('includes.section-banner')
    <!-- Banner Section End -->
    
    <!-- Product Section Begin -->
    @include('includes.section-product')
    <!-- Product Section End -->

    <!-- Categories Section Begin -->
    @include('includes.section-categories')
    <!-- Categories Section End -->

    <!-- Instagram Section Begin -->
    @include('includes.section-instagram') 
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    @include('includes.section-blog') 
    <!-- Latest Blog Section End -->
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