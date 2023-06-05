<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AlexPechkarev\GoogleMaps\GoogleMaps;

class MapController extends Controller
{
    public function showMap()
{
    $map = new GoogleMaps();

    return view('map', compact('map'));
}
}
