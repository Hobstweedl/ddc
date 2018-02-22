@extends('layouts.master')

@section('content')
<div class="columns">
  <div class="column is-narrow">
    @include('students.list')
  </div>
  <div class="column is-four-fifths">
    <div class="container" id="app">
    <div class="columns is-multiline">
      <div class="column">
        <div class="box">
          <h5 class="title is-5"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
            Edit enrollment for <a href="{{route('students.edit', ['student' => $enrollment->student->id]) }}"> {{ $enrollment->student->name() }}</a> for 
            <a href="{{route('classes', ['class' => $enrollment->enrollable->class->id]) }}"> {{ $enrollment->enrollable->class->Name }}</a>
          </h5>
          <div class="field" @if ($enrollment->enrollable->class->season->SeasonType == 2) style="display:none;" @endif>
				<label class="label">Days of the Week</label>
				<div class="control" >
					<input class="is-checkradio" type="checkbox" name="monday" id="monday" v-model="monday">
					<label for="monday">Monday</label>
					<input class="is-checkradio" type="checkbox" name="tuesday" id="tuesday" v-model="tuesday">
					<label for="tuesday">Tuesday</label>
					<input class="is-checkradio" type="checkbox" name="wednesday" id="wednesday" v-model="wednesday">
					<label for="wednesday">Wednesday</label>
					<input class="is-checkradio" type="checkbox" name="thursday" id="thursday" v-model="thursday">
					<label for="thursday">Thursday</label>
					<input class="is-checkradio" type="checkbox" name="friday" id="friday" v-model="friday">
					<label for="friday">Friday</label>
					<input class="is-checkradio" type="checkbox" name="saturday" id="saturday" v-model="saturday">
					<label for="saturday">Saturday</label>
					<input class="is-checkradio" type="checkbox" name="sunday" id="sunday" v-model="sunday">
					<label for="sunday">Sunday</label>
				</div>
			</div>
			<div class="field" @if ($enrollment->enrollable->class->season->SeasonType == 1) style="display:none;" @endif>
				<label class="label">Occurs On</label>
					<v-date-picker :mode='multipleSelectMode' 
						v-model='dateSpecificDates' 
						popover-visibility="focus"
						class="control"
						style="display:block;">
							<input slot-scope='props' :value='props.inputValue' class="input" type="text" v.model="dateSpecificDates" name="dateSpecificDates">
					</v-date-picker>
			</div>
          <div class="field">
            <label class="label">Enrolled On</label>
            <v-date-picker :mode="mode"
              popover-visibility="focus"
              class="control"
              v-model='enrolledDate'
              style="display:block;">
                <input slot-scope='props' :value='props.inputValue' class="input" type="text" name="enrolledDate">
            </v-date-picker>
          </div>
          <div class="field">
            <label class="label">Start Charging On</label>
            <v-date-picker :mode="mode"
              popover-visibility="focus"
              class="control"
              v-model='startChargingDate'
              style="display:block;">
                <input slot-scope='props' :value='props.inputValue' class="input" type="text" name="startChargingDate">
            </v-date-picker>
          </div>
          <div class="field">
            <label class="label">Dropped</label>
            <div class="field">
              <input class="is-checkradio" id="DroppedYes" disabled type="radio" name="exampleRadioInline" @if ($enrollment->Dropped == 1) checked="checked" @endif>
              <label for="DroppedYes">Yes</label>
              <input class="is-checkradio" id="DroppedNo" disabled type="radio" name="exampleRadioInline" @if ($enrollment->Dropped == 0) checked="checked" @endif>
              <label for="DroppedNo">No</label>
            </div>
          </div>
          <div class="field">
            <label class="label">Dropped On</label>
            <v-date-picker :mode="mode"
              popover-visibility="focus"
              class="control"
              v-model='droppedDate'
              style="display:block;">
                <input slot-scope='props' :value='props.inputValue' disabled class="input" type="text" name="droppedDate">
            </v-date-picker>
          </div>
          <div class="field">
            <a href="{{ route('enrollments.update', $enrollment->id) }}" class="button is-primary">Save</a>
            <a href="{{ route('students.edit', $enrollment->student)}}" class="button is-light">Cancel</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script>
  var editEnrollment = new Vue({
    el: '#app',
			data: {
          mode: 'single',
          multipleSelectMode: 'multiple',
          enrolledDate: moment('{{$enrollment->EnrolledOn}}').toDate(),
          startChargingDate: moment('{{$enrollment->StartChargingOn}}').toDate(),
          droppedDate: moment('{{$enrollment->DroppedOn}}').toDate(),
          dateSpecificDates: '{{$enrollment->enrollable->HeldOn}}',
          monday: '',
          tuesday: '',
          wednesday: '',
          thursday: '',
          friday: '',
          saturday: '',
          sunday: ''
			},
  });


</script>
@endsection
