<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
          content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>jjj</title>

	<link rel="icon" type="image/png" href='{{asset("vendor/images/icons/favicon.ico")}}'/>
	<link rel="stylesheet" type="text/css" href='{{asset("vendor/vendor/bootstrap/css/bootstrap.min.css")}}' />

	<link rel="stylesheet" type="text/css" href='{{asset("vendor/fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}' />
	<link rel="stylesheet" type="text/css" href='{{asset("vendor/vendor/animate/animate.css")}}' />
	<link rel="stylesheet" type="text/css" href='{{asset("vendor/vendor/css-hamburgers/hamburgers.min.css")}}' />

	<link rel="stylesheet" type="text/css" href='{{asset("vendor/vendor/select2/select2.min.css")}}' />
	<link rel="stylesheet" type="text/css" href='{{asset("vendor/css/util.css")}}' />
	<link rel="stylesheet" type="text/css" href='{{asset("vendor/css/main.css")}}' />

    {{-- vvvvvvvvvv --}}

</head>
<body>
    <div class="cont">
    @yield('content')
    </div>
	<script src='{{asset("vendor/jquery/jquery-3.2.1.min.js")}}'></script>

	<script src='{{asset("vendor/bootstrap/js/popper.js")}}'></script>
	<script src='{{asset("vendor/bootstrap/js/bootstrap.min.js")}}'></script>

	<script src='{{asset("vendor/select2/select2.min.js")}}'></script>

	<script src='{{asset("vendor/tilt/tilt.jquery.min.js")}}'></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

	<script src='{{asset("js/main.js")}}'></script>

    {{-- src='{{asset("assets/admin/js/scripts/modal/components-modal.js")}}'  --}}
</body>
</html>
