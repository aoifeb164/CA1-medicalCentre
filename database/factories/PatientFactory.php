<?php
# @Date:   2020-12-29T13:51:12+00:00
# @Last modified time: 2020-12-29T14:30:21+00:00




namespace Database\Factories;

use App\Models\Patient;
use App\Models\InsuranceCompany;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'policy_no' => $this->faker->unique()->randomNumber,
            'insurance_company_id' => InsuranceCompany::factory()
        ];
    }
}
