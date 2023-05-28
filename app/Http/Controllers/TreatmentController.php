<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\Therapy;

class TreatmentController extends Controller
{
    /**
     * Returns to Treatments page.
     */
    public function Treatment_view()
    {
        return view('treatment');
    }
}