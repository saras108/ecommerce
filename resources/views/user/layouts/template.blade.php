<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.minimalthemes.net/shopping-static/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Sep 2018 11:06:35 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Theme</title>

    <!-- Fonts -->
    <link href= "{{ asset('client/fonts.googleapis.com/css59d5.css?family=Ubuntu:400,400italic,700') }}" rel='stylesheet'
          type='text/css'>
    <link href="{{ asset('client/fonts.googleapis.com/cssa7dc.css?family=Pacifico') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('client/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link href="{{ asset('client/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('client/style.css') }}"/>

    <!-- owl Style -->
    <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.css') }}"/>
    <link rel="stylesheet" href="{{ asset('client/css/owl.transitions.css') }}"/>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
@include('user.layouts.header.top_header')
@include('user.layouts.header.main_nav')

@yield('content')

@include('user.layouts.footer.footer_widge')
@include('user.layouts.footer.footer')


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('client/ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('client/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- map -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
     <script type="text/javascript" src="{{ asset('client/js/jquery.ui.map.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client/js/demo.js') }}"></script>

    <!-- owl carousel -->
    <script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>

    <!-- rating -->
    <script src="{{ asset('client/js/rate/jquery.raty.js') }}"></script>
    <script src="{{ asset('client/js/labs.js" type="text/javascript') }}"></script>

    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="{{ asset('client/js/product/lib/jquery.mousewheel-3.0.6.pack.js') }}"></script>

    <!-- fancybox -->
    <script type="text/javascript" src="{{ asset('client/js/product/jquery.fancybox8cbb.js?v=2.1.5') }}"></script>

    <!-- custom js -->
    <script src="{{ asset('client/js/shop.js') }}"></script>

    @yield('footer-script')

</div>
</body>

<!-- Mirrored from demo.minimalthemes.net/shopping-static/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Sep 2018 11:07:21 GMT -->
</html>
