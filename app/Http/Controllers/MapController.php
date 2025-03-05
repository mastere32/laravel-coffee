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
        $lines = Map::with('Coord')->get();
        return view('map/index', ['lines' => $lines]);
    }

    public function show($id)
    {
        return view('map/show', ['id' => $id]);
    }

    public function fetchAllCoordinates()
    {
        $coordinates = Coord::with('Map')->get();
        return $coordinates;
    }
}