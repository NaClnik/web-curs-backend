<?php


namespace App\Services\Users\Repositories;


use App\Models\User;

class UsersRepository
{
    public function createFromArray(array $data): User{
        return User::query()->create($data);
    } // createFromArray.
} // UsersRepository.
