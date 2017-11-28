<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>Studio Management</title>
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css">-->
	@include('layouts.scripts')
</head>
<body>
	@include('layouts.header')
	@include('layouts.messages')

	<section class="section">
		<div class="container">
			@yield('content')
		</div>
	</section>

	@include('layouts.footer')
</body>
</html>