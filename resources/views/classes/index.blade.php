@extends('layouts.master')

@section('content')
	@foreach ($classes as $class)
		<li>
			<a href="/classes/{{$class->id}}">{{ $class->Name}}</a>
		</li>
	@endforeach
@endsection