<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;
use Exception;
use Illuminate\Support\Facades\Log;

class MailController extends Controller
{
    public function sendMail()
    {
        $to = "rajeelsiddiqui3@gmail.com";
        $subject = "Rajeel Siddiqui";
        $msg = "dummy email";

        try {
            Mail::to($to)->send(new WelcomeEmail($msg, $subject));
            return "✅ Email sent successfully.";
        } catch (Exception $e) {
            // Log the exception for debugging
            Log::error("❌ Mail sending failed: " . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'Email sending failed.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
