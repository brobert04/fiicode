<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function healthFile(){
        return $this->hasMany(HealthFile::class);
    }

    public function appointmentRequest(){
        return $this->hasMany(AppointmentRequest::class);
    }

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }
}
