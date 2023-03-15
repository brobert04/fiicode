<?php

namespace App\Http\Controllers;

use App\Models\AppointmentRequest;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function appointmentIndex(){
        return view('patient.pages.make_appointment');
    }

    public function appointmentSave(Request $request){
        $app = new AppointmentRequest();
        $app->patient_id = auth()->user()->patient->id;
        $app->name = $request->name;
        $app->email = $request->email;
        $app->phone = $request->phone;
        $app->date = $request->date;
        $app->time = $request->time;
        $app->doctor_id = $request->doctor;
        $app->reason = $request->reason;
        $app->save();
        return redirect()->back()->with('success', 'Appointment Request Sent Successfully');
    }
}
