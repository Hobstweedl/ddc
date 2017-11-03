@extends ('layouts.master')

@section ('content')
		@foreach ($families as $family)
		<li>
			{{ $family->LastName}}
		</li>
	@endforeach
@endsection
