<?php

namespace App\Http\Controllers;

use App\Services\TwilioService;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    protected $twilio;

    public function __construct(TwilioService $twilio)
    {
        $this->twilio = $twilio;
    }

    public function sendSMS(Request $request)
    {
        $to = $request->input('to');
        $message = $request->input('message');

        $this->twilio->sendSMS($to, $message);

        // Handle the response or redirect as needed
    }
}
