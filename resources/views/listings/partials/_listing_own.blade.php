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
			<li>
				<a href="#" onclick="event.preventDefault(); document.getElementById('listings-destroy-form-{{ $listing->id }}').submit();">Remove</a>
			</li>
			<li><a href="{{ route('listings.edit', [$area, $listing]) }}">Edit</a></li>
		</ul>
	</div>
	<hr>
</div>

<form action="{{ route('listings.destroy', [$area, $listing]) }}" method="post" id="listings-destroy-form-{{ $listing->id }}">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}
</form>