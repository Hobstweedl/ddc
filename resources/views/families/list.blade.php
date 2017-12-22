<div class="card">
	<div class="card-content">
		<div class="content">
@foreach ($families as $family)
<li style="list-style:none;"><a href="/families/{{ $family->id }}">
	<span>
		<i class="fa fa-users has-text-grey" aria-hidden="true"></i>
	</span>
	{{ $family->First . ' ' . $family->Last}}
</a>
</li>
@endforeach

@if (count($inactiveFamilies) > 0)
Inactive Families
@foreach ($inactiveFamilies as $family)
	<li>
		<i class="fa fa-users has-text-grey" aria-hidden="true"></i> <a class="has-text-grey-light" href="/families/{{ $family->id }}">{{ $family->First . ' ' . $family->Last}}</a>
	</li>
@endforeach
@endif
		</div>
	</div>
</div>
