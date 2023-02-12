<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Doc;
use App\Models\User;
use App\Models\Company;

class DocFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doc::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'name' => $this->php('/temp', '/temp', false),
            'name' => $this->faker->lexify('???????????').'.pdf',
            'date_limit_to_sign' => $this->faker->dateTimeThisYear(),
            'company_id' => Company::pluck('id')->random(),
            'created_by' => User::pluck('id')->random()
        ];
    }
}
