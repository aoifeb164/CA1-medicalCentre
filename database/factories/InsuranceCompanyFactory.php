<?php
# @Date:   2020-12-29T14:24:19+00:00
# @Last modified time: 2021-01-10T12:25:44+00:00




namespace Database\Factories;
//calling the insurance company model
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
      //insert a company name and address in the insurance company table when the db is seeded
        return [
          'name' => $this->faker->company,
          'address' => $this->faker->address
        ];
    }
}
