@extends('layouts.master')

@section('content')
<h2 class="title">Seasons</h2>
<div class="columns">
	
	<div class="column">
		@include('admin.seasons.list')
	</div>
	<div class="column">
		<div class="box">
			@include('admin.seasons.create')
		</div>
	</div>
</div>

@endsection