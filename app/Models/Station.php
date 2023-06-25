<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
