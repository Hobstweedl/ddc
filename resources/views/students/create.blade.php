
<h5 class="title is-5">
    <i class="fa fa-user" aria-hidden="true"></i>
    Add New Student
</h5>

<form method="POST" action="/students">
    {{ csrf_field() }}
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">First/Last Name</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control is-expanded">
                    <input class="input" type="text" name="First" placeholder="First Name" required>
                </div>
            </div>
            <div class="field">
                <div class="control is-expanded">
                    <input class="input" type="text" name="Last" placeholder="Last Name" required>
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
                            <option>Choose a gender</option>
                            <option value="1">Female</option>
                            <option value="2">Male</option>
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
                            <option>Choose a family</option>
                            @foreach($families as $family)
                                <option value="{{$family->id}}">{{$family->First . ' ' . $family->Last}}</option>
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
                    <input class="input" type="text" id="BirthDate" name="Birthday" placeholder="Date of Birth" required>
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
                    <input class="input" type="text" name="MedicalConditions" placeholder="Medical Conditions / Allergies">
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
                    <input class="input" type="text" name="OnlineWaiverAccepted" placeholder="Online Waiver Accepted" required>
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
                    <input class="input" type="text" name="ThirdPartyID" placeholder="Third Party ID">
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
