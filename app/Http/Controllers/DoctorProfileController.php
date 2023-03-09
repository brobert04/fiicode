<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DoctorUpdatePasswordRequest;

class DoctorProfileController extends Controller
{

    public function __construct(){
        $this->middleware(['auth', 'doctor']);
    }
    public function index()
    {
        $documents = json_decode(Auth::user()->doctor->documents);
        return view('doctor.pages.profile', compact('documents'));
    }

    public function update(Request $request){
        $this->validate($request, ['email' => 'unique:users,email,' . auth()->id(),], ['email.unique' => 'This email address has been already been used']);
        $doctor = User::find(auth()->id())->doctor;
        $doctor->specialty = $request->specialty;
        $doctor->phone = $request->phone;
        $doctor->address = $request->address;
        $doctor->about = $request->about;
        $doctor->company = $request->company;
        $doctor->country = $request->country;
        $doctor->phone = $request->phone;
        $doctor->bod = $request->date;
        $doctor->gender = $request->gender;
        $doctor->save();
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

    public function businessHours(){
        
    }
}
