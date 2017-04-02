{{ $sender->name }} has shared a listing , <a href="{{ route('listings.show', [$listing->area, $listing]) }}">
	{{ $listing->title }}
</a>

<br><br>

@if($body)
	--- <br>
	{!! nl2br(e($body)) !!} <br>
	--- <br> <br>
@endif
