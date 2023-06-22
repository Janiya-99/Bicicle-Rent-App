<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bicycle extends Model
{
    use HasFactory;

    public function stations(){
        return $this->belongsTo(Station::class);
    }

    public function bicycleType(){
        return $this->hasOne(BicycleType::class);
    }
}
