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
        $workday = Carbon::create($currentYear, 05, 1);
        $array = [$christmasDate, $workday];
        foreach($result as $row){
            $array.array_push($row->date_appoint);
        }

        return view('request');
    }

    public function Request_done(Request $request)
    {
        echo "entra";
        $request->validate([
            'fname' => 'required|string|min:2|max:10',
            'phone' => 'required|max:20',
            'birth' => 'required|date',
            'spec' => 'required|',
            'lname' => 'required|string|min:2|max:10',
            'email' => 'required|email|min:8|max:35',
            'date' => 'required|date',
            'id' => 'required|string',
            'underchck' => 'required',
            'textarea' => 'string|max:35',
            'hour' => 'required'
            ]);
        
        $phone = $request->phone;

        $appoint = new Appointment();
        $patient = new Patient();

        $dateTime = Carbon::parse($request->date . ' ' . $request->hour);

        $age = Carbon::parse($request->birth)->age;
        $result = $patient->createPatient($request->fname,$request->lname,$request->phone,$request->birth,$age,$request->sex,session('id_user'), 0);
        
        if($result){
            echo "entra1";
            $cod_patient = $patient->getPatientByUser(session('id_user'));

            $confirmed = 0;
            $result = $appoint->createAppoint($dateTime, $confirmed, $request->spec, $cod_patient);

            if($result){
                echo "entra2";
                return redirect('user/dashboard')->with('status', 'Appoinment requested successfully.');
            }else{
                return redirect('request')->with('status', 'Appoinment request failed.');
            }
        }else{
            return redirect('request')->with('status', 'Appoinment request failed.');
        }


       

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