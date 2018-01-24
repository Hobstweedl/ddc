<div id="app">
	<form method="POST" action="{{ route('classes.store') }}" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
	{{ csrf_field() }}
	<div class="field is-horizontal">
		<div class="field-label is-normal">
			<label class="label">Name</label>
		</div>
		<div class="field-body">
			<div class="field">
				<div class="control">
					<input class="input" type="text" placeholder="Name (i.e. Wednesday 4:30pm Jazz/HipHop)" v-model="form.Name" name="Name">
					<span class="help is-danger" v-if="form.errors.has('Name')" v-text="form.errors.get('Name')"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="field is-horizontal">
		<div class="field-label is-normal">
			<label class="label">Season</label>
		</div>
		<div class="field-body">
			<div class="select">
				<select v-model="form.season_id" name="season_id" @change="seasonSelected">
					<option value="">Select a season</option>
					@foreach ($seasons as $season)
						<option value="{{$season->id}}|{{$season->SeasonType}}">{{$season->Name}}</option>
					@endforeach
				</select>
			</div>
			<span class="help is-danger" v-if="form.errors.has('season_id')" v-text="form.errors.get('season_id')"></span>
		</div>
	</div>
	<div class="field is-horizontal" v-if="form.weeklySeason">
		<div class="field-label is-normal">
			<label class="label">Days of the Week</label>
		</div>
		<div class="field-body">
			<div class="field">
				<div class="control">
					<div class="field">
						<input class="is-checkradio" type="checkbox" name="mondayCheckBox" id="mondayCheckBox" value="Mo">
						<label for="mondayCheckBox">Monday</label>
						<input class="is-checkradio" type="checkbox" name="mondayCheckBox" id="tuesdayCheckBox" value="Tu">
						<label for="tuesdayCheckBox">Tuesday</label>
						<input class="is-checkradio" type="checkbox" name="mondayCheckBox" id="wednesdayCheckBox" value="We">
						<label for="wednesdayCheckBox">Wednesday</label>
						<input class="is-checkradio" type="checkbox" name="mondayCheckBox" id="thursdayCheckBox" value="Th">
						<label for="thursdayCheckBox">Thursday</label>
						<input class="is-checkradio" type="checkbox" name="mondayCheckBox" id="fridayCheckBox" value="Fr">
						<label for="fridayCheckBox">Friday</label>
						<input class="is-checkradio" type="checkbox" name="mondayCheckBox" id="saturdayCheckBox" value="Sa">
						<label for="saturdayCheckBox">Saturday</label>
						<input class="is-checkradio" type="checkbox" name="mondayCheckBox" id="sundayCheckBox" value="Su">
						<label for="sundayCheckBox">Sunday</label>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="field is-horizontal" v-if="form.dateSpecificSeason">
		<div class="field-label is-normal">
			<label class="label">Occurs On</label>
		</div>
		<div class="field-body">
			<div class="field">
				<div class="control">
					<v-date-picker :mode='form.mode' 
						v-model='form.selectedDate' 
						popover-visibility="focus" 
						input-class="input">
					</v-date-picker>
				</div>
			</div>
		</div>
	</div>
	<div class="field is-horizontal">
		<div class="field-label is-normal">
			<label class="label">Starting Time</label>
		</div>
		<div class="field-body">
			<div class="field">
				<div class="control">
					<div class="select">
						<select v-model="form.selectedHour" name="selectedHour">
						@foreach ($hours as $hour)
							<option value="{{$hour}}">{{$hour}}</option>
						@endforeach
						</select>
					</div>
					:
					<div class="select">
						<select v-model="form.selectedMinute" name="selectedMinute">
						@foreach ($minutes as $minute)
							<option value="{{$minute}}">{{$minute}}</option>
						@endforeach
						</select>
					</div>
					<div class="select">
						<select v-model="form.selectedAMPM" name="selectedAMPM">
						@foreach ($ampm as $ampm)
							<option value="{{$ampm}}">{{$ampm}}</option>
						@endforeach
						</select>
					</div>
					<span class="help is-danger" v-if="form.errors.has('selectedTime')" v-text="form.errors.get('selectedTime')"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="field is-horizontal">
		<div class="field-label is-normal">
			<label class="label">Length</label>
		</div>
		<div class="field-body">
			<div class="field">
				<div class="control">
					<div class="select">
						<select v-model="form.selectedHourLength" name="selectedHourLength">
						@foreach ($lengthHours as $hour)
							<option value="{{$hour}}">{{$hour}}</option>
						@endforeach
						</select>
					</div>
					<p class="is-size-7" style="display:inline-block;">hour(s) and </p>
					<div class="select">
						<select v-model="form.selectedMinuteLength" name="selectedMinuteLength">
						@foreach ($lengthMinutes as $minute)
							<option value="{{$minute}}">{{$minute}}</option>
						@endforeach
						</select>
					</div>
					<p class="is-size-7" style="display:inline-block;">minute(s)</p>
					<span class="help is-danger" v-if="form.errors.has('selectedLength')" v-text="form.errors.get('selectedLength')"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="field is-horizontal">
		<div class="field-label is-normal">
			<label class="label">Instructor</label>
		</div>
		<div class="field-body">
			<div class="field">
				<div class="control">
					<div class="select">
						<select v-model="form.instructor_id" name="instructor_id">
						@foreach ($instructors as $instructor)
							<option value="{{$instructor->id}}">{{$instructor->Display}}</option>
						@endforeach
						</select>
					</div>
					<span class="help is-danger" v-if="form.errors.has('instructor_id')" v-text="form.errors.get('instructor_id')"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="field is-horizontal">
		<div class="field-label is-normal">
			<label class="label">Class Type</label>
		</div>
		<div class="field-body">
			<div class="field">
				<div class="control">
					<div class="select">
						<select v-model="form.class_type_id" name="class_type_id">
						@foreach ($classtypes as $classtype)
							<option value="{{$classtype->id}}">{{$classtype->Name}}</option>
						@endforeach
						</select>
					</div>
					<span class="help is-danger" v-if="form.errors.has('class_type_id')" v-text="form.errors.get('class_type_id')"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="field is-horizontal">
		<div class="field-label is-normal">
			<label class="label">Public Description</label>
		</div>
		<div class="field-body">
			<div class="field">
				<div class="control">
					<textarea class="textarea" placeholder="The public description of the class" name="PublicDescription" v-model="form.PublicDescription"></textarea>
					<span class="help is-danger" v-if="form.errors.has('class_type_id')" v-text="form.errors.get('class_type_id')"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="field is-horizontal">
		<div class="field-label is-normal">
			<label class="label">Private Notes</label>
		</div>
		<div class="field-body">
			<div class="field">
				<div class="control">
					<textarea class="textarea" placeholder="The private notes/description for the class" name="PrivateNotes" v-model="form.PrivateNotes"></textarea>
					<span class="help is-danger" v-if="form.errors.has('PrivateNotes')" v-text="form.errors.get('PrivateNotes')"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="field is-horizontal">
    <div class="field-label">
      <!-- Left empty for spacing -->
    </div>
    <div class="field-body">
      <div class="field">
        <div class="control">
          <button class="button is-primary" :disabled="form.errors.any()" type="submit">Save</button></button>
        </div>
      </div>
    </div>
  </div>
