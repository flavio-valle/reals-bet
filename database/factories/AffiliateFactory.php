<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Affiliate>
 */
class AffiliateFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'cpf' => $this->faker->numerify('###.###.###-##'), // Gera um CPF formatado
            'birth_date' => $this->faker->date('Y-m-d', '2003-12-31'), // Até 21 anos de idade
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->stateAbbr(), 
        ];
    }
}
