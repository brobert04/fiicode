<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function appointmentIndex(){
        return view('patient.pages.make_appointment');
    }
}
