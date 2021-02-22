<?php

namespace Database\Factories;

use App\Models\Chicken;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChickenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chicken::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'weight' => rand(1, 5),
            'age' => rand(1, 5),
            'number_of_eggs' => rand(10, 100),
            'breed_id' => rand(1, 30),
            'cell_id' =>rand(1, 30)
        ];
    }
}
