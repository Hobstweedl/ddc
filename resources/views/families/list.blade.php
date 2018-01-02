<div class="card">
	<div class="card-content">
		<div class="content">
			@foreach ($families as $family)
			<li style="list-style:none;">
				<span>
					<i class="fa fa-users" aria-hidden="true"></i> <a href="/families/{{ $family->id }}">{{ $family->First . ' ' . $family->Last}}</a>
				</span>
			</a>
			</li>
			@endforeach

			@if (count($inactiveFamilies) > 0)
			Inactive Families
			@foreach ($inactiveFamilies as $family)
			<li style="list-style:none;">
				<span>
					<i class="fa fa-users has-text-grey" aria-hidden="true"></i> <a href="/families/{{ $family->id }}">{{ $family->First . ' ' . $family->Last}}</a>
				</span>
			</li>
			@endforeach
			@endif
		</div>
	</div>
</div>
