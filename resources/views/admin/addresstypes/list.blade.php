<table class="table is-fullwidth">
    <tbody>
    @foreach ($addressTypes as $addressType)
        <tr>
            <th>{{$addressType->Type}}</th>
            <td><a href="/admin/addresstypes/{{$addressType->id}}/edit">Edit</a></td>
            <td><a href="/admin/addresstypes/{{$addressType->id}}/delete" onclick="return confirm('Are you sure you want to archive this address type?');">Archive</a></td>
        </tr>
    @endforeach
    </tbody>
</table>