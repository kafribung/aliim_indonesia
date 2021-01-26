<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{-- Favicon --}}
	@include('includes.favicon')
	{{-- Bootstrap --}}
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
	{{-- Fontawesome --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('log/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	{{-- Main Css --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('log/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('log/css/main.css') }}">
	{{-- Vue Js --}}
	@stack('after_css')
</head>
<body>
	@yield('content')
	
	{{-- Jquery --}}
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
	{{-- Bootstrap --}}
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
	{{-- Main Js --}}
	<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>