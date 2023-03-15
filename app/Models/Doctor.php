<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;
use App\Models\Appointment;

class Doctor extends Model
{
    use HasFactory;



    //how to connect with users table
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function patients(){
        return $this->hasMany(Patient::class);
    }

    public function doctorHours(){
        return $this->hasMany(DoctorHours::class);
    }

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
}
