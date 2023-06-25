<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emergency extends Model
{
    use HasFactory;

    public function bicycle(){
        return $this->belongsTo(Bicycle::class);
    }

    public function emergencyStatus(){
        return $this->hasOne(EmergencyStatus::class);
    }


    public function emergencyEmploy(){
    return $this->hasMany(EmergencyEmployee::class, 'employee_id');
    }


    public function employees(){
        return $this->belongsToMany(Employ::class);
    }

}
