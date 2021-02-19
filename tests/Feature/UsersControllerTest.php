<?php

namespace Tests\Feature;

use Faker\Generator;
use Faker\Provider\Address;
use Illuminate\Container\Container;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use PharIo\Manifest\Email;
use Tests\TestCase;

class UsersControllerTest extends TestCase
{
    // TODO: Переместить в файл конфига.
    private $headers = [
        'Authorization' => 'Bearer 6y2q8OZPXqSpFOjX5eP300BixTdLCsHo5j6IiDC20niuJt7kp3wnprpcTWp4D2DVpElKewXY6WBFCrtF',
    ];

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->getJson(route('users.index'), $this->headers);

        $response->assertStatus(200);
    } // testIndex.

    public function testStore()
    {
        $faker = Container::getInstance()->make(Generator::class);

        $params = [
            'email' => $faker->email,
            'password' => $faker->password,
            'surname' => $faker->lastName,
            'name' => $faker->firstName,
            'patronymic' => $faker->firstName,
            'passport' => Str::random(8),
            'salary' => rand(50000, 200000),
            'photo_path' => $faker->imageUrl()
        ];

        $response = $this->post(route('users.store'), $params, $this->headers);

        $response->assertStatus(201);
    } // testStore.

    public function testShow()
    {
        $response = $this->getJson(route('users.show', ['user' => 1]), $this->headers);

        $response->assertStatus(200);
    } // testShow.

    public function testUpdate()
    {
        $faker = Container::getInstance()->make(Generator::class);

        $params = [
            'email' => $faker->email,
            'surname' => $faker->lastName,
            'patronymic' => $faker->firstName,
            'salary' => rand(50000, 200000),
            'photo_path' => $faker->imageUrl()
        ];

        $response = $this->patch(route('users.update', ['user' => 1]), $params, $this->headers);

        $response->assertStatus(200);
    } // testUpdate.

    public function testDestroy()
    {
        $response = $this->delete(route('users.destroy', ['user' => 7]), [], $this->headers);

        $response->assertStatus(204);
    } // testDestroy.
}
