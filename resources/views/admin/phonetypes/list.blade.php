<table class="table is-fullwidth">
    <tbody>
    @foreach ($phoneTypes as $phoneType)
        <tr>
            <th>{{$phoneType->Type}}</th>
            <td><a href="/admin/phonetypes/{{$phoneType->id}}/edit">Edit</a></td>
            <td><a href="/admin/phonetypes/{{$phoneType->id}}/delete" onclick="return confirm('Are you sure you want to archive this phone type?');">Archive</a></td>
        </tr>
    @endforeach
    </tbody>
</table>