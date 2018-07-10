<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | {{ config('app.name') }}</title>
    <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/prettyPhoto.css") }}" rel="stylesheet">

    <link href="{{ asset("css/price-range.css") }}" rel="stylesheet">
    <link href="{{ asset("css/animate.css") }}" rel="stylesheet">
    <link href="{{ asset("css/main.css") }}" rel="stylesheet">
    <link href="{{ asset("css/responsive.css") }}" rel="stylesheet">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{ asset("js/html5shiv.js") }}"></script>
    <script src="{{ asset("js/respond.min.js") }}"></script>
    <link rel="shortcut icon" href="{{ asset("images/ico/favicon.ico") }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset("images/ico/apple-touch-icon-144-precomposed.png") }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset("images/ico/apple-touch-icon-114-precomposed.png") }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset("images/ico/apple-touch-icon-72-precomposed.png") }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset("images/ico/apple-touch-icon-57-precomposed.png") }}">
</head><!--/head-->

<body>


    @include('frontend.partials.header')

        @yield('content')
    @include('frontend.partials.footer')

        @yield('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{ asset("js/jquery.js") }}"></script>
    <script src="{{ asset("js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("js/jquery.scrollUp.min.js") }}"></script>
    <script src="{{ asset("js/price-range.js") }}"></script>
    <script src="{{ asset("js/jquery.prettyPhoto.js") }}"></script>
    <script src="{{ asset("js/main.js") }}"></script>
    <script src="{{ asset("js/jquery.priceformat.min.js") }}"></script>
    <script async defer src="http://maps.google.com/maps/api/js?key=AIzaSyD1Tr2NGwYDmJrdZlh0SPnAa3LetdVRif0&callback=initMap"></script>
    <script src="{{ asset("js/contact.js") }}"></script>
    <script>
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            var uluru = {lat: -7.640087, lng: 111.537838};
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('gmap'), {zoom: 16, center: uluru});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: uluru, map: map});
        }
    </script>
	


</body>
