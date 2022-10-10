<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        DB::table('users')->insert([
            'organization_id' => null,
            'first_name' => 'Kévin',
            'last_name' => 'Gasté',
            'email' => 'lanza@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'mobilityDepartment' => "['Aube', 'Paris']",
            'role' => 99,
            'poste' => 'Stagiaire',
            'telephone' => '01 02 03 04 05',
            'image' => null,
            'remember_token' => Str::random(10),
        ]);
    }
}
