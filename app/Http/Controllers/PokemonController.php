<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PokemonController extends Controller
{

    public function index()
    {
        return response()->json(Pokemon::all());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'number' => 'required',
            'description' => 'required'
        ],[
            'description.required' => 'Please fill out the :attribute.'
        ]);

        $pokemon = Pokemon::create($request->all(), [
            'url' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/' . $request->number . '.png'
        ]);

        return response()->json($pokemon, 201);
    }

    public function show($id)
    {
        return response('show ' + $id);
    }

    public function update(Request $request, $id)
    {
        return response('update ' + $id);
    }

    public function destroy($id)
    {
        return response('destroy ' + $id);
    }
}
