@extends('layouts.master')

@section('content')
	<div class="card">
		<div class="card-content">
			<div class="content">
				<div class="tabs">
					<ul>
					@foreach ($seasons as $seasonTemp)
						<li @if ($season->id == $seasonTemp->id) class="is-active" @endif><a href="/classes/season/{{$seasonTemp->id}}">{{$seasonTemp->Name}}</a></li>
					@endforeach
					</ul>
				</div>
				@if ($season->SeasonType === 1)
					<div class="columns">
					@php
					$daysOfWeek = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday')
					@endphp
					@foreach ($daysOfWeek as $day)
						<div class="column">
							<p class="menu-label">{{$day}}</p>
						@foreach ($classes as $class)
							@if ($class->DayHeldOn == $day)
								<p class="is-size-6 is-paddingless is-marginless"><a href="/classes/{{$class->id}}">{{ $class->Name}}</a></p>
								<p class="is-size-7 is-paddingless is-marginless">
									<span style="display:inline-block;"><i class="fa fa-clock-o" aria-hidden="true"></i> {{$class->friendlyTime($class)}} to {{$class->endTime($class)}}</span> /
									<span style="display:inline-block;"><i class="fa fa-user-circle" aria-hidden="true"></i> {{$class->instructor->Display}}</span> /
									<span style="display:inline-block;"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$class->location->Type}}</span> /
									<span style="display:inline-block;"><i class="fa fa-user" aria-hidden="true"></i> Ages {{$class->AgeFrom}} to {{$class->AgeTo}}</span>
								</p>
								<hr/>
							@endif
						@endforeach
						</div>
					@endforeach
					</div>
				@elseif ($season->SeasonType === 2)
					<div class="columns">
						@php
						$count = $classes->count();
						$eachColumnCount = ceil(($count)/6);
						$i = 1;
						@endphp
					@foreach ($classes as $class)
						@if ($i == 1)
							<div class="column">
						@endif
							<p class="is-size-6 is-paddingless is-marginless"><a href="/classes/{{$class->id}}">{{ $class->Name}}</a></p>
							<p class="is-size-7 is-paddingless is-marginless">
								<span style="display:inline-block;"><i class="fa fa-user-circle" aria-hidden="true"></i> {{$class->instructor->Display}}</span> /
								<span style="display:inline-block;"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$class->location->Type}}</span> /
								<span style="display:inline-block;"><i class="fa fa-user" aria-hidden="true"></i> Ages {{$class->AgeFrom}} to {{$class->AgeTo}}</span>
								@foreach ($class->dates as $classdate)
									<p class="is-size-7 is-paddingless is-marginless">
										<i class="fa fa-calendar-check-o" aria-hidden="true"></i>
										{{$classdate->friendlyTime($classdate)}} to {{$classdate->endTime($classdate)}} on {{$classdate->friendlyDate($classdate)}}
									</p>
								@endforeach
							</p>
							<hr/>

							@if ($eachColumnCount == $i)
								</div>
								@php
								$i = 1;
								@endphp
							@else
								@php
									$i = $i+1;
								@endphp
							@endif
					@endforeach
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection