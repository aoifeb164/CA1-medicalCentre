<?php
# @Date:   2020-12-29T14:35:14+00:00
# @Last modified time: 2020-12-29T14:59:55+00:00




namespace Database\Factories;

use App\Models\User;
use App\Models\Patient;
use App\Models\Visit;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Visit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'date' => $this->faker->date,
          'time' => $this->faker->time,
          'description' => $this->faker->sentence(10),
          'patient_id' => User::factory(),
          'doctor_id' => User::factory()
        ];
    }
}
