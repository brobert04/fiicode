<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorUpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientProfileController extends Controller
{
    public function index(){
        return view('patient.pages.profile');
    }

    public function update(Request $request){
        $this->validate($request, ['email' => 'unique:users,email,' . auth()->id(),], ['email.unique' => 'This email address has been already been used']);
        $patient = User::find(auth()->id())->patient;
        $patient->phone = $request->phone;
        $patient->address = $request->address;
        $patient->bod = $request->date;
        $patient->gender = $request->gender;
        $patient->profile_completed = 1;
        $patient->save();
        $user = User::find(auth()->id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    public function resetPassword(DoctorUpdatePasswordRequest $request)
    {
        if(Auth::attempt(['email'=>auth()->user()->email, 'password'=>$request->password]))
        {
            $newPassword = bcrypt($request->newpassword);
            $user = User::find(auth()->user()->id);
            $user->password = $newPassword;
            $user->save();
            return redirect()->back()->with('success', 'Password has been changed.');
        }
        else
        {
            return redirect()->back()->with('error', 'Current password is wrong.');
        }
    }
}
