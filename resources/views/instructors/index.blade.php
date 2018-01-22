@extends('layouts.master')

@section('content')
  <div class="columns">
    <div class="column is-narrow">
      @include('instructors.list')
    </div>
    <div class="column is-four-fifths">
      <div class="columns">
        @if (isset($instructor))
          <div class="column is-half">
            <div class="box">
              @include('instructors.edit', $instructor)
            </div>
          </div>
          <div class="column is-half">
            <div class="box">
              <h5 class="title is-5"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Classes</h5>
              @foreach($instructor->classes as $class)
                @if ($class->season->SeasonType == 2)
                  <p style="display:inline-block;"><a href="/classes/{{$class->id}}">{{ $class->Name}}</a> /
                  <p class="is-size-7" style="display:inline-block;">
                    <span style="display:inline-block;">
                      &nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i> {{$class->location->Type}}
                    </span> /
                    <span style="display:inline-block;">
                      <i class="fa fa-user" aria-hidden="true"></i> Ages {{$class->AgeFrom}} to {{$class->AgeTo}}
                    </span>
                  </p>
                  </p>
                  @foreach ($class->dates as $classdate)
                    <p class="is-size-7 is-paddingless is-marginless">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                      {{$classdate->friendlyTime($classdate)}} to {{$classdate->endTime($classdate)}}
                      on {{$classdate->friendlyDate($classdate)}}
                      <span class="tag is-light">{{$classdate->enrollments()->count()}}</span>
                    </p>
                  @endforeach
                @endif
                @if ($class->season->SeasonType == 1)
                  <p><a href="{{ route('classes.show', $class->id) }}">{{ $class->Name}}</a></p>
                  <p class="is-size-7">
                    <span style="display:inline-block;">
										  <i class="fa fa-clock-o" aria-hidden="true"></i>
                      &nbsp;{{$class->DayHeldOn}} {{$class->friendlyTime($class)}}
                      &nbsp;to {{$class->endTime($class)}}
                      &nbsp;from {{$class->season->friendlyDate($class->season->StartDate)}}
                      &nbsp;to {{$class->season->friendlyDate($class->season->EndDate)}}
                    </span> /
                    <span style="display:inline-block;">
										  <i class="fa fa-map-marker" aria-hidden="true"></i> {{$class->location->Type}}
                    </span> /
                    <span style="display:inline-block;">
										  <i class="fa fa-user" aria-hidden="true"></i> Ages {{$class->AgeFrom}} to {{$class->AgeTo}}
                    </span>
                    <span class="tag is-light">{{$class->enrollments()->count()}}</span>
                  </span>
                  </p>
                @endif
              @endforeach

            </div>
            <div class="box">
              <h5 class="title is-5"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Notes</h5>
              @foreach($instructor->notes as $note)
                {{$note->Content}}
              @endforeach
              <div class="control">
                <a class="button is-primary" href="#">Add Note</a>
              </div>
            </div>
          </div>
        @else
          <div class="column">
            <div class="box">
              @include('instructors.create')
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection
