<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        $name = $this->faker->unique()->word;
        return [
            'parent_id' => Category::inRandomOrder()->first()->id,
            'name' => $name,
            'content' => $this->faker->text,
        ];
    }
}