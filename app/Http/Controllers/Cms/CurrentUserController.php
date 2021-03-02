<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CurrentUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getUser(Request $request)
    {
        return response()->json($request->user());
    } // getUser.

    public function getRole(Request $request)
    {
        return response()->json($request->user()->role);
    } // getUser.

    public function getCells(Request $request)
    {
        $user = $request->user();

        return response()->json($user->cells);
    } // getCells.
}
