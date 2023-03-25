<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'doctor_id',
        'todo',
    ];
    
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
