@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Share listing <em>{{ $listing->title }}</em></div>
                <div class="panel-body">
                    <p>Share this listing with up to 5 people</p>

                    <form action="{{ route('listings.share.store', [$area, $listing]) }}" method="post">
                        @foreach(range(0, 4) as $x)
                            <div class="form-group{{ $errors->has('emails.' . $x) ? ' has-error' : '' }}">
                                <label for="emails.{{ $x }}" class="hidden">Email</label>
                                <input type="text" name="emails[]" id="emails.{{ $x }}" class="form-control" placeholder="someone@somewhere.com" value="{{ old('emails.' . $x) }}"> 

                                @if($errors->has('emails.' . $x))
                                    <span class="help-block">
                                        {{ $errors->first('emails.' . $x) }}
                                    </span>
                                @endif
                            </div>
                            
                        @endforeach

                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message">Message (optional) </label>
                            <textarea name="message" id="" cols="30" rows="5" class="form-control"></textarea>

                            @if($errors->has('message'))
                                <span class="help-block">
                                    {{ $errors->first('message') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>

                        {{ csrf_field() }}
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
@endsection
