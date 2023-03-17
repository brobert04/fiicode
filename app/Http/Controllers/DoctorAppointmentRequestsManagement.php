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

    public function rejectAppointment($id){
        $app = AppointmentRequest::find($id);
        $app->status = 'rejected';
        $app->save();
        return redirect()->back()->with('success', 'Appointment request rejected');
    }

    public function destroy($id){
        $app = AppointmentRequest::find($id);
        $app->delete();
        return redirect()->back()->with('success', 'Appointment request deleted');
    }
}
