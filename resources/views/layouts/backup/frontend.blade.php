<!-- headers-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Martfury Ecommerce</title>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&amp;amp;subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/font-awesome/css/font-awesome.min.css ')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/fonts/Linearicons/Linearicons/Font/demo-files/demo.css ')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/bootstrap/css/bootstrap.min.css ')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/owl-carousel/assets/owl.carousel.min.css ')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/owl-carousel/assets/owl.theme.default.min.css ')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/slick/slick/slick.css ')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/nouislider/nouislider.min.css ')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/lightGallery-master/dist/css/lightgallery.min.css ')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css ')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/plugins/select2/dist/css/select2.min.css ')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css ')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/organic.css ')}}">

    <!-- Toastr css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">


</head>

<body>
    
    <div id="homepage-9">
       <!-- Header -->
        @include('frontend.body.header')
        <!--/ Header -->
        @yield('content-frontend')
        <!--end page wrapper -->
        <!-- Footer -->
        @include('frontend.body.footer')
        <!--/ Footer -->
    </div>
    
    <script src="{{ asset('frontend/assets/plugins/jquery.min.js ')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/nouislider/nouislider.min.js ')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/popper.min.js ')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/owl-carousel/owl.carousel.min.js ')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/bootstrap/js/bootstrap.min.js ')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/imagesloaded.pkgd.min.js ')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/masonry.pkgd.min.js ')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/isotope.pkgd.min.js ')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/jquery.matchHeight-min.js ')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/slick/slick/slick.min.js ')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/jquery-bar-rating/dist/jquery.barrating.min.js ')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/slick-animation.min.js ')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/lightGallery-master/dist/js/lightgallery-all.min.js ')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/sticky-sidebar/dist/sticky-sidebar.min.js ')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/select2/dist/js/select2.full.min.js ')}}"></script>
    <script src="{{ asset('frontend/assets/plugins/gmap3.min.js ')}}"></script>
    <!-- custom scripts-->
    <script src="{{ asset('frontend/assets/js/main.js')}}"></script>

    <!-- Toastr js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Sweetalert js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>





     <!-- Image Show -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

    <!-- sweetalert js-->
    <script type="text/javascript">
        $(function(){
            $(document).on('click','#delete',function(e){
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                  title: 'Are you sure?',
                  text: "Delete This Data!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = link
                  Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                  )
                }
            })

          });
        });
    </script>

    <!-- all toastr message show  Update-->
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
        }
        @endif
    </script>

    <!-- all toastr message show  old-->
    <script type="text/javascript">
        @if(Session::has('success'))
          toastr.success("{{Session::get('success')}}");
        @endif
    </script>
</body>

</html>