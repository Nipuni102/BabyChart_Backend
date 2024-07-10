<?php

namespace Database\Factories;

use App\Models\Child;
use App\Models\MidWife;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Child>
 */
class ChildFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Child::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'date_of_birth' => $this->faker->date,
            'hearing' => $this->faker->randomElement(['Normal', 'Impaired']),
            'height' => $this->faker->numberBetween(45, 120) . ' cm',
            'birth_weight' => $this->faker->numberBetween(2, 5) . ' kg',
            'eye_sight' => $this->faker->randomElement(['Normal', 'Impaired']),
            'blood_group' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'bmi' => $this->faker->numberBetween(15, 30),
            'child_birth_registration_number' => $this->faker->unique()->numerify('BR########'),
            'weight' => $this->faker->numberBetween(3, 20) . ' kg',
            'user_id' => User::factory(),
            'mid_wife_id' => MidWife::factory(),
        ];
    }
}
