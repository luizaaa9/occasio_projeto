<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuestaoFactory extends Factory
{
    public function definition()
{
    return [
        'disciplina_id' => fake()->numberBetween(1,10),
        'enunciado' => fake()->paragraph(3),

        'alternativa_a' => fake()->sentence(),
        'alternativa_b' => fake()->sentence(),
        'alternativa_c' => fake()->sentence(),
        'alternativa_d' => fake()->sentence(),
        'alternativa_e' => fake()->sentence(),

        'correta' => fake()->randomElement(['a','b','c','d','e']),
    ];
}

}
