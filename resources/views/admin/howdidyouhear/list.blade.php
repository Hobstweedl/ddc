<table class="table is-fullwidth">
    <tbody>
    @foreach ($howDidYouHearTypes as $howDidYouHearType)
        <tr>
            <th>{{$howDidYouHearType->Type}}</th>
            <td><a href="/admin/howdidyouhear/{{$howDidYouHearType->id}}/edit">Edit</a></td>
            <td><a href="/admin/howdidyouhear/{{$howDidYouHearType->id}}/delete" onclick="return confirm('Are you sure you want to archive this type?');">Archive</a></td>
        </tr>
    @endforeach
    </tbody>
</table>