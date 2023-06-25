<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
    use HasFactory;

    public function recentActivity(){
        return $this->belongsTo(RecentActivity::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }


    public function bicycle(){
        return $this->belongsTo(Bicycle::class);
    }

    public function gps(){
        return $this->hasMany(Gps::class);
    }
}
