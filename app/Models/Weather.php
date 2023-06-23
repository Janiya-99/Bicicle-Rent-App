<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;

    public function recentActivity(){
        return $this->belongsTo(RecentActivities::class);
    }
}
