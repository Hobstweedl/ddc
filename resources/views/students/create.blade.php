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
                        <input class="input" type="text" id="Last" name="Last" placeholder="Last Name" required/>
                    </div>
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <label class="label">Family</label>
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
    </form>
@endsection