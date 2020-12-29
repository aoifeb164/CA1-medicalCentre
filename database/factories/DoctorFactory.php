<?php
# @Date:   2020-12-29T13:52:20+00:00
# @Last modified time: 2020-12-29T14:09:58+00:00




namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
              'registration_no' => $this->faker->unique()->randomNumber
        ];
    }
}
