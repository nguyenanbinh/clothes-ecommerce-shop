<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @php
        if (env('APP_ENV') == 'production') {
           echo '<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">' ;
    }
    @endphp
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <title>
        @yield('title')
    </title>

    <link rel="icon" type="image/png" href="{{$logoSetting->favicon ?? '#'}}">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.nice-number.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.calendar.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/add_row_custon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/mobile_menu.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.exzoom.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/multiple-image-video.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/ranger_style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.classycountdown.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/venobox.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('backend/assets/modules/summernote/summernote-bs4.css')}}">
{{--    @if($settings->layout === 'RTL')--}}
{{--        <link rel="stylesheet" href="{{asset('frontend/css/rtl.css')}}">--}}
{{--    @endif--}}

</head>

<body>


<!--=============================
  DASHBOARD MENU START
==============================-->
<div class="wsus__dashboard_menu">
    <div class="wsusd__dashboard_user">
        <img src="{{asset(auth()->user()->image)}}" alt="img" class="img-fluid">
        <p>{{auth()->user()->name}}</p>
    </div>
</div>

<!--=============================
  DASHBOARD MENU END
==============================-->


<!--=============================
  DASHBOARD START
==============================-->
@yield('content')
<!--=============================
    DASHBOARD START
  ==============================-->


<!--============================
    SCROLL BUTTON START
  ==============================-->
<div class="wsus__scroll_btn">
    <i class="fas fa-chevron-up"></i>
</div>
<!--============================
  SCROLL BUTTON  END
==============================-->


<!--jquery library js-->
<script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
<!--bootstrap js-->
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<!--font-awesome js-->
<script src="{{asset('frontend/js/Font-Awesome.js')}}"></script>
<!--select2 js-->
<script src="{{asset('frontend/js/select2.min.js')}}"></script>
<!--slick slider js-->
<script src="{{asset('frontend/js/slick.min.js')}}"></script>
<!--simplyCountdown js-->
<script src="{{asset('frontend/js/simplyCountdown.js')}}"></script>
<!--product zoomer js-->
<script src="{{asset('frontend/js/jquery.exzoom.js')}}"></script>
<!--nice-number js-->
<script src="{{asset('frontend/js/jquery.nice-number.min.js')}}"></script>
<!--counter js-->
<script src="{{asset('frontend/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.countup.min.js')}}"></script>
<!--add row js-->
<script src="{{asset('frontend/js/add_row_custon.js')}}"></script>
<!--multiple-image-video js-->
<script src="{{asset('frontend/js/multiple-image-video.js')}}"></script>
<!--sticky sidebar js-->
<script src="{{asset('frontend/js/sticky_sidebar.js')}}"></script>
<!--price ranger js-->
<script src="{{asset('frontend/js/ranger_jquery-ui.min.js')}}"></script>
<script src="{{asset('frontend/js/ranger_slider.js')}}"></script>
<!--isotope js-->
<script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
<!--venobox js-->
<script src="{{asset('frontend/js/venobox.min.js')}}"></script>
<!--classycountdown js-->
<script src="{{asset('frontend/js/jquery.classycountdown.js')}}"></script>
<script src="{{asset('frontend/js/toastr.min.js')}}"></script>
<script src="{{asset('backend/assets/js/datatables.min.js')}}"></script>
<script src="{{asset('backend/assets/modules/moment.min.js')}}"></script>
<script src="{{asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('backend/assets/modules/summernote/summernote-bs4.js')}}"></script>
<!--main/custom js-->
<script src="{{asset('frontend/js/main.js')}}"></script>

<!-- Show Dynamic Validation Erros-->
<script>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error("{{$error}}")
    @endforeach
    @endif
</script>
<!-- date picker -->
<script>
    /**  summernote **/
    $('.summernote').summernote({
        height:150
    });

</script>
<script>
    $('.datepicker').daterangepicker({
        locale: {
            format: 'YYYY-MM-DD'
        },
        singleDatePicker: true
    });
</script>

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
@stack('scripts')
</body>

</html>
