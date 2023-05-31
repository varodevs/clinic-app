<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Cron\HoursField;
use DateTime;
use Twilio\Rest\Client;

class RequestController extends Controller{
    public function Request_view()
    {
        return view('request');
    }

    public function Request_done(Request $request)
    {
        $this->validate(request(),[
            $request->fname,$request->phone,$request->birth,$request->spec,$request->lname,$request->email
            ,$request->id,$request->underchck,$request->textarea
            ]);
        
        $phone = $request->phone;

        $appoint = new Appointment();
        $last_appoint =$appoint->getLastAppoint();

        $last_date = new DateTime();
        $last_date = $last_appoint->date_appoint;
        $day = $dayName = \Carbon\Carbon::createFromFormat('Y-m-d', $last_date)->format('l');
        $hour = explode($last_date, "")(1);
        $date = explode($last_date, "")(0);
        if(!$day.equalTo("Saturday") || !$day.equalTo("Sunday") && $hour < "20:30:59"){
            $new_date = $last_date->addHour();
        }
        



        return view('request');
    }

    

public function sendSMS($new_date, $phone)
{
    $twilioSID = env('TWILIO_SID');
    $twilioAuthToken = env('TWILIO_AUTH_TOKEN');
    $twilioPhoneNumber = env('TWILIO_PHONE_NUMBER');

    $client = new Client($twilioSID, $twilioAuthToken);
    
    $client->messages->create(
        $phone,
        [
            'from' => $twilioPhoneNumber,
            'body' => 'Your appointment date is: '& $new_date
        ]
    );

    return "SMS sent successfully.";
}

}
?>