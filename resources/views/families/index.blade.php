@extends('layouts.master')

@section('content')
	<div class="columns">
		<div class="column is-one-quarter">
			<div class="is-primary">
			@include('families.list')
			</div>
		</div>
		<div class="column is-half">
			@if (isset($family))
				<div class="box">
					@include('families.create', $family)
				</div>
			</div>
			<div class="column is-one-quarter">
				<div class="box">
					<h4 class="title is-4">Students</h4>
					@foreach($family->students as $student)
						<li>
							{{$student->First . ' ' . $student->Last}}
						</li>
					@endforeach
					<div class="field is-horizontal">
						<div class="field-label">
							<!-- Left empty for spacing -->
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control">
									<a class="button is-primary" href="/families/{{$family->id}}/student/create">Add New Student</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@else
			<div class="box">
				@include('families.create')
			</div>
			@endif
			</div>
		</div>

	</div>
@endsection