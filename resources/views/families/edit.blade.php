@if (isset($family))
	@php
		$newFamily = 0;
	@endphp
	<h5 class="title is-5"><i class="fa fa-users" aria-hidden="true"></i> {{$family->First . " " . $family->Last}}</h5>
	<form method="POST" action="/families/{{$family->id}}">
@else
	@php
		$newFamily = 1;
		$family = new App\Family;
	@endphp
	<h5 class="title is-5"><i class="fa fa-users" aria-hidden="true"></i> Add New Family</h5>
	<form method="POST" action="/families">
@endif

    {{ csrf_field() }}

    <div class="field is-horizontal">
    	<div class="field-label is-normal">
    		<label class="label">First/Last Name</label>
    	</div>
    	<div class="field-body">
    		<div class="field">
		        <div class="control is-expanded">
		            <input class="input" type="text" id="First" name="First" placeholder="First Name" value="{{$family->First}}" required/>
		        </div>
	        </div>
	        <div class="field">
		        <div class="control is-expanded">
		            <input class="input" type="text" id="Last" name="Last" placeholder="Last Name" value="{{$family->Last}}" required/>
		        </div>
	        </div>
    	</div>
    </div>

	@if ($newFamily == 1 OR count($family->addresses) == 0)
		<div class="field is-horizontal">
			<div class="field-label is-normal">
				<label class="label">Address</label>
			</div>
			<div class="field-body">
				<div class="field">
					<div class="control is-expanded">
						<input class="input" type="text" id="Address1" name="Address1" placeholder="Address Line 1" required/>
					</div>
				</div>
				<div class="field">
					<div class="control is-expanded">
						<input class="input" type="text" id="Address2" name="Address2" placeholder="Address Line 2" />
					</div>
				</div>
				<div class="field">
					<div class="control is-expanded">
						<input class="input" type="text" id="Address3" name="Address3" placeholder="Address Line 3" />
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
						<input class="input" type="text" id="City" name="City" placeholder="City" required/>
					</div>
				</div>
				<div class="field">
					<div class="control is-expanded">
						<input class="input" type="text" id="State" name="State" placeholder="State" required/>
					</div>
				</div>
				<div class="field">
					<div class="control is-expanded">
						<input class="input" type="text" id="Zip" name="Zip" placeholder="Zip" required/>
					</div>
				</div>
			</div>
		</div>
	@else
		@foreach ($family->addresses as $address)
			<div class="field is-horizontal">
				<div class="field-label is-normal">
					<label class="label">Address {{$address->id}}</label>
				</div>
				<div class="field-body">
					<div class="field">
						<div class="control is-expanded">
							<input class="input" type="text" id="Address1" name="Address1" placeholder="Address Line 1" value="{{$address->Address1}}" required/>
						</div>
					</div>
					<div class="field">
						<div class="control is-expanded">
							<input class="input" type="text" id="Address2" name="Address2" placeholder="Address Line 2" value="{{$address->Address2}}" />
						</div>
					</div>
					<div class="field">
						<div class="control is-expanded">
							<input class="input" type="text" id="Address3" name="Address3" placeholder="Address Line 3" value="{{$address->Address3}}" />
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
							<input class="input" type="text" id="City" name="City" placeholder="City" value="{{$address->City}}" required/>
						</div>
					</div>
					<div class="field">
						<div class="control is-expanded">
							<input class="input" type="text" id="State" name="State" placeholder="State" value="{{$address->State}}" required/>
						</div>
					</div>
					<div class="field">
						<div class="control is-expanded">
							<input class="input" type="text" id="Zip" name="Zip" placeholder="Zip" value="{{$address->Zip}}" required/>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	@endif

	<div class="field is-horizontal">
		<div class="field-label is-normal">
			<label class="label">Phone Numbers</label>
		</div>
		@if ($newFamily == 1 OR count($family->phones) == 0)
			<div class="field-body">
				<div class="field has-addons">
					<p class="control">
					<span class="select">
						<select name="PhoneType">
							<option value="" selected>Select one</option>
						@foreach ($phoneTypes as $phoneType)
							<option value="{{$phoneType->id}}">{{$phoneType->Type}}</option>
						@endforeach
						</select>
					</span>
					</p>
					<p class="control is-expanded">
						<input class="input" type="text" id="PhoneNumber" name="PhoneNumber" placeholder="Phone" />
					</p>
				</div>
			</div>
		@else
			@foreach ($family->phones as $phone)
				<div class="field-body">
					<div class="field has-addons">
						<p class="control">
					<span class="select">
						<select name="PhoneType{{$phone->id}}">
						@foreach ($phoneTypes as $phoneType)
								<option value="{{$phoneType->id}}" @if ($phone->codePhoneType_id == $phoneType->id) selected @endif>{{$phoneType->Type}}</option>
							@endforeach
						</select>
					</span>
						</p>
						<p class="control is-expanded">
							<input class="input" type="text" id="PhoneNumber{{$phone->id}}" name="PhoneNumber{{$phone->id}}" placeholder="Phone" value="{{$phone->PhoneNumber}}" />
						</p>
					</div>
				</div>
			@endforeach
		@endif


	</div>

    <div class="field is-horizontal">
    	<div class="field-label is-normal">
    		<label class="label">Email</label>
    	</div>
    	<div class="field-body">
    		<div class="field">
		        <div class="control is-expanded">
		            <input class="input" type="text" id="Email" name="Email" placeholder="Email" value="{{$family->Email}}" required />
		        </div>
		    </div>
        </div>
    </div>

    <div class="field is-horizontal">
    	<div class="field-label is-normal">
    		<label class="label">Opt-out of Emails?</label>
    	</div>
    	<div class="field-body">
	        <div class="control">
	            <label class="radio">
	                <input type="radio" name="OptOut" value="1" @if ($family->OptOut == 1) checked @endif>
	                Yes
	            </label>
	            <label class="radio">
	                <input type="radio" name="OptOut" value="0" @if ($family->OptOut == 0) checked @endif>
	                No
	            </label>
	        </div>
        </div>
     </div>

    <div class="field is-horizontal">
    	<div class="field-label is-normal">
    		<label class="label">How Did You Hear About Us</label>
    	</div>
    	<div class="field-body">
	        <div class="control is-expanded">
				<div class="select">
					<select name="HowDidYouHear">
						@foreach($howDidYouHearTypes as $howDidYouHear)
							<option value="{{$howDidYouHear->id}}" @if ($family->HowDidYouHear == $howDidYouHear->id) selected @endif> {{$howDidYouHear->Type}}</option>
						@endforeach
					</select>
				</div>
	        </div>
        </div>
    </div>

    <div class="field is-horizontal">
    	<div class="field-label is-normal">
    		<label class="label">Third Party ID</label>
    	</div>
    	<div class="field-body">
	        <div class="control is-expanded">
	            <input class="input" type="text" id="ThirdPartyId" name="ThirdPartyId" placeholder="Third Party ID" value="{{$family->ThirdPartyId}}" required />
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
    					@if ($newFamily != 1)<a class="button" href="/families">Cancel</a>@endif
				</button>
				</div>
			</div>
		</div>
	</div>

</form>
