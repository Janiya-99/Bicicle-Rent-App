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

    protected $primaryKey = 'bicycle_id';

    protected $fillable = [
        'type_id',
        'station_id',
        'status_id',
        'qr_code',
        'live_lang',
        'live_long',
        'temp_pin',
        'height',
        'weight',
        'manufactured'
    ];

    public function station(){
        return $this->belongsTo(Station::class,'station_id');
    }

    public function bicycleType(){
        return $this->hasOne(BicycleType::class,'id','type_id');
    }

    public function recentActivities(){
        return $this->hasMany(RecentActivity::class,'activity_id');
    }

    public function paths(){
        return $this->hasMany(Path::class,'path_id');
    }


    public function emergencies(){
        return $this->hasMany(Emergency::class);
    }


    public function gps(){
        return $this->hasMany(Gps::class,'gps_id');
    }

    public function status()
    {
        return $this->belongsTo(BicycleStatus::class,'status_id');
    }
}
