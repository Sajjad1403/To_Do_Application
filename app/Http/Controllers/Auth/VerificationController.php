<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EmailVerificationService;

class VerificationController extends Controller
{
    protected $verificationService;

    public function __construct(EmailVerificationService $verificationService)
    {
        $this->verificationService = $verificationService;
    }

    public function verify(Request $request)
    {
        try {
            $this->verificationService->verifyUser($request->verification_code);
            return response()->json(['message' => 'User verified successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
