<!DOCTYPE html>

<html>
	<head>
		<title>FOS - Full Of Sh... Stock :) @yield('title')</title>
		<!-- CSS are placed here -->
        {{ HTML::style('css/bootstrap.css') }}
        {{ HTML::style('css/bootstrap-theme.css') }}
		{{ HTML::style('css/main.css') }}
		{{ HTML::script('js/main.js') }}
	</head>

	<body>
		@include('layout.nav')
		<div class="container">
		<h1>@yield('header')</h1>

		@yield('content')
		</div>

		<!-- Scripts are placed here -->
        {{ HTML::script('js/jquery-1.11.1.min.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
	</body>

</html>