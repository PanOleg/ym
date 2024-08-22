<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(Request $request)
    {
        $data = $request->only(['first_name', 'last_name', 'email', 'password', 'phone']);
        $user = $this->userService->registerUser($data);
        return response()->json($user, 201);
    }

    public function signIn(Request $request)
    {
        $data = $request->only(['email', 'password']);
        $user = $this->userService->signIn($data);
        return response()->json($user);
    }

    public function recoverPassword(Request $request)
    {
        $data = $request->only(['email']);
        $result = $this->userService->recoverPassword($data);
        return response()->json($result);
    }
}
