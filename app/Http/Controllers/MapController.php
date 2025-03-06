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

    public function edit(Map $map)
    {
        return view('map/edit', ['map' => $map]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'string',
            'url' => 'url',
            'note' => 'string',
            'comment' => 'string',
        ]);

        $map = Map::findOrFail($id);
        $coord = $map->coord;

        $map->update($request->only(['title', 'url', 'note', 'comment']));
        $validatedCoords = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'altitude_value' => 'required|string',
        ]);
        if ($validatedCoords) {
            $validatedCoords['altitude'] = $validatedCoords['altitude_value'] . 'z';
            unset($validatedCoords['altitude_value']);
            if ($coord) {
                foreach ($validatedCoords as $key => $value) {
                    $coord[$key] = $value;
                }
                //$coord->save();
            } else {
                $coord = new Coord($validatedCoords);
            }
            if ($coord->save()) {
                $map->coord()->associate($coord);
            }
        }

        return redirect()->route('map.show', ['map' => $map])->with('success', 'Map updated successfully');
    }

    public function destroy(Map $map)
    {
        $map->delete();
        return redirect()->route('map.index')->with('success', 'Map deleted successfully');
    }

    public function fetchAllCoordinates()
    {
        $coordinates = Coord::with('Map')->get();
        return $coordinates;
    }
}