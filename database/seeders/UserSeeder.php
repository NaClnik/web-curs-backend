<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
            'email' => 'danycall19@gmail.com',
            'password' => 'snake',
            'api_token' => 'stub_admin_api_token',
            'role_id' => 1,
            'surname' => 'Дзевелюк',
            'name' => 'Даниил',
            'patronymic' => 'Олегович',
            'passport' => 'DA2485',
            'salary' => 10000000,
            'photo_path' => 'stub_path'
        ]);
        User::factory()->count(29)->create();
    } // run.
}
