<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHireUser()
    {
        $email = 'danycall19@gmail.com';
        $password = 'snake';
        $surname = 'Дзевелюк';
        $name = 'Даниил';
        $patronymic = 'Олегович';
        $passport = 'SA2801';
        $salary = 100000;
        $photoPath = 'uploads/49oGi44dxIXms5zZ4mMC7u1xbU4fFqCSC5MVUA73.jpg';


        $response = $this->post('/api/admin/hireUser', [
            'email' => $email,
            'password' => $password,
            'surname' => $surname,
            'name' => $name,
            'patronymic' => $patronymic,
            'passport' => $passport,
            'salary' => $salary,
            'photo_path' => $photoPath
        ]);
    } // testHireUser.
}
