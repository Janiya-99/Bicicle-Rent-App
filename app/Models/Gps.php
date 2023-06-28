<?php

namespace App\Models;

use App\Models\Path;
use App\Models\Bicycle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gps extends Model
{
    use HasFactory;

    public function bicycle(){
        return $this->belongsTo(Bicycle::class);
    }

    public function path(){
        return $this->belongsTo(Path::class);
    }
}
