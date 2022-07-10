<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publisher::create([
            'name' => 'Hoyoverse',
            'slug' => 'hoyoverse'
        ]);

        Publisher::create([
            'name' => 'Riot Games',
            'slug' => 'riot-games'
        ]);

        Publisher::create([
            'name' => 'EA Games',
            'slug' => 'ea-games'
        ]);

        Publisher::create([
            'name' => 'Rockstar',
            'slug' => 'rockstar'
        ]);

        Publisher::create([
            'name' => 'CD Projekt',
            'slug' => 'cd-projekt'
        ]);
    }
}
