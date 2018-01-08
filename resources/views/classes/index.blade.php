@extends('layouts.master')

@section('content')
	<div class="card">
		<div class="card-content">
			<div class="content">
				<div class="tabs">
					<ul>
					@foreach ($seasons as $seasonTemp)
						<li {{ $season->id === $seasonTemp->id ? 'class="is-active"' : '' }}>
							<a href="{{ route('classes.season', $seasonTemp->id) }}">{{$seasonTemp->Name}}</a>
						</li>
					@endforeach
					</ul>
				</div>
				@if ($season->SeasonType === 1)
					<div class="columns">
					@foreach ($daysOfWeek as $day)
						<div class="column">
							<p class="menu-label">{{$day}}</p>
						@foreach ($classes as $class)
							@if ($class->DayHeldOn == $day)
								<p class="is-size-6 is-paddingless is-marginless">
									<a href="{{ route('classes.show', $class->id) }}">{{ $class->Name}}</a>
								</p>
								<p class="is-size-7 is-paddingless is-marginless">
									<span style="display:inline-block;">
										<i class="fa fa-clock-o" aria-hidden="true"></i> {{$class->friendlyTime($class)}} to {{$class->endTime($class)}}</span> /
									<span style="display:inline-block;">
										<i class="fa fa-user-circle" aria-hidden="true"></i> {{$class->instructor->Display}}</span> /
									<span style="display:inline-block;">
										<i class="fa fa-map-marker" aria-hidden="true"></i> {{$class->location->Type}}</span> /
									<span style="display:inline-block;">
										<i class="fa fa-user" aria-hidden="true"></i> Ages {{$class->AgeFrom}} to {{$class->AgeTo}}</span>
								</p>
								<hr/>
							@endif
						@endforeach
						</div>
					@endforeach
					</div>
				@elseif ($season->SeasonType === 2)
					<div class="tabs">
						<ul>
							<li id="list-li" class="is-active toggle-tabs">
								<a onclick="toggleDisplay()">List View</a>
							</li>
							<li id="cal-li" class="toggle-tabs">
								<a onclick="toggleDisplay('calendar')">Calendar View</a>
							</li>
						</ul>
					</div>
					@include('classes._list')
					<div id="calendar-view" class="toggled-views">
						@php
							$today = \Carbon\Carbon::parse('today');
              $start = \Carbon\Carbon::parse($today)->startOfMonth();
              $end = \Carbon\Carbon::parse($today)->endOfMonth();

              $dates = [];
              while ($start->lte($end)) {
                  $dates[] = $start->copy();
                  $start->addDay();
              }
              $keepTrackOfDay = 0;
              $fillBeginningOfMonth = 1;
						@endphp
						<h3 class="is-3">{{$today->format('F Y')}}</h3>
						@include('layouts.calendar', [$dates, $monthToShow])
						@foreach ($dates as $date)
							@foreach ($classes as $class)
								<script type="text/javascript">
                                    var classContent = '<p class="is-size-6 is-paddingless is-marginless"><a href="/classes/{{$class->id}}">{{ $class->Name}}</a></p>';
                                    classContent += '<p class="is-size-7 is-paddingless is-marginless">';
                                    classContent += '<span style="display:inline-block;"><i class="fa fa-user-circle" aria-hidden="true"></i> {{$class->instructor->Display}}</span> /';
                                    classContent += '<span style="display:inline-block;"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$class->location->Type}}</span> /';
                                    classContent += '<span style="display:inline-block;"><i class="fa fa-user" aria-hidden="true"></i> Ages {{$class->AgeFrom}} to {{$class->AgeTo}}</span>';
									@foreach ($class->dates as $classdate)
										@if (\Carbon\Carbon::parse($classdate->HeldOn)->toDateString() == \Carbon\Carbon::parse($date)->toDateString())
										classContent += '<p class="is-size-7 is-paddingless is-marginless">';
										classContent += '<i class="fa fa-calendar-check-o" aria-hidden="true"></i>';
										classContent += '{{$classdate->friendlyTime($classdate)}} to {{$classdate->endTime($classdate)}} on {{$classdate->friendlyDate($classdate)}}';
										classContent += '</p></p>';
										$('#{{\Carbon\Carbon::parse($date)->toDateString()}}').html(classContent);
										@endif
									@endforeach
								</script>
							@endforeach
						@endforeach
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection


@section('scripts')
	<script>
		//	Don't read too much into this. Just some simple JS
		//	to toggle displays. I'll clean it up considerably later.
		toggleDisplay();
		function toggleDisplay(type){
			const eles = document.getElementsByClassName('toggled-views');
			const tabs = document.getElementsByClassName('toggle-tabs');

			for (const [key, value] of Object.entries(tabs)) {
			  value.classList.remove('is-active');
			}
			for (let i = 0; i < eles.length; i++){
				eles[i].style.display = 'none';
			}

			switch (type) {
				case 'calendar':
				eles[1].style.display = 'block';
				document.getElementById('cal-li').classList.add('is-active');
				break;

				default:
				eles[0].style.display = 'block';
				document.getElementById('list-li').classList.add('is-active');
				break;
			}
		}
	</script>
@endsection
