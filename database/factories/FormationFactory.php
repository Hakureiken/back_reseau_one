<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formation>
 */
class FormationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'content' => $this->faker->text(50),
            'starting_date' => $this->faker->dateTimeBetween('-3 week', 'now'),
            'ending_date' => $this -> faker -> dateTimeBetween('now', '+3 week'),
            'document_id' => $this -> faker -> randomDigitNotNull(), // password
        ];
    }
}
