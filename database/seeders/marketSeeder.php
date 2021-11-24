<?php

namespace Database\Seeders;

use App\Models\market;
use Illuminate\Database\Seeder;

class marketSeeder extends Seeder
{
    public function run()
    {
        market::factory()->count(50)->create();
    }
}
