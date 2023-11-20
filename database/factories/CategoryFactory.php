<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
// use Faker\Provider\vi_VN\Product as ViPersonProvider;
// use Faker\Provider\vi_VN\Address as ViAddressProvider;
// use Faker\Provider\vi_VN\PhoneNumber as ViPhoneNumberProvider;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        // $faker = \Faker\Factory::create('vi_VN');
        // $faker->addProvider(new ViPersonProvider($faker));
        // $faker->addProvider(new ViAddressProvider($faker));
        // $faker->addProvider(new ViPhoneNumberProvider($faker));

        // $avatarNumber = $faker->numberBetween(1, 100);

        return [

            'category_id' => $faker->randomElement([ '1', '2', '3', '4']),
            'parent_id' => $faker->randomElement([ '1', '2', '3', '4']),
            'name' => $faker->word,
            'content' => $faker->word

        ];
    }
}