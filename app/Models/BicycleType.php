<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BicycleType extends Model
{
    use HasFactory;

    public function bicycles(){
        return $this->belongsTo(Bicycle::class);
    }
}
