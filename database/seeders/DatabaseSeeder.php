<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Organization::factory(10)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Module::factory(10)->create();
        \App\Models\Project::factory(10)->create();
        \App\Models\Propale::factory(10)->create();
        \App\Models\Document::factory(10)->create();
        \App\Models\Formation::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
