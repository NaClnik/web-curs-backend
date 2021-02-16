<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Redirects\RedirectsService;
use App\Services\Users\UsersService;
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
        $response = response()->json([], 401);

        $data = $request->all();

        // TODO: Проверить переданные данные на null.
        $user = $this->usersService->getUserByEmailAndPassword($data['email'], $data['password']);

        if($user != null){
            $response = response()->json([
                'api_token' => $user->api_token,
                'redirect_to' => $this->redirectsService->getRedirectUrlByRole($user->role->name)
            ]);
        } // if.

        return $response;
    } // __invoke.
}
