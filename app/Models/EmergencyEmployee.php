<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyEmployee extends Model
{
    use HasFactory;

    public function emergencies(){
        return $this->belongsToMany(Emergency::class);
    }

    public function employees(){
        return $this->belongsToMany(Employ::class);
    }
}
