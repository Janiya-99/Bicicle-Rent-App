<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bicycle extends Model
{
    use HasFactory;

    public function station(){
        return $this->belongsTo(Station::class);
    }

    public function bicycleType(){
        return $this->hasOne(BicycleType::class);
    }

    public function recentActivities(){
        return $this->hasMany(RecentActivity::class);
    }

    public function paths(){
        return $this->hasMany(Path::class);
    }


    public function emergencies(){
        return $this->hasMany(Emergency::class);
    }


    public function gps(){
        return $this->hasMany(Gps::class);
    }
}
