<?php

namespace Database\Factories;

use App\Models\Company;
use DateTime;
use DateTimeZone;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Returns a timezone UTC offset by guessing from name .
     *
     * @var string
     * @return string
     */
    private function timezone_abbr_from_name($timezone_name){
        $dateTime = new DateTime(); 
        $dateTime->setTimeZone(new DateTimeZone($timezone_name)); 
        return $dateTime->format('P'); 
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'timezone' => $this->timezone_abbr_from_name($this->faker->timezone()),
            'lang' => $this->faker->randomElement(['en','es','pt']),
            'created_by' => $this->faker->randomNumber(4)
        ];
    }
}
