@extends('layouts.master')

@section('content')
	<div class="tabs is-boxed">
		<ul>
		@foreach ($seasons as $season)
			<li><a href="/classes/season/{{$season->id}}">{{$season->Name}}</a></li>
		@endforeach
		</ul>
	</div>
	@foreach ($classes as $class)
		<li>
			<a href="/classes/{{$class->id}}">{{ $class->Name}}</a>
		</li>
	@endforeach
@endsection