<?php
namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Carbon\Carbon;
    use App\Models\Appointment;

    class AppointmentController extends Controller{
        public function checkDates(Request $request)
        {
            $selectedDate = $request->input('date');
            $selectedSpec = $request->input('idemp');

            $appoint = new Appointment();

            $appoints = $appoint->getAppointsByEmp($selectedSpec);

            $dates = $appoints->date_appoint;

            $hours = ['08:30:00','09:00:00','09:30:00','10:00:00','10:30:00','11:00:00','11:30:00','12:00:00','12:30:00','13:00:00','17:00:00','17:30:00','18:00:00','18:30:00','19:00:00','19:30:00','20:00:00'];

            $taken = [];
            foreach($dates as $date){
                $carbonDate = Carbon::createFromFormat('Y/m/d H:i:s.f', $date);
                $hour = $carbonDate->format('H:i:s');

                array_push($taken, $hour);
            }                 
            
            $availableHours = array_diff($hours, $taken);

            return response()->json($availableHours);
        }
    }
?>