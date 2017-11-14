@extends('layouts.master')

@section('content')
<h2 class="title">Edit Season</h2>
<form method="POST" action="/seasons/{{$season->id}}">
    {{ csrf_field() }}

    <div class="field">
        <div class="control">
            <input class="input" type="text" id="Name" name="Name" placeholder="Name" value="{{$season->Name}}" required/>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <input class="input" type="text" id="StartDate" name="StartDate" placeholder="Start Date" value="{{\Carbon\Carbon::parse($season->StartDate)->format('m/d/Y')}}" required />
        </div>
    </div>

    <div class="field">
        <div class="control">
            <input class="input" type="text" id="EndDate" name="EndDate" placeholder="End Date" value="{{\Carbon\Carbon::parse($season->EndDate)->format('m/d/Y')}}" required />
        </div>
    </div>

    <div class="field">
        <label class="label">Type of Season</label>
        <div class="control">
            <input class="input" type="text" value="@if ($season->SeasonType == 1) Weekly series @else Date-specific @endif" disabled>
        </div>
    </div>

    <div class="field">
        <label class="label">Visible?</label>
        <div class="control">
            <label class="radio">
                <input type="radio" name="Viewable" value="1" @if ($season->Viewable == 1) checked @endif>
                Yes
            </label>
            <label class="radio">
                <input type="radio" name="Viewable" value="0" @if ($season->Viewable == 0) checked @endif>
                No
            </label>
        </div>
    </div>

    <div class="field">
        <label class="label">Prorate on enrollment?</label>
        <div class="control">
            <label class="radio">
                <input type="radio" name="ProrateOnEnrollment" value="1" @if ($season->ProrateOnEnrollment == 1) checked @endif>
                Yes
            </label>
            <label class="radio">
                <input type="radio" name="ProrateOnEnrollment" value="0" @if ($season->ProrateOnEnrollment == 0) checked @endif>
                No
            </label>
        </div>
    </div>

    <div class="field">
        <label class="label">Charge for Holidays?</label>
        <div class="control">
            <label class="radio">
                <input type="radio" name="ChargeForHolidays" value="1" @if ($season->ChargeForHolidays == 1) checked @endif>
                Yes
            </label>
            <label class="radio">
                <input type="radio" name="ChargeForHolidays" value="0" @if ($season->ChargeForHolidays == 0) checked @endif>
                No
            </label>
        </div>
    </div>

    <div class="field">
        <label class="label">Charge Registration Fee?</label>
        <div class="control">
            <label class="radio">
                <input type="radio" name="ChargeRegistrationFee" value="1" @if ($season->ChargeRegistrationFee == 1) checked @endif>
                Yes
            </label>
            <label class="radio">
                <input type="radio" name="ChargeRegistrationFee" value="0" @if ($season->ChargeRegistrationFee == 0) checked @endif>
                No
            </label>
        </div>
    </div>

    <button class="button is-primary" type="submit">Save</button>
    <a class="button" href="/seasons">Cancel</a>
</form>
<script>
    $( document ).ready(function() {
        $( "#StartDate" ).datepicker();
        $( "#EndDate" ).datepicker();
    });
</script>

@endsection