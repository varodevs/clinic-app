<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class AboutController extends Controller
{
    /**
     * Returns to Treatments page.
     */
    public function About_view()
    {
        return view('about');
    }
}