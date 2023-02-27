<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInvitationRequest;
use Illuminate\Support\Facades\Auth;
use App\Mail\PatientRegister;
use App\Models\Patient;
use Illuminate\Support\Facades\Mail;

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
}
