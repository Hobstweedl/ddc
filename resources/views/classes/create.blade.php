<div id="class-create">
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
	<div v-if="form.weeklySeason">
		<div class="field is-horizontal">
			<div class="field-label is-normal">
				<label class="label">Held On</label>
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
	</div>
	<div v-if="form.dateSpecificSeason">
	<div class="field is-horizontal">
		<div class="field-label is-normal">
			<label class="label">Held On</label>
		</div>
		<div class="field-body">
			<div class="field">
				<div class="control">
					<div class="field">
						<div class="select is-multiple">
							<select multiple size="5" v-model="form.selectedDates">
								
							</select>
              <input name="selectedDates" id="selectedDates"/>
						</div>
					</div>
				</div>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
  <script type="text/javascript" src="https://wikiki-c4319bfccd.drafts.github.io/js/datepicker.min.js"></script>

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
			el: '#class-create',

			data: {
				form: new Form({
					Name: '',
          season_id: '',
          selectedDates: '',
					weeklySeason: 'true',
					dateSpecificSeason: 'false'
				})
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
            var datePicker = new DatePicker( document.getElementById( 'selectedDates' ), {} );
					} else {
						this.form.weeklySeason = false;
						this.form.dateSpecificSeason = false;
					}
				}
			}
		});

    classCreate.seasonSelected();
    
	</script>