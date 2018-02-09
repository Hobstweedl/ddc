@extends('layouts.master')

@section('content')
<div class="columns">
  <div class="column is-narrow">
    @include('students.list')
  </div>
  <div class="column is-four-fifths">
    <div class="container">
    <div class="columns is-multiline">
      
      @if (isset($student))
      <div class="column is-half">
        <div class="box">
          @include('students.edit', $student)
        </div>
      </div>
      <div class="column is-half">
        <div class="box">
          <h5 class="title is-5"><i class="fa fa-users" aria-hidden="true"></i> Family</h5>
          <p>
            <a href="{{ route('families.edit', ['family' => $student->family_id]) }}">
              {{ $student->family->name() }}
            </a>
          </p>
          @foreach($student->family->addresses as $address)
            <p>{{$address->Address1}} {{$address->Address2}} {{$address->Address3}} </p>
            <p>{{$address->City}} {{$address->State}} {{$address->Zip}}</p>
          @endforeach
          @foreach($student->family->phones as $phone)
            <p>{{$phone->PhoneNumber}}</p>
          @endforeach

        </div>
        <div class="box">
          <h5 class="title is-5"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Notes</h5>
          @foreach($student->notes as $note)
          {{$note->Content}}
          @endforeach
          <div class="control">
            <a class="button is-primary" href="#">Add Note</a>
          </div>
        </div>
      </div>
      @else
      <div class="column">
        <div class="box">
          @include('students.create')
        </div>
      </div>
      @endif
    
    @if (isset($student))
    <div class="column">
      <div class="box">
        <h5 class="title is-5">
          <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
          Enrollments
        </h5>
        <table class="table">
          <thead>
            <th>Class Name</th>
            <th>Days Enrolled</th>
            <th>Enrollment Added</th>
          </thead>
          @foreach($student->enrollments as $enrollment)
          <tr>
            <td><a href="{{ route('classes.show', $enrollment->class->id) }}">{{$enrollment->class->Name}}</a></td>
            <td>
              @if (isset($enrollment->class_dates_id))
                {{$enrollment->friendlyDate($enrollment->date->HeldOn)}}
              @endif
              @foreach($enrollment->class->days as $classday)
                {{$classday->DayHeldOn}}
              @endforeach
            </td>
            <td>{{$enrollment->friendlyDate($enrollment->EnrolledOn)}}</td>  
          </tr>
          @endforeach
        </table>
        
      </div>
    </div>
    @endif
    </div>
    </div>
  </div>
</div>
@endsection
