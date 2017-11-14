@if ($errors->any())
<div class="notification is-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@foreach (['danger', 'warning', 'success', 'info', 'primary'] as $msg)
  	@if(Session::has('alert-' . $msg))
  	<div class="notification is-{{ $msg }}">
  		<p class="subtitle is-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
  	</div>
  	@endif
    <script>
        $('.notification').delay(5000).slideUp(500);
    </script>
@endforeach