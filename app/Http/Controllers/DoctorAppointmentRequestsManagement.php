<?php

namespace App\Http\Controllers;

use App\Models\AppointmentRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class DoctorAppointmentRequestsManagement extends Controller
{
    public function index(){

        $app = AppointmentRequest::where('doctor_id', auth()->user()->doctor->id)->orderBy('created_at', 'desc')->get();
        return view('doctor.pages.appointment_requests', compact('app'));
    }
}
