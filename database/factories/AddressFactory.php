<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    protected $model = Address::class;

    public function definition()
    {
        return [
            'specific_address' => 'none',
            'city' => $this->faker->city(),
            'road' => $this->faker->streetAddress($city),
            'phone_number' => $this->faker->numerify('##########'),
        ];
    }
}