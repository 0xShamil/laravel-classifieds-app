@extends('layouts.app')

@section('content')
    <div class="row">
        @foreach($categories as $category)
            <div class="col-md-4">
                <h4>{{ $category->name }}</h4>
                <hr>

                @foreach($category->children as $sub)
                    <h5><a href="{{ route('listings.index', [$area, $sub]) }}">{{ $sub->name }}</a> ({{ $sub->listings->count() }})</h5>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
