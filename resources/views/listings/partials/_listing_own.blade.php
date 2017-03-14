<div class="media">
	<div class="media-body">
		<h5>
			<strong>
				@if($listing->live())
					<a href="{{ route('listings.show', [$area, $listing]) }}">{{ $listing->title }}</a>
				@else
					{{ $listing->title }}
				@endif
			</strong>

			in {{ $listing->area->name }}
		</h5>
		
		<ul class="list-inline">
			<li> <time>{{ $listing->created_at->diffForHumans() }}</time></li>
			<li> Last Updated: <time>{{ $listing->updated_at->diffForHumans() }}</time></li>
		</ul>

		<ul class="list-inline">
			<li><a href="#">Remove</a></li>
			<li><a href="{{ route('listings.edit', [$area, $listing]) }}">Edit</a></li>
		</ul>
	</div>
	<hr>
</div>

