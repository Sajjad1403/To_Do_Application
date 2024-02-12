<?php
// app/Services/EmailVerificationService.php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail;
use Exception;

class EmailVerificationService
{
    public function sendVerificationEmail(User $user)
    {
        try {
            $verificationCode = $this->generateVerificationCode();
            $user->verification_code = $verificationCode;
            $user->save();

            Mail::to($user->email)->send(new VerificationCodeMail($verificationCode));

            return response()->json(['message' => 'Verification email sent successfully'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to send verification email. Please try again later.'], 500);
        }
    }

    protected function generateVerificationCode()
    {
        return rand(100000, 999999); // Generate a random 6-digit verification code
    }

    public function verifyUser($verificationCode)
    {
        $user = User::where('verification_code', $verificationCode)->firstOrFail();
        $user->verification_code = null;
        $user->email_verified_at = now();
        $user->save();
    }
}
