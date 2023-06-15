<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Cron\HoursField;
use DateTime;
use Twilio\Rest\Client;

class RequestController extends Controller{

    public function Request_view()
    {
        $pat = new Patient();

        $array = $pat->getPatientByUser(session('id_user'));
        $user = new User();

        $user = $user->getUserdById(session('id_user'));
        return view('request', compact('array','user'));
    }

    public function Request_done(Request $request)
    {
        // $request->validate([
        //     'fname' => 'required|string|min:2|max:10',
        //     'phone' => 'required|max:30',
        //     'birth' => 'required|date',
        //     'spec' => 'required|',
        //     'lname' => 'required|string|min:2|max:10',
        //     'email' => 'required|email|min:8|max:35',
        //      'date' => 'required|date',
        //      'id' => 'required',
        //      'underchck' => 'required',
        //      'textarea' => 'string|min:2|max:200',
        //      'hour' => 'required'
        //      ]);

        $phone = $request->phone;

        $appoint = new Appointment();
        $patient = new Patient();

        $dateTime = Carbon::parse($request->date . ' ' . $request->hour);

        $age = Carbon::parse($request->birth)->age;

        $last_patient = $patient->getPatientLast();


        if($last_patient != null){
            $last_id= $last_patient->cod_patient;           
                $last_id++;
            }else{
                $last_id = 1;
            }

            $patient_by_user = $patient->getPatientByUser(session('id_user'));

        if($patient_by_user == null){
            $img_path = 'img/userimg/default.png';
            $result = $patient->createPatient($last_id,$request->fname,$request->lname,$phone,$request->birth,$age,$request->sex,session('id_user'), 3,$img_path);
        }else{
            $result = true;
        }
        
        if($result){
            $patient_by_user = $patient->getPatientByUser(session('id_user'));
            $cod_patient = $patient_by_user->cod_patient;

            $confirmed = 0;
            $id_emp = intval($request->spec);

            $result = $appoint->createAppoint($dateTime, $confirmed, $id_emp, $cod_patient);

            if($result){

                return redirect('user/dashboard')->with('status', 'Appoinment requested successfully.');
            }else{
                return redirect('request')->with('status', 'Appoinment request failed.');
            }
        }else{
            return redirect('request')->with('status', 'Appoinment request failed.');
        }    

    }


    public function sendSMS($date,$phone){
        $twilioSID = env('TWILIO_SID');
        $twilioAuthToken = env('TWILIO_AUTH_TOKEN');
        $twilioPhoneNumber = env('TWILIO_PHONE_NUMBER');

        $client = new Client($twilioSID, $twilioAuthToken);
        
        $client->messages->create(
            $phone,
            [
                'from' => $twilioPhoneNumber,
                'body' => 'Your appointment date is: '& $date
            ]
        );

        return "SMS sent successfully.";
    }

}
?>