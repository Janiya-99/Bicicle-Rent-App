<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BicycleStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'status'
    ];
    public function bicycle()
    {
        return $this->hasOne(Bicycle::class,'status_id');
    }
}
