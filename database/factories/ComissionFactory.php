<?php

namespace Database\Factories;

use App\Models\Affiliate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comission>
 */
class ComissionFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'affiliate_id' => Affiliate::factory(), // Cria um novo Affiliate se não fornecido
            'value' => $this->faker->randomFloat(2, 50, 1000), // Valor entre 50 e 1000
            'date' => $this->faker->dateTimeThisYear()->format('Y-m-d'),
            'description' => $this->faker->sentence(),
        ];
    }
}
