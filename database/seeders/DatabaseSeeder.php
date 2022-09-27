<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('users')->insert([
            'organization_id' => null,
            'name' => 'Kévin Gasté',
            'email' => 'lanza@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 99,
            'adress' => '1 rue des sangliers',
            'image' => null,
            'remember_token' => Str::random(10),
        ]);
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
