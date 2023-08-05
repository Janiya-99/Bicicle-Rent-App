<?php

namespace App\Models;

use App\Models\Employ;
use App\Models\Bicycle;
use App\Models\EmergencyStatus;
use App\Models\EmergencyEmployee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emergency extends Model
{
    use HasFactory;

    protected $primaryKey = 'emergency_id';

    protected $fillable = [
        'bicycle_id',
        'emergency_status_id',
        'lang',
        'long',
        'date',
        'time',
        'description'
    ];

    public function bicycle(){
        return $this->belongsTo(Bicycle::class);
    }

    public function emergencyStatus(){
        return $this->hasOne(EmergencyStatus::class);
    }

    public function employs(){
        return $this->belongsToMany(Employ::class,'emergency_employ', 'emergency_id', 'employ_id');
    }

}
