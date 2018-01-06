@php
    $keepTrackOfDay = 0;
    $fillBeginningOfMonth = 1;
@endphp
<nav class="level">
    <div class="level-item"></div>
    <div class="level-item has-text-centered">
        <h5 class="is-5"><a href="{{ route('classes', $season) }}?month={{\Carbon\Carbon::parse($monthToShow)->addMonths(-1)->format('mY')}}"><i class="fa fa-caret-left" aria-hidden="true"></i> {{\Carbon\Carbon::parse($monthToShow)->addMonths(-1)->format('F Y')}}</a></h5>
    </div>
    <div class="level-item has-text-centered">
        <h3 class="is-3">{{$monthToShow->format('F Y')}}</h3>
    </div>
    <div class="level-item has-text-centered">
        <h5 class="is-5"><a href="{{ route('classes', $season) }}?month={{\Carbon\Carbon::parse($monthToShow)->addMonths(1)->format('mY')}}">{{\Carbon\Carbon::parse($monthToShow)->addMonths(1)->format('F Y')}} <i class="fa fa-caret-right" aria-hidden="true"></i></a></h5>
    </div>
    <div class="level-item"></div>
</nav>

<table class="table ">
    <thead>
        <tr>
            <th class="menu-label" style="width: 14.28%">Sunday</th>
            <th class="menu-label" style="width: 14.28%">Monday</th>
            <th class="menu-label" style="width: 14.28%">Tuesday</th>
            <th class="menu-label" style="width: 14.28%">Wednesday</th>
            <th class="menu-label" style="width: 14.28%">Thursday</th>
            <th class="menu-label" style="width: 14.28%">Friday</th>
            <th class="menu-label" style="width: 14.28%">Saturday</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dates as $date)
            @if ($keepTrackOfDay == 0)
                <tr>
            @endif
            @if ($fillBeginningOfMonth == 1)
                @php
                $currentDay = \Carbon\Carbon::parse($date)->dayOfWeek;
                @endphp
                @for ($i = 0; $i < $currentDay; $i++)
                    <td></td>
                    @php
                        $keepTrackOfDay += 1;
                    @endphp
                @endfor
                @php
                    $fillBeginningOfMonth = 0;
                @endphp
            @endif
                <td>
                    <h5 class="is-5">{{\Carbon\Carbon::parse($date)->day}}</h5>
                    <div id="{{\Carbon\Carbon::parse($date)->toDateString()}}"></div>
                </td>
            @if ($keepTrackOfDay == 6)
                </tr>
                @php
                    $keepTrackOfDay = 0;
                @endphp
            @else
                @php
                    $keepTrackOfDay += 1;
                @endphp
            @endif
        @endforeach
    </tbody>
</table>
