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
            'id_crm' => $this -> faker -> word(),
            'laraRef' => $this -> faker ->unique()-> word(),
            'assignedUserName' => $this -> faker -> word(),
            'assignedUserId' => $this -> faker -> word(),
            'name' => $this -> faker -> name(),
            'concernedPublic' => $this -> faker -> text(50),
            'dateAndLocation' => $this -> faker -> text(50),
            'description' => $this -> faker -> text(50),
            'objective' => $this -> faker-> text(50),
            'prerequisite' => $this -> faker -> text(50),
            'trainingprogram' => $this -> faker -> text(50),
            'reference' => $this -> faker -> word(),
            'duration_hours' => $this -> faker -> numberBetween(20,800),
            'duration_days' => $this -> faker -> numberBetween(7,170),
            'document_id' => $this -> faker -> randomDigitNotNull(),
            'is_submitted' => $this -> faker -> boolean()
        ];
    }
}
