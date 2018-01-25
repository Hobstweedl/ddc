<div id="app">
	<form method="POST" action="{{ route('classes.store') }}" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
	{{ csrf_field() }}

	<div class="columns">
		<div class="column">
			<div class="field">
			<label class="label">Name</label>
				<div class="control">
					<input class="input" type="text" placeholder="Name (i.e. Wednesday 4:30pm Jazz/HipHop)" v-model="form.Name" name="Name">
					<span class="help is-danger" v-if="form.errors.has('Name')" v-text="form.errors.get('Name')"></span>
				</div>
			</div>
		</div>
		<div class="column">
			<div class="field">
			<label class="label">Season</label>
				<div class="control is-expanded">
					<div class="select is-fullwidth">
						<select v-model="form.season_id" name="season_id" @change="seasonSelected">
							<option value="">Select a season</option>
							@foreach ($seasons as $season)
								<option value="{{$season->id}}|{{$season->SeasonType}}">{{$season->Name}}</option>
							@endforeach
						</select>
						<span class="help is-danger" v-if="form.errors.has('season_id')" v-text="form.errors.get('season_id')"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="columns">
		<div class="column is-6">
			<div class="field" v-if="form.weeklySeason">
				<label class="label">Days of the Week</label>
				<div class="control" >
					<input class="is-checkradio" type="checkbox" name="mondayCheckBox" id="mondayCheckBox" value="Mo" v.model="form.monday">
					<label for="mondayCheckBox">Monday</label>
					<input class="is-checkradio" type="checkbox" name="mondayCheckBox" id="tuesdayCheckBox" value="Tu" v.model="form.tuesday">
					<label for="tuesdayCheckBox">Tuesday</label>
					<input class="is-checkradio" type="checkbox" name="mondayCheckBox" id="wednesdayCheckBox" value="We" v.model="form.wednesday">
					<label for="wednesdayCheckBox">Wednesday</label>
					<input class="is-checkradio" type="checkbox" name="mondayCheckBox" id="thursdayCheckBox" value="Th" v.model="form.thursday">
					<label for="thursdayCheckBox">Thursday</label>
					<input class="is-checkradio" type="checkbox" name="mondayCheckBox" id="fridayCheckBox" value="Fr" v.model="form.friday">
					<label for="fridayCheckBox">Friday</label>
					<input class="is-checkradio" type="checkbox" name="mondayCheckBox" id="saturdayCheckBox" value="Sa" v.model="form.saturday">
					<label for="saturdayCheckBox">Saturday</label>
					<input class="is-checkradio" type="checkbox" name="mondayCheckBox" id="sundayCheckBox" value="Su" v.model="form.sunday">
					<label for="sundayCheckBox">Sunday</label>
				</div>
			</div>
			<div class="field" v-else-if="form.dateSpecificSeason">
				<label class="label">Occurs On</label>
				<div class="control is-expanded">
					<v-date-picker :mode='form.mode' 
						v-model='form.selectedDate' 
						popover-visibility="focus" 
						input-class="input">
					</v-date-picker>
				</div>
			</div>
			<div class="field" v-else>
				<div class="is-divider" data-content="SELECT A SEASON FIRST"></div>
			</div>
		</div>
		<div class="column is-3">
			<div class="field">
			<label class="label">Starting Time</label>
				<div class="field has-addons">
					<p class="control">
						<span class="select">
							<select v-model="form.selectedHour" name="selectedHour">
							@foreach ($hours as $hour)
								<option value="{{$hour}}">{{$hour}}</option>
							@endforeach
							</select>
						</span>
					</p>
					<p class="control">
						<span class="select">
							<select v-model="form.selectedMinute" name="selectedMinute">
							@foreach ($minutes as $minute)
								<option value="{{$minute}}">{{$minute}}</option>
							@endforeach
							</select>
						</span>
					</p>
					<p class="control">
						<span class="select">
							<select v-model="form.selectedAMPM" name="selectedAMPM">
							@foreach ($ampm as $ampm)
								<option value="{{$ampm}}">{{$ampm}}</option>
							@endforeach
							</select>
						</span>
					</p>
					<span class="help is-danger" v-if="form.errors.has('selectedTime')" v-text="form.errors.get('selectedTime')"></span>
				</div>
			</div>
		</div>
		<div class="column is-3">
			<div class="field">
				<label class="label">Length</label>
				<div class="control">
					<div class="select">
						<select v-model="form.selectedHourLength" name="selectedHourLength">
						@foreach ($lengthHours as $hour)
							<option value="{{$hour}}">{{$hour}}</option>
						@endforeach
						</select>
					</div>
					<p class="is-size-6" style="display:inline-block;">hour(s) and </p>
					<div class="select">
						<select v-model="form.selectedMinuteLength" name="selectedMinuteLength">
						@foreach ($lengthMinutes as $minute)
							<option value="{{$minute}}">{{$minute}}</option>
						@endforeach
						</select>
					</div>
					<p class="is-size-6" style="display:inline-block;">minute(s)</p>
					<span class="help is-danger" v-if="form.errors.has('selectedLength')" v-text="form.errors.get('selectedLength')"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="columns">
		<div class="column is-6">
			<div class="field">
				<label class="label">Class Type</label>
				<div class="control is-expanded">
					<div class="select is-fullwidth">
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
		<div class="column is-3">
			<div class="field">
				<label class="label">Instructor</label>
				<div class="control is-expanded">
					<div class="select is-fullwidth">
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
		<div class="column is-3">
			<div class="field">
				<label class="label">Location</label>
				<div class="control is-expanded">
					<div class="select is-fullwidth">
						<select v-model="form.location_id" name="location_id">
						@foreach ($locations as $location)
							<option value="{{$location->id}}">{{$location->Type}}</option>
						@endforeach
						</select>
					</div>
					<span class="help is-danger" v-if="form.errors.has('location_id')" v-text="form.errors.get('location_id')"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="columns">
		<div class="column">
			<div class="field">
				<label class="label">Public Description</label>
				<div class="control is-expanded">
					<textarea class="textarea" rows="2" placeholder="The public description of the class" name="PublicDescription" v-model="form.PublicDescription"></textarea>
					<span class="help is-danger" v-if="form.errors.has('class_type_id')" v-text="form.errors.get('class_type_id')"></span>
				</div>
			</div>
		</div>
		<div class="column">
			<div class="field">
				<label class="label">Private Notes</label>
				<div class="control is-expanded">
					<textarea class="textarea" rows="2" placeholder="The private notes/description for the class" name="PrivateNotes" v-model="form.PrivateNotes"></textarea>
					<span class="help is-danger" v-if="form.errors.has('PrivateNotes')" v-text="form.errors.get('PrivateNotes')"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="columns">
		<div class="column">
			<div class="field">
				<label class="label">Maximum Size</label>
				<div class="control">
					<input class="input" type="text" placeholder="e.g. 10" v-model="form.MaxSize" name="MaxSize">
					<span class="help is-danger" v-if="form.errors.has('MaxSize')" v-text="form.errors.get('MaxSize')"></span>
				</div>
			</div>
		</div>
		<div class="column">
			<div class="field">
				<label class="label">Prerequisite</label>
				<div class="field-body">
					<input class="is-checkradio" type="checkbox" name="Prerequisite" id="Prerequisite" value="0" v-model="form.Prerequisite" >
					<label for="Prerequisite"></label>
					<input class="input" type="text" placeholder="Note displayed for registering" v-model="form.PrerequisiteNote" name="PrerequisiteNote">
				</div>
			</div>
		</div>
		<div class="column">
			<div class="field">
				<label class="label">Age Range</label>
				<div class="field-body">
					<div class="field">
						<input class="input" type="text" placeholder="Min" v-model="form.AgeFrom" name="AgeFrom" style="display:inline-block;">
					</div>
					<p class="is-size-6" style="display:inline-block;"> to&nbsp; </p>
					<div class="field">
						<input class="input" type="text" placeholder="Max" v-model="form.AgeTo" name="AgeTo" style="display:inline-block;">
					</div>
					<span class="help is-danger" v-if="form.errors.has('Age')" v-text="form.errors.get('Age')"></span>
				</div>
			</div>
		</div>
		<div class="column">
			<div class="field">
				<label class="label">Age Not Applicable</label>
				<div class="control">
					<input class="is-checkradio" type="checkbox" name="AgeNAFlag" id="AgeNAFlag" value="0" v-model="form.AgeNAFlag" >
					<label for="AgeNAFlag"></label>
				</div>
			</div>
		</div>
	</div>
	<div class="columns">
		<div class="column">
			<div class="field">
				<label class="label">Online Registration Allowed?</label>
				<div class="control">
					<input class="is-checkradio" type="checkbox" name="OnlineRegistrationAllowed" id="OnlineRegistrationAllowed" value="0" v-model="form.OnlineRegistrationAllowed" >
					<label for="OnlineRegistrationAllowed"></label>
				</div>
			</div>
		</div>
		<div class="column">
			<div class="field">
				<label class="label">Single Day Registration Allowed?</label>
				<div class="control">
					<input class="is-checkradio" type="checkbox" name="AllowIndividualDayRegistration" id="AllowIndividualDayRegistration" value="0" v-model="form.AllowIndividualDayRegistration" >
					<label for="AllowIndividualDayRegistration"></label>
				</div>
			</div>
		</div>
		<div class="column">
			<div class="field">
				<label class="label">Password</label>
				<div class="control">
					<input class="input" type="text" placeholder="Online registration will require this password" v-model="form.Password" name="Password">
					<span class="help is-danger" v-if="form.errors.has('Password')" v-text="form.errors.get('Password')"></span>
				</div>
			</div>
		</div>
		<div class="column">
			<div class="field">
				<label class="label">Class Charge</label>
				<div class="field is-expanded">
      		<div class="field has-addons">
        		<p class="control">
          		<a class="button is-static">$</a>
        		</p>
						<p class="control is-expanded">
							<input class="input" type="text" placeholder="This will override any applicible automatic rate." v-model="form.ClassCharge" name="ClassCharge">
						</p>
      		</div>
    		</div>
			</div>
		</div>
	</div>
	<div class="columns is-centered">
		<div class="column is-narrow">
			<button class="button is-primary" :disabled="form.errors.any()" type="submit">Save</button></button>
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
					Prerequisite: '',
					PrerequisiteNote: '',
					OnlineRegistrationAllowed: '',
					AllowIndividualDayRegistration: '',
					Password: '',
					ClassCharge: '',
					mode: 'multiple',
					weeklySeason: 'true',
					dateSpecificSeason: 'false',
					monday: '',
					tuesday: '',
					wednesday: '',
					thursday: '',
					friday: '',
					saturday: '',
					sunday: ''
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