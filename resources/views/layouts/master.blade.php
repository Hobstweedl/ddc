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

	<div class="container is-fluid">
		<div class="columns">
			<div class="column is-2">
				@include('layouts.sidenav')
			</div>
			<div class="column is-10">
				@yield('content')
			</div>
		</div>

	@include('layouts.footer')
</body>
</html>