<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if (auth()->user()->role=="doctor"){
            return view('doctor.pages.dashboard');
        }
        elseif (auth()->user()->role=="patient") {
            return view('dashboard_patient');
        }
    }
}
