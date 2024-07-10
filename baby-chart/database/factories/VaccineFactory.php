<?php

namespace Database\Factories;

use App\Models\Child;
use App\Models\Vaccine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vaccine>
 */
class VaccineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Vaccine::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'vaccinated_date' => $this->faker->date,
            'batch_no' => $this->faker->unique()->numerify('BATCH####'),
            'adverse_effects' => $this->faker->randomElement(['None', 'Mild', 'Severe']),
            'age_to_be_vaccinated' => $this->faker->date,
            'child_id' => Child::factory(),
        ];
    }
}
