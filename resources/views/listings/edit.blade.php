@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Continue editing listing
                    @if($listing->live())
                        <span class="pull-right">
                            <a href="{{ route('listings.show', [$area, $listing]) }}">Go to Listing</a>
                        </span>
                    @endif
                </div>
                <div class="panel-body">
                    <form action="{{ route('listings.update', [$area, $listing]) }}" method="post">
                        
                        @include('listings.partials.form._areas')
                        @include('listings.partials.form._categories')

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $listing->title }}">

                            @if($errors->has('title'))
                                <span class="help-block">
                                    {{ $errors->first('title') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body" class="control-label">Body</label>
                            <textarea name="body" id="body" cols="30" rows="8" class="form-control">{{ $listing->body }}</textarea>

                            @if($errors->has('title'))
                                <span class="help-block">
                                    {{ $errors->first('title') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Save</button>
                        </div>
                        
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
