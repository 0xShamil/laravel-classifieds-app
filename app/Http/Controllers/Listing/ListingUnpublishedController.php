<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingUnpublishedController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth']);
	}

    public function index(Request $request)
    {
    	dd('index');
    }
}
