<?php

namespace Database\Seeders;

use App\Models\Follow;
use Illuminate\Database\Seeder;

class FollowSeeder extends Seeder
{
    public function run()
    {
        Follow::factory()->count(10)->create();
    }
}