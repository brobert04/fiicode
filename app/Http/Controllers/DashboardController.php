<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if (auth()->user()->role=="doctor"){
            if(auth()->user()->doctor->profile_completed==0){
                flash('Thank you for registering! Before you begin, please complete your profile.')->warning();
                return view('doctor.pages.dashboard');
            }
            return view('doctor.pages.dashboard');
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
