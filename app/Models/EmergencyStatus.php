<?php

namespace App\Models;

use App\Models\Emergency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmergencyStatus extends Model
{
    use HasFactory;

    public function emergency(){
        return $this->belongsTo(Emergency::class);
    }
}
