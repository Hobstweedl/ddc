<div class="card">
    <div class="card-content">
        <div class="content">
            @foreach ($students->sortBy('Last') as $student)
                <li style="list-style:none;">
                    <span><i class="fa fa-user" aria-hidden="true"></i> <a href="/students/{{$student->id}}">{{$student->First . ' ' . $student->Last}}</a></span>
                    <span class="is-size-7">{{\Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::parse($student->Birthday))}}, {{$student->gender()}}</span>
                </li>
            @endforeach

            @if (count($inactiveStudents) > 0)
                Inactive Students
                @foreach ($inactiveStudents as $student)
                <li style="list-style:none;">
                    <span><i class="fa fa-user has-text-grey" aria-hidden="true"></i> <a href="/students/{{$student->id}}">{{$student->First . ' ' . $student->Last}}</a>
                        {{\Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::parse($student->Birthday))}}, {{$student->gender()}}</span>
                </li>
                @endforeach
            @endif
        </div>
    </div>
</div>
