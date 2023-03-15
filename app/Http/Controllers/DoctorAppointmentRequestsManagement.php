<?php

namespace App\Http\Controllers;

use App\Models\AppointmentRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class DoctorAppointmentRequestsManagement extends Controller
{
    public function index(){

        // $app = AppointmentRequest::where('patient_id', auth()->user()->doctor->patient->id)->get();
        // dd($app);
        // get all the requests based on the patients ids for all the doctors patients

        $patients = Patient::where('doctor_id', auth()->user()->doctor->id)->get();
        if($patients->isNotEmpty()){
            foreach($patients as $patient){
                $app = AppointmentRequest::where('patient_id', $patient->id)->orderBy('created_at', 'desc')->get();
            }
        }else{
            $app = [];
        }

        return view('doctor.pages.appointment_requests', compact('app'));
    }
}
