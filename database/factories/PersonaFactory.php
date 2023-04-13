<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class PersonaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha_nacimiento'=>fake()->date(),
            'primer_nombre' => fake()->name(),
            'segundo_nombre' => fake()->name(),
            'primer_apellido' => fake()->name(),
            'segundo_apellido' => fake()->name(),
            'numero'=>fake()->numberBetween(10000000,99999999),
            'correo'=>fake()->name(),
            'sexo'=>fake()->numberBetween(1,2),
            'estado_civil'=>fake()->numberBetween(1,4),
            'departamento'=>fake()->numberBetween(1,22),
            'municipio'=>fake()->numberBetween(1,10),
            'direccion'=>fake()->name(),
            
        ];
    }
}
