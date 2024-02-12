<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Services\EmailVerificationService;
use App\Repositories\UserRepository;


class RegisterController extends Controller
{
    protected $userRepository;
    protected $verificationService;

    public function __construct(UserRepository $userRepository, EmailVerificationService $verificationService)
    {
        $this->userRepository = $userRepository;
        $this->verificationService = $verificationService;
    }

    public function register(RegisterRequest $request)
    {

        try {
            $user = $this->userRepository->create($request->validated());
            $this->verificationService->sendVerificationEmail($user);
            return response()->json(['message' => 'User registered successfully'], 200);
        } catch (\Exception $e) {

            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
