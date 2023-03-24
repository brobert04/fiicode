<?php

namespace App\Http\Controllers;

use App\Models\AppointmentRequest;
use App\Models\Doctor;
use App\Models\Location;
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

    public function doctorMap(){
         $doctors = Doctor::with('location')->get();

         // Initialize an empty array to store the locations
         $locations = [];
 
         // Loop through the doctors and retrieve their locations
         foreach ($doctors as $doctor) {
             $location = $doctor->location;
             if ($location) {
                 // Add the location to the array if it exists
                 $locations[] = [
                     'name' => $location->name,
                     'lat' => $location->lat,
                     'lng' => $location->lng,
                     'company' => $doctor->company,
                     'doc_name' => $doctor->user->name,
                     'phone' => $doctor->phone,
                     'patients' => $doctor->patients->count(),
                     'hours' => $doctor->doctorHours,
                     'id' => $doctor->id,
                 ];
             }
         }
        //  dd($locations["lat"]);
        return view('patient.pages.doctor-map', compact('locations'));
    }
}

