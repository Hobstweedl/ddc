<table class="table is-fullwidth">
    <thead>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
    </thead>
    <tbody>
    @foreach($students->sortBy('Last') as $student)
        <tr>
            <td><a href="/students/{{$student->id}}">{{$student->First . ' ' . $student->Last}}</a></td>
            <td>{{\Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::parse($student->Birthday))}}</td>
            <td>{{$student->gender()}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
