<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coord;
use App\Models\Map;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $maps = Map::with('Coord')->get();
        return view('map/index', ['maps' => $maps]);
    }

    public function show($map)
    {
        $map = Map::with('Coord')->findOrFail($map);
        return view('map/show', ['map' => $map]);
    }

    }

    public function fetchAllCoordinates()
    {
        $coordinates = Coord::with('Map')->get();
        return $coordinates;
    }
}