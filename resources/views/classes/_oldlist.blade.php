<div class="columns" id="date-specific-class-list-view">
  @php
  $count = $classes->count();
  $eachColumnCount = ceil(($count)/6);
  $i = 1;
  $trackTotal = 1;
  @endphp
@foreach ($classes as $class)
  @if ($i == 1)
  <div class="column">
  @endif
    <p class="is-size-6 is-paddingless is-marginless">
      <a href="{{ route('classes.show', $class->id) }}">{{ $class->Name}}</a>
    </p>
    <p class="is-size-7 is-paddingless is-marginless">
      <span style="display:inline-block;">
        <i class="fa fa-user-circle" aria-hidden="true"></i>
        {{$class->instructor->Display}}
      </span> /
      <span style="display:inline-block;">
        <i class="fa fa-map-marker" aria-hidden="true"></i>
        {{$class->location->Type}}
      </span> /
      <span style="display:inline-block;">
        <i class="fa fa-user" aria-hidden="true"></i>
        Ages {{$class->AgeFrom}} to {{$class->AgeTo}}
      </span>
      @foreach ($class->dates as $classdate)
        <p class="is-size-7 is-paddingless is-marginless">
          <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
          {{$classdate->friendlyTime($classdate)}} to {{$classdate->endTime($classdate)}} on {{$classdate->friendlyDate($classdate)}}
        </p>
      @endforeach
    </p>
    <hr/>

    @if ($eachColumnCount == $i || $trackTotal == $count)
      </div>
    @php
      $i = 1;
      $trackTotal = $trackTotal + 1;
    @endphp
    @else
    @php
      $i = $i+1;
      $trackTotal = $trackTotal + 1;
    @endphp
    @endif
@endforeach
</div>
