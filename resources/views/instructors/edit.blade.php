<h5 class="title is-5">
  <i class="fa fa-user-circle" aria-hidden="true"></i>
  {{$instructor->First . " " . $instructor->Last}}
</h5>
<form method="POST" action="{{ route('instructors.update', $instructor->id) }}">

  {{csrf_field()}}
  <div class="field is-horizontal">
    <div class="field-label is-normal">
      <label class="label">First/Last Name</label>
    </div>
    <div class="field-body">
      <div class="field">
        <div class="control is-expanded">
          <input class="input" type="text" name="First" placeholder="First Name"
                 value="{{$instructor->First}}" required/>
        </div>
      </div>
      <div class="field">
        <div class="control is-expanded">
          <input class="input" type="text" name="Last" placeholder="Last Name" value="{{$instructor->Last}}"
                 required/>
        </div>
      </div>
    </div>
  </div>

  <div class="field is-horizontal">
    <div class="field-label is-normal">
      <label class="label">Display Name</label>
    </div>
    <div class="field-body">
      <div class="field">
        <div class="control is-expanded">
          <input class="input" type="text" name="Display" placeholder="Display Name"
                 value="{{$instructor->Display}}" required/>
        </div>
      </div>
    </div>
  </div>

  <div class="field is-horizontal">
    <div class="field-label is-normal">
      <label class="label">Email</label>
    </div>
    <div class="field-body">
      <div class="field">
        <div class="control is-expanded">
          <input class="input" type="text" name="Display" placeholder="Email" value="{{$instructor->Email}}" required/>
        </div>
      </div>
    </div>
  </div>

  <div class="field is-horizontal">
    <div class="field-label is-normal">
      <label class="label">Active</label>
    </div>
    <div class="field-body">
      <div class="field">
        <div class="control is-expanded">
          <div class="control">
            <label class="radio">
              <input
                type="radio"
                name="Active"
                value="1"
                @if ($instructor->Active == 1) checked @endif>
              Yes
            </label>
            <label class="radio">
              <input
                type="radio"
                name="Active"
                value="0"
                @if ($instructor->Active == 0) checked @endif>
              No
            </label>
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
          <button class="button is-primary" type="submit">Save</button>
          <a class="button" href="{{ route('instructors') }}">Cancel</a>
        </div>
      </div>
    </div>
  </div>
</form>
