<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	{{ HTML::style('styles/vendor.min.css') }}
</head>
<body>

@include('layouts.partials.header')

<div class="container">
	@yield('content')
</div>

{{ HTML::script('scripts/vendor.min.js') }}
</body>
</html>
