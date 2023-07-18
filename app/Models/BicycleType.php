<?php

namespace App\Models;

use App\Models\Bicycle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BicycleType extends Model
{
    use HasFactory;

    protected $fillable = [
        'type'
    ];

    public function bicycle(){
        return $this->belongsTo(Bicycle::class);
    }
}
