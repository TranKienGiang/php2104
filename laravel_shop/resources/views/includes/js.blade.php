<script src="/fashion/js/jquery-3.3.1.min.js"></script>
<script src="/fashion/js/bootstrap.min.js"></script>
<script src="/fashion/js/jquery.nice-select.min.js"></script>
<script src="/fashion/js/jquery.nicescroll.min.js"></script>
<script src="/fashion/js/jquery.magnific-popup.min.js"></script>
<script src="/fashion/js/jquery.countdown.min.js"></script>
<script src="/fashion/js/jquery.slicknav.js"></script>
<script src="/fashion/js/mixitup.min.js"></script>
<script src="/fashion/js/owl.carousel.min.js"></script>
<script src="/fashion/js/main.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    });
</script>