<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingPublishedController extends Controller
{
    public function __construct()
	{
		$this->middleware(['auth']);
	}

    public function index(Request $request)
    {
    	$listings = $request->user()->listings()->with(['area'])->isLive()->latestFirst()->paginate(10);

    	return view('user.listings.published.index', compact('listings'));
    }
}
