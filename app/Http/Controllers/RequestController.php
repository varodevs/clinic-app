<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Patient;
use Carbon\Carbon;
use Cron\HoursField;
use DateTime;
use Twilio\Rest\Client;

class RequestController extends Controller{
    public function Request_view()
    {
        $appoint = new Appointment();

        $result = $appoint->getAppoints();
        $currentYear = Carbon::now()->year;
        $christmasDate = Carbon::create($currentYear, 12, 25);
        $array[] = [$christmasDate];
        foreach($result as $row){
            $array.array_push($row->date_appoint);
        }

        return view('request');
    }

    public function Request_done(Request $request)
    {
        $this->validate(request(),[
            'fname' => 'required|string|min:2|max:10',
            'phone' => 'required|max:20',
            'birth' => 'required|date',
            'spec' => 'required|',
            'lname' => 'required|string|min:2|max:10',
            'email' => 'required|email|min:8|max:35',
            'id' => 'required|string',
            'underchck' => 'required',
            'textarea' => 'string|max:35',
            ]);
        
        $phone = $request->phone;

        $appoint = new Appointment();
        $patient = new Patient();
        $last_appoint =$appoint->getLastAppoint();
        $last_date = new DateTime();
        $last_date = $last_appoint->date_appoint;
        $day = $dayName = \Carbon\Carbon::createFromFormat('Y-m-d', $last_date)->format('l');
        $hour = explode($last_date, "")(1);
        $date = explode($last_date, "")(0);
        if(!$day.equalTo("Saturday") || !$day.equalTo("Sunday") && $hour <= "19:00:00"){
            $new_date = $last_date->addHour();
        }else{
            $new_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $last_date . ' ' . "8:00:00");
        }
        $age = Carbon::parse($request->birth)->age;
        $result = $patient->createPatient($request->fname,$request->lname,$request->phone,$request->birth,$age,$request->sex,session('id_user'), 0);

        $cod_patient = $patient->getPatientByUser(session('id_user'));

        $confirmed = 0;
        $result = $appoint->createAppoint($new_date, $confirmed, $request->spec, $cod_patient);


        return view('profile');
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