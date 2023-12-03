<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    protected $model = OrderItem::class;

    public function definition()
    {
        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'order_id' => Order::inRandomOrder()->first()->id,
            'sku' => $this->faker->text,
            'discount' => $this->faker->text,
            'quantity' => $this->faker->numberBetween(1,10),
        ];
    }
}