<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInvitationRequest;
use App\Mail\PatientRegister;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class DoctorSendInviteController extends Controller
{
    public function __construct()
    {
        $this->middleware('doctor');
    }

    public function sendInvite(){
        $invitations =  Invitation::where('doctor_email', auth()->user()->email)->paginate(5); 
        // dd($invitations);  
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
}
