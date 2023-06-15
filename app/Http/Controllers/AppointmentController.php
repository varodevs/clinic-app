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

            $dates_bd = [];

            $found = 0;

            foreach($appoints as $appo){                
                $date = $appo->date_appoint;
                $carbonDate = Carbon::createFromFormat('Y/m/d', $selectedDate);
                $carbonDate2 = Carbon::createFromFormat('Y/m/d', $date);
                if($carbonDate == $carbonDate2){
                    $found++;
                    array_push($dates_bd, $date);
                }
            }
            
            $hours = ['08:30:00','09:00:00','09:30:00','10:00:00','10:30:00','11:00:00','11:30:00','12:00:00','12:30:00','13:00:00','17:00:00','17:30:00','18:00:00','18:30:00','19:00:00','19:30:00','20:00:00'];
            
            if($found != 0){
                $taken = [];
                foreach($dates_bd as $date){
                    $carbonDate = Carbon::createFromFormat('Y/m/d H:i:s', $date);
                    $hour = $carbonDate->format('H:i:s');
    
                    array_push($taken, $hour);
                }  
                $availableHours = array_diff($hours, $taken);
            }else{
                $availableHours = $hours;
            }
            return response()->json($availableHours);
        }
    }
?>