<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(DietSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ShopSeeder::class);
        $this->call(RowSeeder::class);
        $this->call(BreedSeeder::class);
        $this->call(CellSeeder::class);
        $this->call(ChickenSeeder::class);
        $this->call(ReportSeeder::class);
    } // run.
}
