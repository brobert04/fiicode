<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorTransferPatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('doctor');
    }
    
    public function transferPatientsIndex(){
        $patients = Auth::user()->doctor->patients;
        $doctors = Doctor::all();
        return view('doctor.pages.transfer_patients', compact('patients', 'doctors'));
    }

    public function transferPatients(Request $request){
        $patient = Patient::where('id', $request->patient_id)->firstOrFail();
        $patient->doctor_id = $request->doctor_id;
        $patient->save();
        return redirect()->route('doctor.transfer.patients.index')->with('success', 'Patient transferred successfully');
    }
}
