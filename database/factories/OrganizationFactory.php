<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'crm_id' => $this -> faker -> word(),
            'siret' => $this -> faker -> word(),
            'numSalaries' => $this -> faker -> word(),
            'codeAPENAF' => $this -> faker -> word(),
            'numTVA' => $this -> faker -> word(),
            'opcoOpca' => $this -> faker -> word(),
            'idcc' => $this -> faker -> word(),
            'denominationUniteLegale' => $this -> faker -> word(),
            'libelleCommuneEtablissement' => $this -> faker -> word(),
            'postalCodeEtablissement' => $this -> faker -> word(),
            'numVoieEtablissement' => $this -> faker -> word(),
            'typeVoieEtablissement' => $this -> faker -> word(),
            'libelleVoieEtablissement' => $this -> faker -> word(),
        ];
    }
}
