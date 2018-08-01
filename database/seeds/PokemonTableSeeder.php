<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Pokemon;

class PokemonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Pokemon::create([
        'name' => 'Pikachu',
        'number' => 25,
        'description' => 'When several of these POKéMON gather, their electricity could build and cause lightning storms.',
        'url' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png'
      ]);

      Pokemon::create([
        'name' => 'Squirtle',
        'number' => 7,
        'description' => 'After birth, its back swells and hardens into a shell. Powerfully sprays foam from its mouth.',
        'url' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/7.png'
      ]);

      Pokemon::create([
        'name' => 'Bulbasaur',
        'number' => 1,
        'description' => 'A strange seed was planted on its back at birth. The plant sprouts and grows with this Pokémon.',
        'url' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png'
      ]);

      Pokemon::create([
        'name' => 'Charmander',
        'number' => 4,
        'description' => 'Obviously prefers hot places. When it rains, steam is said to spout from the tip of its tail.',
        'url' => 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/4.png'
      ]);
    }
}