<?php

namespace App\Models;

use App\Models\Emergency;
use App\Models\EmployContact;
use App\Models\EmergencyEmployee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employ extends Model
{
    use HasFactory;

    protected $primaryKey = 'emp_id';

    protected $fillable = [
        'name',
    ];

    public function emergencies(){
        return $this->belongsToMany(Emergency::class, 'emergency_employ', 'employ_id', 'emergency_id');
    }

    public function employContacts(){
        return $this->hasMany(EmployContact::class,'employ_id');
    }

}
