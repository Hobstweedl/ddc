<table class="table">
    <thead>
        <tr>
            <th class="menu-label">Sunday</th>
            <th class="menu-label">Monday</th>
            <th class="menu-label">Tuesday</th>
            <th class="menu-label">Wednesday</th>
            <th class="menu-label">Thursday</th>
            <th class="menu-label">Friday</th>
            <th class="menu-label">Saturday</th>
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
