<table class="table is-fullwidth">
    <tbody>
    @foreach ($locationTypes as $locationType)
        <tr>
            <th>{{$locationType->Type}}</th>
            <td><a href="/admin/locations/{{$locationType->id}}/edit">Edit</a></td>
            <td><a href="/admin/locations/{{$locationType->id}}/delete" onclick="return confirm('Are you sure you want to archive this location?');">Archive</a></td>
        </tr>
    @endforeach
    </tbody>
</table>