<form method="POST" action="/seasons">
	{{ csrf_field() }}

	<div class="field">
		<div class="control">
			<input class="input" type="text" id="Name" name="Name" placeholder="Name" required/>
		</div>
	</div>

	<div class="field">
		<div class="control">
			<input class="input" type="text" id="StartDate" name="StartDate" placeholder="Start Date" required />
		</div>
	</div>
	
	<div class="field">
		<div class="control">
			<input class="input" type="text" id="EndDate" name="EndDate" placeholder="End Date" required />
		</div>
	</div>
	
	<div class="field">
		<label class="label">Type of Season</label>
		<div class="control">
			<div class="select">
				<select name="SeasonType">
					<option value="1">Weekly series</option>
					<option value="2">Date-specific</option>
				</select>
			</div>
		</div>
	</div>

	<div class="field">
	 	<label class="label">Visible?</label>
	  	<div class="control">
		    <label class="radio">
		      	<input type="radio" name="Viewable" value="1">
		      	Yes
		    </label>
		    <label class="radio">
		      	<input type="radio" name="Viewable" value="0" checked="true">
		      	No
		    </label>
	 	</div>
	</div>

	<div class="field">
	 	<label class="label">Prorate on enrollment?</label>
	  	<div class="control">
		    <label class="radio">
		      	<input type="radio" name="ProrateOnEnrollment" value="1">
		      	Yes
		    </label>
		    <label class="radio">
		      	<input type="radio" name="ProrateOnEnrollment" value="0" checked="true">
		      	No
		    </label>
	 	</div>
	</div>

	<div class="field">
	 	<label class="label">Charge for Holidays?</label>
	  	<div class="control">
		    <label class="radio">
		      	<input type="radio" name="ChargeForHolidays" value="1">
		      	Yes
		    </label>
		    <label class="radio">
		      	<input type="radio" name="ChargeForHolidays" value="0" checked="true">
		      	No
		    </label>
	 	</div>
	</div>

	<div class="field">
	 	<label class="label">Charge Registration Fee?</label>
	  	<div class="control">
		    <label class="radio">
		      	<input type="radio" name="ChargeRegistrationFee" value="1">
		      	Yes
		    </label>
		    <label class="radio">
		      	<input type="radio" name="ChargeRegistrationFee" value="0" checked="true">
		      	No
		    </label>
	 	</div>
	</div>

	<button class="button is-primary" type="submit">Save</button>
</form>
<script>
$( document ).ready(function() {
    $( "#StartDate" ).datepicker();
    $( "#EndDate" ).datepicker();
});
</script>