<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Publisher;
use App\Models\Category;
use App\Models\Game;
use JetBrains\PhpStorm\Pure;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        Category::create([
            'name' => 'FPS',
            'slug' => 'fps'
        ]);


        Category::create([
            'name' => 'RPG',
            'slug' => 'rpg'
        ]);


        Category::create([
            'name' => 'Sport',
            'slug' => 'sport'
        ]);

        Category::create([
            'name' => 'Action',
            'slug' => 'action'
        ]);

        Category::create([
            'name' => 'Strategy',
            'slug' => 'strategy'
        ]);

        Category::create([
            'name' => 'Simulation',
            'slug' => 'simulation'
        ]);

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

        Game::factory(10)->create();
        Category::factory(3)->create();
        Publisher::factory(3)->create();
    }
}
