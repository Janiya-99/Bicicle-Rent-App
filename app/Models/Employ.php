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
        return $this->belongsToMany(Emergency::class);
    }

    public function employContacts(){
        return $this->hasMany(EmployContact::class,'emp_id');
    }

    public function emergencyEmploy(){
        return $this->hasMany(EmergencyEmployee::class, 'employee_id');
        }
}
