@extends('layouts.master')

@section('content')
<div class="columns">
	<div class="column is-one-quarter">
		@include('families.list')
	</div>
	<div class="column">
		<div class="box">
			@if (isset($family))
				@include('families.create', $family)
			@else
				@include('families.create')
			@endif
		</div>
	</div>
</div>
@endsection