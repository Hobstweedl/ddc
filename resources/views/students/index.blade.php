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
            <th>Enrollment On</th>
            <th>Start Charging On</th>
            <th>Dropped?</th>
            <th>Dropped On</th>
            <th></th>
          </thead>
          @foreach($student->enrollments as $enrollment)
          <tr>
            <td><a href="{{ route('classes.show', $enrollment->enrollable->class->id) }}">{{$enrollment->enrollable->class->Name}}</a></td>
            <td>
              @if ($enrollment->enrollable_type == 'App\ClassDate')
                @foreach($enrollment->otherEnrollmentsInClass($enrollment) as $otherenrollment)
                  {{$enrollment->friendlyDate($otherenrollment->HeldOn)}}
                @endforeach
              @endif
              @if ($enrollment->enrollable_type == 'App\ClassDay')
                @foreach($enrollment->otherEnrollmentsInClass($enrollment) as $otherenrollment)
                  {{$otherenrollment->HeldOn}}
                @endforeach
              @endif

            </td>
            <td>{{$enrollment->friendlyDate($enrollment->EnrolledOn)}}</td>
            <td>{{$enrollment->friendlyDate($enrollment->StartChargingOn)}}</td>
            <td>{{$enrollment->Dropped}}</td>
            <td>{{$enrollment->friendlyDate($enrollment->DroppedOn)}}</td>
            <td>
              <a class="button is-primary" href="{{ route('enrollments.edit', $enrollment->id) }}">Edit</a>
              <a class="button is-primary" href="{{ route('enrollments.delete', $enrollment->id) }}">Drop</a>
              <a class="button is-primary" href="{{ route('enrollments.switch', $enrollment->id) }}">Switch</a>
            </td>
          </tr>
          @endforeach
        </table>
        <div class="control">
            <a class="button is-primary" href="#">Add Enrollment</a>
          </div>
        
      </div>
    </div>
    @endif
    </div>
    </div>
  </div>
</div>
@endsection
