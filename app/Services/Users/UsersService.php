<?php


namespace App\Services\Users;


use App\Models\User;
use App\Services\Users\Repositories\UsersRepository;

class UsersService
{
    // Поля класса.
    private UsersRepository $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    } // __construct.

    public function createUserFromArray(array $data): User
    {
        return $this->usersRepository->createFromArray($data);
    } // createUserFromArray.
} // UsersService.
