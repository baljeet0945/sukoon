<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="Davur - Restaurant Bootstrap Admin Dashboard + FrontEnd" />
	<meta property="og:title" content="Davur - Restaurant Bootstrap Admin Dashboard + FrontEnd" />
	<meta property="og:description" content="Davur - Restaurant Bootstrap Admin Dashboard + FrontEnd" />
	<meta property="og:image" content="https://davur.dexignzone.com/dashboard/social-image.png" />
	<meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title','Admin') - Sukoon</title>
    <!-- Favicon icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="{{ asset('backend/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('backend/vendor/chartist/css/chartist.min.css') }}">
	<link href="{{ asset('backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
	<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    @stack('css')

</head>

@include('shared.backend.header')

@yield('content')

@include('shared.backend.footer')

@include('shared.backend.sidebar')

<body>

     <!-- Required vendors -->
     <script src="{{ asset('backend/vendor/global/global.min.js') }}"></script>
     <script src="{{ asset('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
     <script src="{{ asset('backend/vendor/chart.js/Chart.bundle.min.js') }}"></script>
     <script src="{{ asset('backend/js/custom.min.js') }}"></script>
     <script src="{{ asset('backend/js/deznav-init.js') }}"></script>

     <!-- Counter Up -->
     <script src="{{ asset('backend/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
     <script src="{{ asset('backend/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>

     <!-- Apex Chart -->
     <script src="{{ asset('backend/vendor/apexchart/apexchart.js') }}"></script>

     <!-- Chart piety plugin files -->
     <script src="{{ asset('backend/vendor/peity/jquery.peity.min.js') }}"></script>

     <!-- Dashboard 1 -->
     <script src="{{ asset('backend/js/dashboard/dashboard-1.js') }}"></script>
     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('dist/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
     @stack('js')

     <script>
        $("document").ready(function(){
       setTimeout(function(){
          $("div#msg").remove();
       }, 3000 ); // 5 secs

    });
    </script>

 </body>
 </html>
