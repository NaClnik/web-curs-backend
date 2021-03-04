<?php


namespace App\Services\Users\Handlers;


use App\Mail\AuthUserMail;
use App\Services\Users\Repositories\UsersRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HireUserAndSendMailHandler
{
    private UsersRepository $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    } // __construct.

    private function createUser(array $data){
        return $this->usersRepository->createFromArray([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'api_token' => Str::random(80),
            'role_id' => 2,
            'surname' => $data['surname'],
            'name' => $data['name'],
            'patronymic' => $data['patronymic'],
            'passport' => $data['passport'],
            'salary' => $data['salary'],
            'photo_path' => $data['photo_path']
        ]);
    } // hireEmployee.

    public function handle(array $data)
    {
        $user = $this->createUser($data);

        Mail::to($data['email'])->send(new AuthUserMail($data['email'], $data['password']));
    } // handle.
}
