@extends('layouts.master')

@section('content')
    <div class="columns">
        <div class="column is-narrow">
            @include('instructors.list')
        </div>
        <div class="column is-four-fifths">
            <div class="columns">
                @if (isset($instructor))
                    <div class="column is-half">
                        <div class="box">
                            @include('instructors.edit', $instructor)
                        </div>
                    </div>
                    <div class="column is-half">
                        <div class="box">
                            <h5 class="title is-5"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Classes</h5>
                            @foreach($instructor->classes as $class)
                                <p>{{$class->Name}} </p>
                            @endforeach

                        </div>
                        <div class="box">
                            <h5 class="title is-5"><i class="fa fa-sticky-note-o" aria-hidden="true"></i> Notes</h5>
                            @foreach($instructor->notes as $note)
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
                            @include('instructors.create')
                        </div>
                    </div>
                @endif
            </div>
            @if (isset($instructor))
                <div class="box">
                    <h5 class="title is-5">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        Something Else Here
                    </h5>
                </div>
            @endif
        </div>
    </div>
@endsection
