@extends('layouts.master')

@section('content')
	<h1 class="title">
		{{$season->Name}}
	</h1>
	<ul>
	@foreach ($season->classes as $class)
		<li>
			{{$class->Name}}
		</li>
	@endforeach
	</ul>
	
@endsection