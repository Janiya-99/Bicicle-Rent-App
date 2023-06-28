<?php

namespace App\Models;

use App\Models\Employ;
use App\Models\Emergency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmergencyEmployee extends Model
{
    use HasFactory;

    public function emergencies(){
        return $this->hasMany(Emergency::class);
    }

    public function employees(){
        return $this->hasMany(Employ::class);
    }
}
