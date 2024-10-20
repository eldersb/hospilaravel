<?php

namespace Database\Factories;

use App\Models\Especialidades;
use App\Models\Hospital;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicos>
 */
class MedicosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nome" => $this->faker->name(),
            "hospital_id" => Hospital::inRandomOrder()->first(),
            "especialidades_id" => Especialidades::inRandomOrder()->first()
        ];
    }
}
