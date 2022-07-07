<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hero;

class HeroController extends Controller
{
    public function index(Request $request)
    {
        $attributes = $request->only(['name']);

        if(!array_key_exists('name', $attributes)){
            $records = Hero::findAll();
        } else {
            $records = Hero::findByName($attributes['name']);
        }

        return response()->json($records, 200, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    public function show($id)
    {
        $records = Hero::findById($id);

        return response()->json($records, 200, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    public function create(Request $request)
    {
        $attributes = $request->only(['name']);

        $records = Hero::createHero($attributes['name']);

        return response()->json($records, 200, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    public function update(Request $request)
    {
        $attributes = $request->only(['id', 'name']);

        $records = Hero::updateHero($attributes['id'], $attributes['name']);

        return response()->json($records, 200, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }

    public function delete($id)
    {
        $records = Hero::deleteHero($id);

        return response()->json($records, 200, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }
}
