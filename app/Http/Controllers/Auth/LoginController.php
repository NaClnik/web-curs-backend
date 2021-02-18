<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Redirects\RedirectsService;
use App\Services\Users\UsersService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Сервисы.
    private UsersService $usersService;
    private RedirectsService $redirectsService;

    public function __construct(UsersService $usersService, RedirectsService $redirectsService)
    {
        $this->usersService = $usersService;
        $this->redirectsService = $redirectsService;
    } // __construct.

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request)
    {
        $data = $request->all();

        try {
            // TODO: Подумать над переводом на русский.
            $user = $this->usersService->getUserByEmailAndPassword($data['email'], $data['password']);
        } catch (ModelNotFoundException | AuthorizationException $modelNotFoundException){
            return response()->json(['error' => 'invalid email or password'], 401);
        } // catch.

        return response()->json([
            'api_token' => $user->api_token,
            'redirect_to' => $this->redirectsService->getRedirectUrlByRole($user->role->name)
        ]);
    } // __invoke.
}
