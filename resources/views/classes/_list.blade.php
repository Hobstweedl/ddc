<div class="container is-fluid toggled-views">
  <table class="table is-striped is-hoverable">
    <thead>
      <tr>
        <th>Name</th>
        <th>Instructor</th>
        <th>Location</th>
        <th>Ages</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($classes as $class)
        <tr>
          <td>{{ $class->Name }} </td>
          <td>{{ $class->instructor->Display }}</td>
          <td>{{ $class->location->Type }}</td>
          <td>{{ $class->AgeFrom }} - {{ $class->AgeTo }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
