<?php

namespace App\Models;

use App\Models\Gps;
use App\Models\Path;
use App\Models\Station;
use App\Models\Emergency;
use App\Models\BicycleType;
use App\Models\RecentActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
