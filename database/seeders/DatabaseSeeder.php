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
            'competences' => 'Super dev, sympa, français, aime les jeux, sympa, français, aime les jeux, sympa, français, aime les jeux, sympa, français, aime les jeux, sympa, français, aime les jeux',
            'first_name' => 'Kévin',
            'last_name' => 'Gasté',
            'description' => 'Je suis là et je suis ici blablablablablbal mais je ne sais pas quoi écrire ici donc voilà ce que vous aurez mdr suis là et je suis ici blablablablablbal mais je ne sais pas quoi écrire ici donc voilà ce que vous aurez mdr suis là et je suis ici blablablablablbal mais je ne sais pas quoi écrire ici donc voilà ce que vous aurez mdr suis là et je suis ici blablablablablbal mais je ne sais pas quoi écrire ici donc voilà ce que vous aurez mdr suis là et je suis ici blablablablablbal mais je ne sais pas quoi écrire ici donc voilà ce que vous aurez mdr',
            'email' => 'lanza@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'mobilityDepartment' => "[\"Aube\", \"Paris\", \"Meuse\", \"Mosette\"]",
            'role' => 99,
            'profile_photo_path' => "https://busiup.fr/wp-content/uploads/2021/02/photo-OD-2018-nb-1.jpg",
            'poste' => 'Stagiaire',
            'telephone' => '01 02 03 04 05',
            'catchPhrase' => 'La team rocket s\'envole vers d\'autre cieuuuuux',
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
