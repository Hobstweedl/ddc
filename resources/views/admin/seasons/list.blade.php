<table class="table is-narrow is-striped" id="seasonTable">
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Publicly Display?</th>
            <th>Type</th>
            <th>Prorate?</th>
            <th>Charge for Holidays?</th>
            <th>Charge Reg. Fee?</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody class="sortable" data-entityname="seasons">
        @foreach ($seasons as $season)
            <tr data-itemid="{{$season->id}}">
                <td class="sortable-handle"><i class="fa fa-bars" aria-hidden="true"></i></td>
                <th>{{$season->Name}}</th>
                <td>{{ \Carbon\Carbon::parse($season->StartDate)->format('m/d/Y')}}</td>
                <td>{{ \Carbon\Carbon::parse($season->EndDate)->format('m/d/Y')}}</td>
                <td>@if ($season->Viewable == 1) Yes @else No @endif</td>
                <td>@if ($season->SeasonType == 1) Weekly Series @else Date Specific @endif</td>
                <td>@if ($season->ProrateOnEnrollment == 1) Yes @else No @endif</td>
                <td>@if ($season->ChargeForHolidays == 1) Yes @else No @endif</td>
                <td>@if ($season->ChargeRegistrationFee == 1) Yes @else No @endif</td>
                <td><a href="/seasons/{{$season->id}}/edit">Edit</a></td>
                <td><a href="/seasons/{{$season->id}}/delete" onclick="return confirm('Are you sure you want to archive this season and all associated classes, enrollments, and all other associated objects?');">Archive</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@section('javascript')
<script src="/js/season-sort.js"></script>
@endsection