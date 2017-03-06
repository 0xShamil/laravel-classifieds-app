<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\{Area, Category, Listing};

use App\Jobs\UserViewedListing;

use App\Http\Requests\StoreListingFormRequest;

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

    public function store(StoreListingFormRequest $request, Area $area)
    {
        $listing = new Listing;

        $listing->title = $request->title;
        $listing->body = $request->body;
        $listing->category_id = $request->category_id;
        $listing->area_id = $request->area_id;
        $listing->user()->associate($request->user());

        $listing->save();

        return redirect()->route('listings.edit', [$area, $listing]);
    }

    public function edit(Request $request, Area $area, Listing $listing)
    {
        $this->authorize('edit', $listing);

        return view('listings.edit', compact('listing'));
    }

    public function update(StoreListingFormRequest $request, Area $area, Listing $listing)
    {
        $this->authorize('update', $listing);

        $listing->title = $request->title;
        $listing->body = $request->body;

        if(!$listing->live()) {
            $listing->category_id = $request->category_id;
        }

        $listing->area_id = $request->area_id;

        $listing->save();

        if ($request->has('payment')) {
            return redirect()->route('listings.payment.show', [$area, $listing]);
        }

        return back()->withSuccess('Listing edited successfully');
    }
}
