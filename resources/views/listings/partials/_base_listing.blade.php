<div class="media">
	<div class="media-body">
		<h5><strong><a href="{{ route('listings.show', [$area, $listing]) }}">{{ $listing->title }}</a></strong></h5>

		@if($area->children->count())
			in {{ $listing->area->name }}
		@endif

		<ul class="list-inline">
			<li><time>{{ $listing->created_at->diffForHumans() }}</time></li>
			<li>{{  }}</li>
		</ul>
	</div>
</div>