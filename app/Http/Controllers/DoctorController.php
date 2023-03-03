<?php

namespace App\Http\Controllers;

use App\Http\Requests\HealthFileRequest;
use App\Models\Invitation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInvitationRequest;
use Illuminate\Support\Facades\Auth;
use App\Mail\PatientRegister;
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

    public function sendInvite(){
        $invitations =  Invitation::where('doctor_email', Auth::user()->email)->get();
        return view('doctor.pages.send_invitation', compact('invitations'));
    }

    public function sendInviteStore(StoreInvitationRequest $request){
        $invitation = new Invitation();
        $invitation->email = $request->email;
        $invitation->doctor_email = Auth::user()->email;

        $token = substr(md5(rand(0, 9) . $invitation->email . time()), 0, 32);
        $invitation->invitation_token = $token;
        $invitation->save();

        $link = urldecode(route('patient.register') . '?invitation_token=' .$invitation->invitation_token);

        Mail::to($invitation->email)->send(new PatientRegister($link));
        return redirect()->route('doctor.send-invite')->with('success', 'Invitation sent successfully');
    }

    public function patients(){
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

}   
