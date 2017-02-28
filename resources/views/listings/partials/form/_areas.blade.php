<div class="form-group">
	<label for="area" class="control-label">Area</label>
	<select name="area_id" id="area" class="form-control">
		
		@foreach($areas as $country)
			<optgroup label="{{ $country->name }}">
				
				@foreach($country->children as $state)
					<optgroup label="{{ $state->name }}">
						@foreach($state->children as $city)
							<option value="{{ $city->id }}">{{ $city->name }}</option>
						@endforeach
					</optgroup>
				@endforeach

			</optgroup>
		@endforeach

	</select>
</div>