<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'organization_id' => $this->faker->randomDigitNotNull(),
            'crm_id' => $this->faker->name(),
            'competences' => $this->faker->words(5,true),
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'description' => $this->faker->text(100),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'mobilityDepartment' => json_encode($this->faker->words(3, false)),
            'role' => $this->faker->numberBetween(0,100),
            'profile_photo_path' => 'https://busiup.fr/wp-content/uploads/2021/02/photo-OD-2018-nb-1.jpg',
            'poste' => $this->faker->word(),
            'reseaux' => $this->faker->word(),
            'telephone' => $this->faker->word(),
            'image' => $this->faker->image(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name.'\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }
}
