<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorProfileController extends Controller
{
    public function index()
    {
        $documents = json_decode(Auth::user()->doctor->documents);
        return view('doctor.pages.profile', compact('documents'));
    }
}
