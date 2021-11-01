<?php

namespace Database\Seeders;

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
        /*
        $p1 = new Pokemon;

        $p1->name = "Brian";
        $p1->HP = 40;
        $p1->type = "water";
        $p1->save(); */

        //factory(App\Models\Pokemon::class, 50)->create();
        $pokemon = Pokemon::factory()->count(50)->create();
    }
}
