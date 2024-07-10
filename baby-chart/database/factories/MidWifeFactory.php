<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MidWife>
 */
class MidWifeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'employee_id' => $this->faker->unique()->numerify('EMP####'),
            'phone_number' => $this->faker->phoneNumber,
            'area' => $this->faker->city,
            'area_no' => $this->faker->randomNumber(3),
            'rdhs_division' => $this->faker->state,
            'moh_area' => $this->faker->city,
        ];
    }
}
