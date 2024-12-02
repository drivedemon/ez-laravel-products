<?php

namespace Database\Factories;

use App\Enums\CustomerGender;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'birth_date' => Carbon::create('2000', '1', '1'),
            'gender' => array_rand(CustomerGender::cases()),
            'balance' => random_int(10000, 1000000000),
            'address' => $this->faker->address,
            'subdistrict' => 'subdistrict BKK',
            'district' => 'district BKK',
            'province' => 'province BKK',
            'zipcode' => 'zipcode BKK',
        ];
    }
}
