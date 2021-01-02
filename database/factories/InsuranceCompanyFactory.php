<?php
# @Date:   2020-12-29T14:24:19+00:00
# @Last modified time: 2021-01-02T15:19:43+00:00




namespace Database\Factories;

use App\Models\InsuranceCompany;
use Illuminate\Database\Eloquent\Factories\Factory;

class InsuranceCompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = InsuranceCompany::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      //declaring what information we want to be put into the database
      //insert a random company name and address in the insurance company table when the db is seeded
        return [
          'name' => $this->faker->company,
          'address' => $this->faker->address
        ];
    }
}
