<?php
# @Date:   2020-12-29T13:51:12+00:00
# @Last modified time: 2021-01-10T12:25:05+00:00




namespace Database\Factories;
//calling the patient and insurance company model
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
      //declaring what information we want to be put into the database
      //insert a random number for the policy number in the patients table when the db is seeded
        return [
            'policy_no' => $this->faker->unique()->randomNumber,
            //calling the insranceCompany factory to display one of the created company ids in the patients table
            'insurance_company_id' => InsuranceCompany::factory()
        ];
    }
}
