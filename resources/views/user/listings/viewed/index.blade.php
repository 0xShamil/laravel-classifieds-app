@extends('layouts.app')

@section('content')

    @if($listings->count())
    	<p>Showing your last {{ $indexLimit }} viewed listings </p>
        @each('listings.partials._listing', $listings, 'listing')
    @else
        <p>You have not viewed any listings</p>
    @endif
    
@endsection
