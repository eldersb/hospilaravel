<?php

namespace Database\Factories;

use App\Models\Especialidades;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Especialidades>
 */
class EspecialidadesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Especialidades::class;

    public function definition(): array
    {
        return [
            "nome" => $this->faker->randomElement(['pediatria', 'ortopedia', 'cardiologia'])
        ];
    }
}
