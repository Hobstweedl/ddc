@extends('layouts.master')

@section('content')
	<div class="columns">
		<div class="column is-narrow">
			@include('families.list')
		</div>
		<div class="column is-four-fifths">
			<div class="columns">
				@if (isset($family))
				<div class="column is-half">
					<div class="box">
						@include('families.create', $family)
					</div>
				</div>
				<div class="column is-half">
					<div class="box">
						<h5 class="title is-5"><i class="fa fa-user" aria-hidden="true"></i> Students</h5>
						@include('students.list', $students = $family->students)
						<div class="control">
							<a class="button is-primary" href="/families/{{$family->id}}/student/create">Add Student</a>
						</div>
					</div>
					<div class="box">
						<h5 class="title is-5"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Notes</h5>
						@foreach($family->notes as $note)
							{{$note->Content}}
						@endforeach
						<div class="control">
							<a class="button is-primary" href="/families/{{$family->id}}/note/create">Add Note</a>
						</div>
					</div>
				</div>
				@else
				<div class="column">
					<div class="box">
						@include('families.create')
					</div>
				</div>
				@endif
			</div>
			@if (isset($family))
			<div class="box">
				<h5 class="title is-5"><i class="fa fa-money" aria-hidden="true"></i> Account</h5>
			</div>
			@endif
		</div>
	</div>
@endsection