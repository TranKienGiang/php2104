<x-home>
    @section('section')
    @include('includes.map-contact')
    @include('includes.section-contact')
    @endsection
    @section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.send').click(function(e) {
                e.preventDefault();
                var name = $('.name').val(),
                    email = $('.email').val(),
                    message = $('.message').val();
                var url = "{{ route('newmail') }}";
                $.ajax(url, {
                    type: 'POST',
                    data: {
                        name: name,
                        email: email,
                        message: message,
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