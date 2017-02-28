<div class="form-group">
	<label for="category" class="control-label">category</label>
	<select name="category_id" id="category" class="form-control">

		@foreach($categories as $category)
			<optgroup label="{{ $category->name }}">
				@foreach($category->children as $child)
					<option value="{{ $child->id }}">{{ $child->name }} ($ {{ number_format($child->price, 2) }})</option>
				@endforeach
			</optgroup>
		@endforeach
		
	</select>
</div>