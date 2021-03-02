<?php

namespace Database\Factories;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    private $i = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('snake'),
            'api_token' => 'stub_employee_api_token'.++$this->i,
            'role_id' => 2,
            'surname' => $this->faker->lastName,
            'name' => $this->faker->firstName,
            'patronymic' => $this->faker->firstName,
            'passport' => Str::random(6),
            'salary' => rand(10000, 100000),
            'photo_path' => $this->faker->imageUrl()
        ];
    }
}
