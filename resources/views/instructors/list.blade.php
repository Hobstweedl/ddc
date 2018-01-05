<div class="card">
    <div class="card-content">
        <div class="content">
            @foreach ($instructors as $instructor)
                <li style="list-style:none;">
				<span>
					<i class="fa fa-user-circle" aria-hidden="true"></i> <a href="/instructors/{{ $instructor->id }}">{{ $instructor->First . ' ' . $instructor->Last}}</a>
				</span>
                    </a>
                </li>
            @endforeach
        </div>
    </div>
</div>