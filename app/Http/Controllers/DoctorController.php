<?php

namespace App\Http\Controllers;

use App\Http\Requests\HealthFileRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\PatientRegister;
use App\Models\Doctor;
use App\Models\HealthFile;
use App\Models\Patient;
use Illuminate\Support\Facades\Mail;

use Barryvdh\DomPDF\Facade\Pdf as PDF;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->middleware('doctor');
    }

    public function patients(){

        if(request('patient')){
            $patient = Patient::where('id', request('patient'))->first();
            $health = HealthFile::where('patient_id', request('patient'))->get();
            return view('doctor.pages.patient_history')->with(['patient' => $patient, 'health' => $health]);
        }
        $patients = Auth::user()->doctor->patients;
        return view('doctor.pages.all_patients', compact('patients'));
    }

    public function healthFileAdd($id){
        $health = new HealthFile();
        $health->patient_id = $id;
        $health->save();
        $patient = Patient::where('id', $id)->firstOrFail();
        return view('doctor.pages.health_page', compact('health', 'patient'));
    }

    public function healthFileStore(HealthFileRequest $request,$id){
        $health = HealthFile::where('patient_id', $id)->latest()->firstOrFail();
        $health->blood_type = $request->blood;
        $health->allergies = $request->allergies;
        $health->weight = $request->weight;
        $health->height = $request->height;
        $health->conditions = implode(',' ,$request->conditions);
        $health->symptoms = $request->reason;
        $health->medications = $request->medications;
        $health->operations = $request->operations;
        $health->exercise = $request->exercise;
        $health->alcohol = $request->alcohol;
        $health->caffeine = $request->caffeine;
        $health->diet = $request->diet;
        $health->date = $request->date;
        $health->save();
        return redirect()->route('doctor.patients')->with('success', 'Health file updated successfully');
    }

    public function healthFileShow($id){
        $health = HealthFile::where('patient_id', $id)->latest()->firstOrFail();
        $patient = Patient::where('id', $id)->firstOrFail();

        // create an array with health and patient variables
        $data['details'] = [
            'health' => $health,
            'patient' => $patient
        ];
        // dd($data['details']['health']['id']);

        $pdf = PDF::loadView('doctor.pages.health_page_pdf', $data);
        return $pdf->stream('document.pdf');
    }

    public function profileHealthPage($date){
        $health = HealthFile::where('date', $date)->firstOrFail();
        $patient = Patient::where('id', $health->patient_id)->firstOrFail();

        $data['details'] = [
            'health' => $health,
            'patient' => $patient
        ];
        // dd($data['details']['health']['id']);

        $pdf = PDF::loadView('doctor.pages.health_page_pdf', $data);
        return $pdf->stream('document.pdf');
    }

    public function deletePatient($id){
        $patient = Patient::where('id', $id)->firstOrFail();
        $patient->user->delete();
        return redirect()->route('doctor.patients')->with('success', 'Patient deleted successfully');
    }

}
