<?php

namespace App\Http\Controllers;

use App\Mail\AuthUserMail;
use App\Services\Users\UsersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    private UsersService $usersService;

    public function __construct(UsersService $usersService)
    {
        $this->usersService = $usersService;
    } // __construct.

    public function createUser()
    {
        // TODO: Переделать.
        $password = 'user123';

        $user = $this->usersService->createUserFromArray([
            'name' => 'ivanov',
            'email' => 'danycall19@gmail.com',
            'password' => $password,
            'role_id' => 1,
            'employee_id' => 1
        ]);

        Mail::to($user->email)->send(new AuthUserMail($user));

        return 'Сообщение отправлено';
    } // createUser.
} // AdminController.
