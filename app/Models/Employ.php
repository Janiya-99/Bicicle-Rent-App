<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employ extends Model
{
    use HasFactory;

    public function emergencies(){
        return $this->belongsToMany(Emergency::class);
    }

    public function employContacts(){
        return $this->hasMany(EmployContact::class);
    }
}
