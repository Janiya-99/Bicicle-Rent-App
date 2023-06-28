<?php

namespace App\Models;

use App\Models\Bicycle;
use App\Models\RecentActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Station extends Model
{
    use HasFactory;

    public function bicycles(){
        return $this->hasMany(Bicycle::class);
    }

    public function recentActivities(){
        return $this->hasMany(RecentActivity::class);
    }
}
