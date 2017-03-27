@extends('layouts.app')

@section('content')

    @include('listings.partials._search', [
        'category' => $category
    ])

    <h4> {{ $category->parent->name }} &nbsp; > &nbsp; {{ $category->name }}</h4>

    <hr>

    @if($listings->count())
        @foreach($listings as $listing)
            @include('listings.partials._listing', compact('listing'))
        @endforeach

        {{ $listings->links() }}
    @else
        No Listings found :(
    @endif
@endsection
