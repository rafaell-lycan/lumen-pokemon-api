<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Transformers\PokemonTransformer;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PokemonController extends Controller
{

    public function index()
    {
        $paginator = Pokemon::paginate(20);
        return $this->collection($paginator->getCollection(), new PokemonTransformer(), null, $paginator);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'number' => 'required',
            'description' => 'required',
            'url' => 'required'
        ],[
            'description.required' => 'Please fill out the :attribute.'
        ]);

        $pokemon = Pokemon::create($request->all());

        return response(
            $this->item($pokemon, new PokemonTransformer()),
            201
        );

        // return response()->json($pokemon, 201);
    }

    public function show($id)
    {
        // return $this->item(Pokemon::findOrFail($id), new PokemonTransformer());
        return $this->item(Pokemon::where("number", $id)->firstOrFail(), new PokemonTransformer());
    }

    public function update(Request $request, $id)
    {

        try {
            $pokemon = Pokemon::where("number", $id)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Pokémon not found. Consider adding it!'
                ] ], 404);
        }

        $this->validate($request, [
            'name' => 'required|max:255',
            'number' => 'required',
            'description' => 'required',
            'url' => 'required'
        ],[
            'description.required' => 'Please fill out the :attribute.'
        ]);

        $pokemon->fill($request->all());
        $pokemon->save();

        return $this->item($pokemon, new PokemonTransformer());
    }

    public function destroy($id)
    {
        try {
            $pokemon = Pokemon::where("number", $id)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response()->json([
            'error' => [
                'message' => 'Pokémon not found. Consider adding it!'
            ] ], 404);
        }

        $pokemon->delete();

        return response(null, 204);
    }
}
