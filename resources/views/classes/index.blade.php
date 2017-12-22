@extends('layouts.master')

@section('content')
	<div class="tabs is-boxed">
		<ul>
		@foreach ($seasons as $season)
			<li><a href="/classes/season/{{$season->id}}">{{$season->Name}}</a></li>
		@endforeach
		</ul>
	</div>
	@if ($season->SeasonType == 1)
		<div class="columns">
		@php
		$daysOfWeek = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday')
		@endphp
		@foreach ($daysOfWeek as $day)
			<div class="column">
				<h6 class="subtitle is-6">{{$day}}</h6>
			@foreach ($classes as $class)
				@if ($class->DayHeldOn == $day)
					<p class="is-size-7"><a href="/classes/{{$class->id}}">{{ $class->Name}}</a></p>
					<p class="is-size-7"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$class->StartTime}}</p>
					<p class="is-size-7"><i class="fa fa-user-circle" aria-hidden="true"></i> {{$class->instructor->Display}}</p>
					<p class="is-size-7"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$class->location->Type}}</p>
					<p class="is-size-7"><i class="fa fa-user" aria-hidden="true"></i> Ages {{$class->AgeFrom}} to {{$class->AgeTo}}</p>
					<hr/>
				@endif
			@endforeach
			</div>
		@endforeach
		</div>
	@elseif ($season->SeasonType == 2)

	@endif
@endsection