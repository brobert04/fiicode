<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBusinessHoursRequest;
use App\Models\DoctorHours;
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
        $dayMap = [
            'monday' => 1,
            'tuesday' => 2,
            'wednesday' => 3,
            'thursday' => 4,
            'friday' => 5,
            'saturday' => 6,
            'sunday' => 7,
        ];
        $hours = DoctorHours::where('doctor_id', auth()->user()->doctor->id)->get()->sortBy(function($hours) use ($dayMap){
            return $dayMap[$hours->day];
        });
        $documents = json_decode(Auth::user()->doctor->documents);
        return view('doctor.pages.profile', compact('documents', 'hours'));
    }

    public function update(Request $request){
        $this->validate($request, ['email' => 'unique:users,email,' . auth()->id(),], ['email.unique' => 'This email address has been already been used']);
        $doctor = User::find(auth()->id())->doctor;
        $doctor->specialty = $request->specialty;
        $doctor->address = $request->address;
        $doctor->about = $request->about;
        $doctor->company = $request->company;
        $doctor->country = $request->country;
        $doctor->phone = $request->phone;
        $doctor->bod = $request->date;
        $doctor->gender = $request->gender;
        $doctor->profile_completed = 1;
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

    public function businessHours(Request $request){

        // validate the day to be unique

        $this->validate($request, [
            'day' => 'required|unique:doctor_hours,day,NULL,id,doctor_id,' . auth()->user()->doctor->id,
        ], [
            'day.unique' => 'You already have a record for this day. Please choose another day.',
        ]);

        $hours = new DoctorHours();
        $hours->doctor_id = auth()->user()->doctor->id;
        $hours->day = $request->day;
        $hours->start_hour = $request->start_hour;
        $hours->end_hour = $request->end_hour;
        $hours->save();
        return redirect()->back()->with('success', 'Business hours added successfully');
    }

    public function editBusinessHours($id){
        $hours = DoctorHours::find($id);
        return view('doctor.pages.edit_hours', compact('hours'));
    }

    public function updateBusinessHours(Request $request, $id){
        // CREATE VALIDATION FOR THIS
        $this->validate($request, [
            'day' => 'required|unique:doctor_hours,day,' . $id . ',id,doctor_id,' . auth()->user()->doctor->id,
        ], [
            'day.unique' => 'You already have a record for this day. Please choose another day.',
        ]);
        $hours = DoctorHours::find($id);
        $hours->day = $request->day;
        $hours->start_hour = $request->start_hour;
        $hours->end_hour = $request->end_hour;
        $hours->save();
        return redirect()->route('doctor.profile')->with('success', 'Business hours updated successfully');
    }
}
