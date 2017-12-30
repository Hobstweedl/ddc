@if (isset($student))
    @php
        $newStudent = 0;
    @endphp
    <h5 class="title is-5"><i class="fa fa-user" aria-hidden="true"></i> {{$student->First . " " . $student->Last}}</h5>
    <form method="POST" action="/students/{{$student->id}}">
@else
    @php
        $newStudent = 1;
        $student = new App\Student;
    @endphp
    <h5 class="title is-5"><i class="fa fa-user" aria-hidden="true"></i> Add New Student</h5>
    <form method="POST" action="/students">
@endif
        {{csrf_field()}}
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">First/Last Name</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control is-expanded">
                        <input class="input" type="text" id="First" name="First" placeholder="First Name" value="{{$student->First}}"  required/>
                    </div>
                </div>
                <div class="field">
                    <div class="control is-expanded">
                        <input class="input" type="text" id="Last" name="Last" placeholder="Last Name" value="{{$student->Last}}" required/>
                    </div>
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Gender</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control">
                        <div class="select">
                            <select name="Sex">
                                <option @if ($student->gender() == 1) selected @endif value="1">Female</option>
                                <option @if ($student->gender() == 2) selected @endif value="2">Male</option>
                            </select>
                        </div>
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
                            <select name="family_id">
                                @foreach($families as $family)
                                    <option @if ($student->family_id == $family->id) selected @endif value="{{$family->id}}">{{$family->First . ' ' . $family->Last}}</option>
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
                        <input class="input" type="text" id="Birthday" name="Birthday" placeholder="Date of Birth" value="{{\Carbon\Carbon::parse($student->Birthday)->format('m/d/Y')}}" required/>
                    </div>
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Medical Conditions</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control is-expanded">
                        <input class="input" type="text" id="MedicalConditions" name="MedicalConditions" placeholder="Medical Conditions / Allergies" value="{{$student->MedicalConditions}}"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Paper Waiver on File?</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control is-expanded">
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="PaperWaiver" value="1">
                                Yes
                            </label>
                            <label class="radio">
                                <input type="radio" name="PaperWaiver" value="0">
                                No
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Online Waiver Accepted</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control is-expanded">
                        <input class="input" type="text" id="OnlineWaiverAccepted" name="OnlineWaiverAccepted" placeholder="Online Waiver Accepted" value="{{\Carbon\Carbon::parse($student->OnlineWaiverAccepted)->format('m/d/Y')}}" required/>
                    </div>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Performing</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control is-expanded">
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="Performing" value="1">
                                Yes
                            </label>
                            <label class="radio">
                                <input type="radio" name="Performing" value="0">
                                No
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="field is-horizontal">
            <div class="field-label is-normal">
                <label class="label">Third Party ID</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <div class="control is-expanded">
                        <input class="input" type="text" id="ThirdPartyID" name="ThirdPartyID" placeholder="Third Party ID" value="{{$student->ThirdPartyID}}"/>
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
                        @if ($newStudent != 1)
                            <a class="button" href="/students">Cancel</a>
                        @endif
                        </button>
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
