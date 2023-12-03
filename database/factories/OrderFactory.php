<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement(['pending', 'accepted', 'not accepted']),
            'content' => $this->faker->text,
            'address_id' => Address::inRandomOrder()->first()->id,
        ];
    }
}