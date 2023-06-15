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
    
            // Get appointments by employee ID and selected date
            $appointments = Appointment::where('employee_id', $selectedSpec)
                ->whereDate('date_appoint', $selectedDate)
                ->get();
    
            $hours = ['08:30:00', '09:00:00', '09:30:00', '10:00:00', '10:30:00', '11:00:00', '11:30:00', '12:00:00', '12:30:00', '13:00:00', '17:00:00', '17:30:00', '18:00:00', '18:30:00', '19:00:00', '19:30:00', '20:00:00'];
            $takenHours = [];
    
            foreach ($appointments as $appointment) {
                $appointmentTime = Carbon::parse($appointment->date_appoint)->format('H:i:s');
                $takenHours[] = $appointmentTime;
            }
    
            $availableHours = array_diff($hours, $takenHours);
    
            return response()->json($availableHours);
        }
    }
?>