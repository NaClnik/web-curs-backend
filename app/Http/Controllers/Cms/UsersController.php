<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Users\UsersService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    private UsersService $usersService;

    public function __construct(UsersService $usersService)
    {
        $this->usersService = $usersService;
    } // __construct.

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json($this->usersService->getAllUsers());
    } // index.

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->usersService->hireUserAndSendMail($request->all());

        return response('', 201);
    } // store.

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user)
    {
        return response()->json($user);
    } // show.

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return Application|ResponseFactory|Response|void
     */
    public function update(Request $request, User $user)
    {
        $this->usersService->updateUser($user, $request->all());

        return response('');
    } // update.

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Application|ResponseFactory|JsonResponse|Response
     * @throws Exception
     */
    public function destroy(User $user)
    {
        try {
            $this->usersService->deleteUser($user);
        } catch (Exception $exception){
            return response()->json(['error' => 'user not found'], 404);
        } // catch.

        return response('', 204);
    } // destroy.
}
