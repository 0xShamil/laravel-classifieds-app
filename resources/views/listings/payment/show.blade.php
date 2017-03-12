@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pay for listing</div>
                <div class="panel-body">
                    @if($listing->cost() == 0)
                        <form action="{{ route('listings.payment.update', [$area, $listing]) }}" method="post">
                            <p>There's nothing for you to pay.</p>
                            <button type="submit" class="btn btn-primary">Complete</button>

                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                        </form>
                    @else
                        <p>Total cost: ${{ number_format($listing->cost(), 2) }}</p>
                        <payment-form></payment-form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
