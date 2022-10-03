<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class ModuleFactory extends Factory
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
            'reference' => $this -> faker -> word(),
            'program' => $this -> faker -> text(100),
            'description' => $this -> faker -> text(50),
            'domain' => $this -> faker -> randomElement(['informatique ','RH','droit']),
            'durationHours' => $this -> faker -> randomDigitNotNull(),
            'durationDays' => $this -> faker ->randomDigitNotNull(),
        ];
    }
}
