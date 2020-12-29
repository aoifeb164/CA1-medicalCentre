<?php
# @Date:   2020-12-29T14:24:19+00:00
# @Last modified time: 2020-12-29T14:26:24+00:00




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
        return [
          'name' => $this->faker->company,
          'address' => $this->faker->address
        ];
    }
}
