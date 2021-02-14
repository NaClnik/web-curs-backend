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

    public function hireUser(Request $request)
    {
        $this->usersService->hireUserAndSendMail($request->all());
    } // createUser.

    public function uploadPhoto(Request $request){
        return $request->file('photo')->store('uploads', 'public');
    } // uploadPhoto.
} // AdminController.
