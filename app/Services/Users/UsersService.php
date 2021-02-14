<?php


namespace App\Services\Users;


use App\Mail\AuthUserMail;
use App\Models\User;
use App\Services\Users\Repositories\UsersRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

    public function createUser(array $data){
        return $this->usersRepository->createFromArray([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'api_token' => Str::random(80),
            'role_id' => 1,
            'surname' => $data['surname'],
            'name' => $data['name'],
            'patronymic' => $data['patronymic'],
            'passport' => $data['passport'],
            'salary' => $data['salary'],
            'photo_path' => $data['photo_path']
        ]);
    } // hireEmployee.

    public function hireUserAndSendMail(array $data)
    {
        $user = $this->createUser($data);

        Mail::to($user->email)->send(new AuthUserMail($data['email'], $data['password']));
    }
} // UsersService.
