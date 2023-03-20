<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'lat',
        'lng',
        'name',
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
