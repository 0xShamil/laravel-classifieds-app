@if(isset($category))
	<listing-search category-id="{{ $category->id }}" :area-id="{{ $area->descendants->pluck('id')->push($area->id) }}"></listing-search>
@else
	<listing-search :area-ids="{{ $area->descendants->pluck('id')->push($area->id) }}"></listing-search>
@endif

<hr>