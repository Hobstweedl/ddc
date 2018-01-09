@if (isset($instructor))
  @php
    $newInstructor = 0;
  @endphp
  <h5 class="title is-5">
    <i class="fa fa-user-circle"
       aria-hidden="true"></i> {{$instructor->First . " " . $instructor->Last}}
  </h5>
  <form method="POST" action="{{ route('instructors.update', $instructor->id) }}">
@else
  @php
    $newInstructor = 1;
    $instructor = new App\Instructor;
  @endphp
  <h5 class="title is-5"><i class="fa fa-user-circle" aria-hidden="true"></i> Add New Instructor</h5>
  <form method="POST" action="{{ route('instructors.create') }}">
@endif

  {{ csrf_field() }}

  <div class="field is-horizontal">
    <div class="field-label is-normal">
      <label class="label">First/Last Name</label>
    </div>
    <div class="field-body">
      <div class="field">
        <div class="control is-expanded">
          <input class="input" type="text" name="First" placeholder="First Name" value="{{$instructor->First}}"
                 required/>
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

  @if ($newInstructor == 1 OR count($instructor->addresses) == 0)
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">Address</label>
      </div>
      <div class="field-body">
        <div class="field">
          <div class="control is-expanded">
            <input class="input" type="text" name="Address1" placeholder="Address Line 1" required/>
          </div>
        </div>
        <div class="field">
          <div class="control is-expanded">
            <input class="input" type="text" name="Address2" placeholder="Address Line 2"/>
          </div>
        </div>
        <div class="field">
          <div class="control is-expanded">
            <input class="input" type="text" name="Address3" placeholder="Address Line 3"/>
          </div>
        </div>
      </div>
    </div>
    <div class="field is-horizontal">
      <div class="field-label is-normal">
        <label class="label">City, State and Zip</label>
      </div>
      <div class="field-body">
        <div class="field">
          <div class="control is-expanded">
            <input class="input" type="text" name="City" placeholder="City" required/>
          </div>
        </div>
        <div class="field">
          <div class="control is-expanded">
            <input class="input" type="text" name="State" placeholder="State" required/>
          </div>
        </div>
        <div class="field">
          <div class="control is-expanded">
            <input class="input" type="text" name="Zip" placeholder="Zip" required/>
          </div>
        </div>
      </div>
    </div>
  @else
    @foreach ($instructor->addresses as $address)
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">Address {{$address->id}}</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control is-expanded">
              <input class="input" type="text" name="Address1" placeholder="Address Line 1"
                     value="{{$address->Address1}}" required/>
            </div>
          </div>
          <div class="field">
            <div class="control is-expanded">
              <input class="input" type="text" name="Address2" placeholder="Address Line 2"
                     value="{{$address->Address2}}"/>
            </div>
          </div>
          <div class="field">
            <div class="control is-expanded">
              <input class="input" type="text" name="Address3" placeholder="Address Line 3"
                     value="{{$address->Address3}}"/>
            </div>
          </div>
        </div>
      </div>
      <div class="field is-horizontal">
        <div class="field-label is-normal">
          <label class="label">City, State and Zip</label>
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control is-expanded">
              <input class="input" type="text" name="City" placeholder="City" value="{{$address->City}}"
                     required/>
            </div>
          </div>
          <div class="field">
            <div class="control is-expanded">
              <input class="input" type="text" name="State" placeholder="State" value="{{$address->State}}"
                     required/>
            </div>
          </div>
          <div class="field">
            <div class="control is-expanded">
              <input class="input" type="text" name="Zip" placeholder="Zip" value="{{$address->Zip}}" required/>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  @endif


  <div class="field is-horizontal">
    <div class="field-label is-normal">
      <label class="label">Email</label>
    </div>
    <div class="field-body">
      <div class="field">
        <div class="control is-expanded">
          <input class="input" type="text" name="Email" placeholder="Email" value="{{$instructor->Email}}"
                 required/>
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
          @if ($newInstructor != 1)<a class="button" href="{{route }}">Cancel</a>@endif
          </button>
        </div>
      </div>
    </div>
  </div>

</form>
