<?php
# @Date:   2020-12-29T13:52:20+00:00
# @Last modified time: 2021-01-02T15:19:40+00:00




namespace Database\Factories;
//calling the doctor model
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
      //declaring what information we want to be put into the database
      //insert a unique random number in the registration number in the doctor table when the db is seeded
        return [
              'registration_no' => $this->faker->unique()->randomNumber
        ];
    }
}
