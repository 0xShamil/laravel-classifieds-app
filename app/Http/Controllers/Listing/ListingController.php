<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\{Area, Category, Listing};

use App\Jobs\UserViewedListing;

class ListingController extends Controller
{
    public function index(Area $area, Category $category)
    {
    	$listings = Listing::with(['user', 'area', 'viewedUsers'])->isLive()->inArea($area)->fromCategory($category)->latestFirst()->paginate(10);

    	return view('listings.index', compact('listings', 'category'));
    }

    public function show(Request $request, Area $area, Listing $listing)
    {
    	if(!$listing->live()) {
    		abort(404);
    	}

        if($request->user()) {
            dispatch(new UserViewedListing($request->user(), $listing));
        }

    	return view('listings.show', compact('listing'));
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $listing = new Listing;

        $listing->title = $request->title;
        $listing->body = $request->body;
        $listing->category_id = $request->category_id;
        $listing->area_id = $request->area_id;
        $listing->user()->associate($request->user());

        $listing->save();


    }
}
