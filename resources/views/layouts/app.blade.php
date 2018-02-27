<html>
   
   <head>
		<title>@yield('title')</title>
		<link rel="stylesheet" href="/css/app.css">
		<meta charset="utf-8">
		<meta name="robots" content="all,follow">
		<meta name="googlebot" content="index,follow,snippet,archive">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="">

		<link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

		<!-- styles -->

		<link href="{{ URL::asset('assets/css/font-awesome.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('assets/css/animate.min.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
		<link href="{{ URL::asset('assets/css/owl.theme.css') }}" rel="stylesheet">

		<!-- theme stylesheet -->
		<link href="{{ URL::asset('assets/css/style.default.css') }}" rel="stylesheet" id="theme-stylesheet">

		<!-- your stylesheet with modifications -->
		<link href="{{ URL::asset('assets/css/custom.css') }}" rel="stylesheet">

		<script src="{{ URL::asset('assets/js/respond.min.js') }}"></script>

		<link rel="shortcut icon" href="{{ URL::asset('assets/img/favicon.png') }}">


   </head>
   
   <body>
   @if(Session::has('userid'))
	@include('inc.header_loged')
   @else
	@include('inc.header')
   @endif
	
      
      <div class = "container">
		@include('inc.messages')
        @yield('content')
      </div>
   @include('inc.footer')
   </body>
</html>
