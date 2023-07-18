<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;

    protected $fillable = [
        'recent_activity_id',
        'wind_speed',
        'temperature',
        'visibility',
        'humidity',
        'weather_status'
    ];

    public function recentActivity(){
        return $this->belongsTo(RecentActivity::class);
    }
}
