<?php

namespace App\Http\Controllers\Listing;

use Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreListingContactFormRequest;
use App\Mail\ListingContactCreated;

use App\{Area, Listing, User, Category};

class ListingContactController extends Controller
{
	public function __construct()
	{
		return $this->middleware(['auth']);
	}

    public function store(StoreListingContactFormRequest $request, Area $area)
    {
    	Mail::to($listing->user)->queue(
    		new ListingContactCreated($listing, $request->user(), $request->message)
    	);

    	return back()->withSuccess("We have sent your message to {{ $listing->user->name }}");
    }
}
