<div class="card">
  <div class="card-content">
    <div class="content">
      @foreach ($instructors as $instructor)
        <li style="list-style:none;">
				<span>
					<i class="fa fa-user-circle" aria-hidden="true"></i> <a
            href="{{ route('instructors.edit', $instructor->id) }}">{{ $instructor->First . ' ' . $instructor->Last}}</a>
          </a>
        </span>
        </li>
      @endforeach
    </div>
  </div>
</div>