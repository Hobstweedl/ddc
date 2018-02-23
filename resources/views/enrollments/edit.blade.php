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
        <form method="POST" action="{{ route('enrollments.update', $enrollment->id) }}">
          @csrf
          <div class="box">
            <h5 class="title is-5"><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
              Edit enrollment for <a href="{{route('students.edit', ['student' => $enrollment->student->id]) }}"> {{ $enrollment->student->name() }}</a> for 
              <a href="{{route('classes', ['class' => $enrollment->enrollable->class->id]) }}"> {{ $enrollment->enrollable->class->Name }}</a>
            </h5>
            <label class="label">Held On</label>
            <div class="field" >
              <input class="input" type="text" name="HeldOn" value="{{$enrollment->enrollable->HeldOn}}" disabled>
            </div>
            <div class="field">
              <label class="label">Enrolled On</label>
              <v-date-picker :mode="mode"
                popover-visibility="focus"
                class="control"
                v-model='EnrolledOn'
                style="display:block;">
                  <input slot-scope='props' :value='props.inputValue' class="input" type="text" name="EnrolledOn">
              </v-date-picker>
            </div>
            <div class="field">
              <label class="label">Start Charging On</label>
              <v-date-picker :mode="mode"
                popover-visibility="focus"
                class="control"
                v-model='StartChargingOn'
                style="display:block;">
                  <input slot-scope='props' :value='props.inputValue' class="input" type="text" name="StartChargingOn">
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
              <button type="submit" class="button is-primary">Save</button>
              <a href="{{ route('students.edit', $enrollment->student)}}" class="button is-light">Cancel</a>
            </div>
          </div>
        </form>
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
          EnrolledOn: moment('{{$enrollment->EnrolledOn}}').toDate(),
          StartChargingOn: moment('{{$enrollment->StartChargingOn}}').toDate(),
          droppedDate: moment('{{$enrollment->DroppedOn}}').toDate(),
          dateSpecificDates: [moment('{{$enrollment->enrollable->HeldOn}}').toDate()]
			},
  });

</script>
@endsection
