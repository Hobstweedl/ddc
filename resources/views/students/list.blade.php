<div class="card">
  <div class="card-content">
    <div class="content">
      <h3>Active Students</h3>
      <ul>
        @foreach ($students->sortBy('Last') as $student)
          <li style="list-style:none;">
            <p>
              <i class="fa fa-user" aria-hidden="true"></i>
              <a href="/students/{{$student->id}}">{{$student->First . ' ' . $student->Last}}</a>
              {{\Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::parse($student->Birthday))}}, {{$student->gender()}}
            </p>
          </li>
        @endforeach
      </ul>
      <hr>
      @if (count($inactiveStudents) > 0)
        <h3>Inactive Students</h3>
        <ul>
          @foreach ($inactiveStudents as $student)
            <li style="list-style:none;">
              <p>
                <i class="fa fa-user has-text-grey" aria-hidden="true"></i>
                <a href="/students/{{$student->id}}">{{$student->First . ' ' . $student->Last}}</a>
                {{\Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::parse($student->Birthday))}}, {{$student->gender()}}
              </p>
            </li>
          @endforeach
        </ul>
      @endif
    </div>
  </div>
</div>
