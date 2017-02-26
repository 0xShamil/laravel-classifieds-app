<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Area;

class HomeController extends Controller
{
    public function index()
    {
    	session()->forget('area');
    	
        $areas = Area::get()->toTree();

        return view('home', compact('areas'));
    }
}
