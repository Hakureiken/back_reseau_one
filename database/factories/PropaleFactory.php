<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Propale>
 */
class PropaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'project_id' => $this -> faker -> randomDigitNotNull(),
            'name_devis' => $this -> faker -> name(),
            'is_accepted' => $this -> faker -> boolean(),
            'is_validated' => $this -> faker -> boolean(),

        ];
    }
}
