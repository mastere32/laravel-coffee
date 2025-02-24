<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Map;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $lines = [...$this->fetchData()];
        return view('map/index', ['lines' => $lines]);

    }

    public function show($id)
    {
        return view('map/show', ['id' => $id]);
    }

    public function fetchData()
    {
        $maps = Map::all();
        foreach ($maps as $map) {
            if ($map->coord) {
                $map['lat'] = $map->coord->latitude;
                $map['lon'] = $map->coord->longitude;
            }
        }

        return $maps;
    }
}