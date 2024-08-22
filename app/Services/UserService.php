<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Password;

class UserService
{
    protected UserRepository $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function registerUser(array $data): \App\Models\User
    {
        return $this->userRepo->create($data);
    }

    public function signIn(array $data): ?\App\Models\User
    {
        return $this->userRepo->findByEmail($data['email']);
    }

    public function recoverPassword(array $data)
    {
        $response = Password::sendResetLink($data);

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return ['status' => 'Password reset link sent'];
            case Password::INVALID_USER:
                return ['error' => 'Invalid user'];
        }
    }
}
