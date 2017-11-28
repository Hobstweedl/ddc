@extends('layouts.master')

@section('content')
    <form method="POST" action="/students">
        {{csrf_field()}}
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">First/Last Name</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control is-expanded">
                        <input class="input" type="text" id="First" name="First" placeholder="First Name" required/>
                    </div>
                </div>
                <div class="field">
                    <div class="control is-expanded">
                        <input class="input" type="text" id="Last" name="Last" placeholder="Last Name" value="{{$family_last}}" required/>
                    </div>
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Family</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <div class="select">
                            <select name="Family">
                                @foreach($families as $family)
                                    <option value="{{$family->id}}" @if($family_id == $family->id) selected @endif>{{$family->First . ' ' . $family->Last}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Date of Birth</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control is-expanded">
                        <input class="input" type="text" id="BirthDate" name="BirthDate" placeholder="Birth Date" required/>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        $( document ).ready(function() {
            $( "#BirthDate" ).datepicker({
                changeMonth: true,
                changeYear: true,
                inline: true,
                showOtherMonths: true,
                dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],
                yearRange: "-100:+0",
                prevText: "<",
                nextText: ">"
            });
        });
    </script>
@endsection