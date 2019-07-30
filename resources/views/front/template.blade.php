<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('pageTitle')</title>
		<link rel="stylesheet" href="/css/app.css">
		<link rel="stylesheet" href="/css/styles.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	</head>

	@include('front.navbar')

	<!-- body-content -->
	<body>

	@yield('mainSection')


	</body>
	<!-- /body-content -->

	@include('front.footer')

</html>
