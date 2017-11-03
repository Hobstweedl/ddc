@extends ('layouts.master')

@section ('content')
	<h2 class="title">
		Create a Class
	</h2>
	<div class="field is-horizontal">
  		<div class="field-label is-normal">
  			<label class="label">
  				Name
  			</label>
  		</div>
  		<div class="field-body">
  			<div class="field">
  				<div class="control">
					<input class="input" type="text" placeholder="Name (i.e. Wednesday 4:30pm Jazz/HipHop)">
				</div>
  			</div>
  		</div>
  	</div>
  	<div class="field is-horizontal">
  		<div class="field-label is-normal">
  			<label class="label">
  				Season
  			</label>
  		</div>
  		<div class="field-body">
  			<div class="field">
  				<div class="control">
					<input class="input" type="text" placeholder="Season">
				</div>
  			</div>
  		</div>
  	</div>
  	<div class="field is-horizontal">
  		<div class="field-label is-normal">
  			<label class="label">
  				Held On
  			</label>
  		</div>
  		<div class="field-body">
  			<div class="field">
  				<div class="control">
					<div class="weekDays-selector">
						<input type="checkbox" id="weekday-mon" class="weekday" />
						<label for="weekday-mon">M</label>
						<input type="checkbox" id="weekday-tue" class="weekday" />
						<label for="weekday-tue">T</label>
						<input type="checkbox" id="weekday-wed" class="weekday" />
						<label for="weekday-wed">W</label>
						<input type="checkbox" id="weekday-thu" class="weekday" />
						<label for="weekday-thu">T</label>
						<input type="checkbox" id="weekday-fri" class="weekday" />
						<label for="weekday-fri">F</label>
						<input type="checkbox" id="weekday-sat" class="weekday" />
						<label for="weekday-sat">S</label>
						<input type="checkbox" id="weekday-sun" class="weekday" />
						<label for="weekday-sun">S</label>
					</div>
				</div>

  			</div>
  		</div>
  	</div>
	

@endsection