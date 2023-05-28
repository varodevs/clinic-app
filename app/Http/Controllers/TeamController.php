<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;

class TeamController extends Controller
{
    /**
     * Returns to Treatments page.
     */
    public function Team_view()
    {
        return view('team');
    }
}