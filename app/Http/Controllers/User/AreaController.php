<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Area;

class AreaController extends Controller
{
    public function store(Area $area)
    {
    	session()->put('area', $area->slug);

    	//TODO: redirect to category index
    	return redirect()->back();
    }
}
