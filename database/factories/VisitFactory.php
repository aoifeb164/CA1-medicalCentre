<?php
# @Date:   2020-12-29T14:35:14+00:00
# @Last modified time: 2021-01-02T15:22:53+00:00




namespace Database\Factories;
//calling the user, patient and visit models
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
      //declaring what information we want to be put into the database
      //insert the randomly generated information into the visits table when the db is seeded
        return [
          'date' => $this->faker->date,
          'time' => $this->faker->time,
          'description' => $this->faker->sentence(10),
          //calling the patient and doctor factories to display one of the created patient and doctor ids in the visits table
          'patient_id' => User::factory(),
          'doctor_id' => User::factory()
        ];
    }
}