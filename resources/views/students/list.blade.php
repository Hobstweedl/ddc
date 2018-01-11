<div class="card">
  <div class="card-content">
    <div class="content">
      <h5 class="title is-5">Active Students</h5>
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
      <div class="is-divider"></div>
      @if (count($inactiveStudents) > 0)
        <h5 class="title is-5">Inactive Students</h5>
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
