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

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'snake',
            'api_token' => Str::random(80),
            'role_id' => 2,
            'surname' => $this->faker->lastName,
            'name' => $this->faker->name,
            'patronymic' => $this->faker->name,
            'passport' => Str::random(6),
            'salary' => rand(10000, 100000),
            'photo_path' => $this->faker->imageUrl()
        ];
    }
}
