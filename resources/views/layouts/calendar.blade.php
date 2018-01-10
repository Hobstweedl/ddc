@php
    $fillBeginningOfMonth = 1;
@endphp

<div class="calendar is-large">
  <div class="calendar-nav">
    <div class="calendar-nav-left">
      <button class="button is-text">
        <a href="{{ route('classes.season', $season->id) }}?month={{\Carbon\Carbon::parse($monthToShow)->addMonths(-1)->format('mY')}}"><i class="fa fa-chevron-left"></i></a>
      </button>
    </div>
    <div>{{$monthToShow->format('F Y')}}</div>
    <div class="calendar-nav-right">
      <button class="button is-text">
        <a href="{{ route('classes.season', $season->id) }}?month={{\Carbon\Carbon::parse($monthToShow)->addMonths(1)->format('mY')}}"><i class="fa fa-chevron-right"></i></a>
      </button>
    </div>
  </div>
  <div class="calendar-container">
    <div class="calendar-header">
      <div class="calendar-date">Sunday</div>
      <div class="calendar-date">Monday</div>
      <div class="calendar-date">Tuesday</div>
      <div class="calendar-date">Wednesday</div>
      <div class="calendar-date">Thursday</div>
      <div class="calendar-date">Friday</div>
      <div class="calendar-date">Saturday</div>
    </div>
    <div class="calendar-body">
      @foreach ($dates as $date)
        @if ($fillBeginningOfMonth == 1)
          @php
            $currentDay = \Carbon\Carbon::parse($date)->dayOfWeek;
          @endphp
          @for ($i = 0; $i < $currentDay; $i++)
            <div class="calendar-date is-disabled"></div>
          @endfor
          @php
            $fillBeginningOfMonth = 0;
          @endphp
        @endif
        <div class="calendar-date">
          <button class="date-item">{{\Carbon\Carbon::parse($date)->day}}</button>
          <div class="calendar-events" id="{{\Carbon\Carbon::parse($date)->toDateString()}}">
          </div>
        </div>
        @if (\Carbon\Carbon::parse($date)->toDateString() == \Carbon\Carbon::parse($date)->endOfMonth()->toDateString())
          @php
            $currentDay = \Carbon\Carbon::parse($date)->dayOfWeek;
          @endphp
          @for ($i = 6; $currentDay < $i; $i--)
            <div class="calendar-date is-disabled"></div>
          @endfor
        @endif
      @endforeach
    </div>
  </div>
</div>

