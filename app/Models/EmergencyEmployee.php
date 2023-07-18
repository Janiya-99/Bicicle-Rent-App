<?php

namespace App\Models;

use App\Models\Employ;
use App\Models\Emergency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmergencyEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        'emergency_id',
        'employ_id'
    ];

    public function emergencies(){
        return $this->hasMany(Emergency::class);
    }

    public function employees(){
        return $this->hasMany(Employ::class);
    }
}