</div>

	<script>

		class Errors {

			constructor() {
				this.errors = {};
			}

			has(field) {
				return this.errors.hasOwnProperty(field);
			}

			any() {
				return Object.keys(this.errors).length > 0;
			}

			get(field) {
				if (this.errors[field]) {
					return this.errors[field][0];
				}
			}

			record(errors) {
				this.errors = errors;
			}

			clear(field) {
				if (field) {
					delete this.errors[field];
					return;
				}
				this.errors = {};
			}
		}

		class Form {

			constructor(data) {
				this.originalData = data;
				for (let field in data) {
					this[field] = data[field];
				}
				this.errors = new Errors();
			}

			data() {
				let data = {};
				for (let property in this.originalData) {
					data[property] = this[property];
				}
				return data;
			}

			reset() {
				for (let field in originalData) {
					this[field] = '';
				}
				this.errors.clear();
			}

			submit (requestType, url) {
				return new Promise((resolve, reject) => {
					axios[requestType](url, this.data())
							.then(response => {
								this.onSuccess(response.data);
								resolve(response.data);
							})
							.catch(error => {
								this.onFail(error.response.data.errors);
								reject(error.response.data.errors);
							})
				});
			}

			onSuccess(response) {
				alert(response.data.message);
				this.reset();
			}

			onFail(errors) {
				this.errors.record(errors);
			}
		}

		var classCreate = new Vue({
			el: '#app',

			data: {
				form: new Form({
					Name: '',
          season_id: '',
					selectedDate: null,
					selectedHour: null,
					selectedMinute: null,
					selectedAMPM: null,
					selectedHourLength: null,
					selectedMinuteLength: null,
					instructor_id: '',
					class_type_id: '',
					PublicDescription: '',
					PrivateNotes: '',
					MaxSize: '',
					location_id: '',
					AgeFrom: '',
					AgeTo: '',
					AgeNAFlag: '',
					mode: 'multiple',
					weeklySeason: 'true',
					dateSpecificSeason: 'false'
				}),
			},
			methods: {
				onSubmit() {
					this.form.submit('post', '/classes')
						.then(data => console.log(data))
						.catch(errors => console.log(errors));
				},
				seasonSelected() {
					var selectedSeason = this.form.season_id;
					if (selectedSeason != '') { this.form.errors.clear('season_id') }
					var seasonType = selectedSeason.split("|")[1];
					if (seasonType == 1) {
						this.form.weeklySeason = true;
						this.form.dateSpecificSeason = false;
					} else if (seasonType == 2) {
						this.form.weeklySeason = false;
            this.form.dateSpecificSeason = true;
					} else {
						this.form.weeklySeason = false;
						this.form.dateSpecificSeason = false;
					}
				}
			}
		});

    classCreate.seasonSelected();

	</script>