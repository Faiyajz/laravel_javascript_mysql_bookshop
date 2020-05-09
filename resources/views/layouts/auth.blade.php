<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <!-- Main CSS-->
	<link href="{{ asset('css/paperbackbd.bundle.css') }}" rel="stylesheet">


</head>

<body>

	@yield('content')


    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('js/paperbackbd.bundle.js') }}" ></script>


</body>

</html>
