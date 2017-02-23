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

    	return redirect()->route('category.index', [$area]);
    }
}
