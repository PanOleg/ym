<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition()
    {
        return [
            'title' => $this->faker->company,
            'phone' => $this->faker->phoneNumber,
            'description' => $this->faker->sentence,
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
