<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\{Area, Listing};

class ListingShareController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth']);
	}
	
    public function index(Area $area, Listing $listing)
    {
    	return view('listings.share.index', compact('listing'));
    }

    public function store()
    {
    	//
    }
}
