<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Therapy;
use App\Models\Employee;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Returns to Treatments page.
     */
    public function Admin_view()
    {
        $appointment = new Appointment();

        $array = $appointment->getAppoints();
        return view('admin', compact('appointments', $appointment));
    }
}