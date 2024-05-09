<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src={{ asset('template/vendors/@popperjs/popper.min.js') }}></script>
<script src={{ asset('plugins/owl-carousel/dist/owl.carousel.min.js') }}></script>
{{-- <script src={{ asset('plugins/bootstrap-5-floating-action-button/js/script.js') }}></script> --}}
<script src={{ asset('template/vendors/bootstrap/bootstrap.min.js') }}></script>
<script src={{ asset('template/vendors/is/is.min.js') }}></script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
<script src={{ asset('template/vendors/fontawesome/all.min.js') }}></script>
<script src={{ asset('template/assets/js/theme.js') }}></script>

<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&amp;display=swap"
    rel="stylesheet">


<script src="{{ asset('plugins/owl-carousel/docs/assets/vendors/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/owl-carousel/dist/owl.carousel.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
 
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 3, 
                }
            }
        });
    });
</script>
