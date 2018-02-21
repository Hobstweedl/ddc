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
            <a href="{{route('classes', ['class' => $enrollment->class->id]) }}"> {{ $enrollment->class->Name }}</a>
          </h5>
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
              <input class="is-checkradio" id="DroppedYes" type="radio" name="exampleRadioInline" @if ($enrollment->Dropped == 1) checked="checked" @endif>
              <label for="DroppedYes">Yes</label>
              <input class="is-checkradio" id="DroppedNo" type="radio" name="exampleRadioInline" @if ($enrollment->Dropped == 0) checked="checked" @endif>
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
                <input slot-scope='props' :value='props.inputValue' class="input" type="text" name="droppedDate">
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
          enrolledDate: moment('{{$enrollment->EnrolledOn}}').toDate(),
          startChargingDate: moment('{{$enrollment->StartChargingOn}}').toDate(),
          droppedDate: moment('{{$enrollment->DroppedOn}}').toDate(),
			},
  });


</script>
@endsection
