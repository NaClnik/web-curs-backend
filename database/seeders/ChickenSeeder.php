<?php

namespace Database\Seeders;

use App\Models\Chicken;
use Illuminate\Database\Seeder;

class ChickenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chicken::factory()->count(30)->create();
    } // run.
}
