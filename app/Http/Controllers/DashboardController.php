<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if (auth()->user()->role=="doctor"){
            if(auth()->user()->doctor->profile_completed==0){
                flash('Thank you for registering! Before you begin, please complete your profile.')->warning();
                return view('doctor.pages.dashboard');
            }
            $todos = Todo::where('doctor_id', auth()->user()->doctor->id)->get();
            return view('doctor.pages.dashboard', compact('todos'));

        }
        elseif (auth()->user()->role=="patient") {
            if(auth()->user()->patient->profile_completed==0){
                flash('Thank you for registering! Before you begin, please complete your profile.')->warning();
                return view('patient.pages.dashboard');
            }
            return view('patient.pages.dashboard');
        }
    }
}
