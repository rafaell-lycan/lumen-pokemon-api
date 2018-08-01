<?php
namespace App\Transformers;

use App\Models\Pokemon;
use League\Fractal\TransformerAbstract;

class PokemonTransformer extends TransformerAbstract {
    /**
     * @param Pokemon $pokemon
     * @return array
     */
    public function transform(Pokemon $pokemon)
    {
        return [
            'name' => $pokemon->name,
            'number' => $pokemon->number,
            'description' => $pokemon->description,
            'url' => $pokemon->url
        ];
    }
}