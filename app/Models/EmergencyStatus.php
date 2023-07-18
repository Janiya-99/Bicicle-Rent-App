<?php

namespace App\Models;

use App\Models\Emergency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmergencyStatus extends Model
{
    use HasFactory;

    protected $primaryKey = 'emergency_status_id';

    protected $fillable = [
        'emergency_status',
    ];

    public function emergency(){
        return $this->belongsTo(Emergency::class);
    }
}
