<?php

namespace App\Models;

use App\Models\Gps;
use App\Models\User;
use App\Models\Bicycle;
use App\Models\RecentActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Path extends Model
{
    use HasFactory;

    protected $primaryKey = 'path_id';

    protected $fillable = [
        'user_id',
        'bicycle_id',
        'start_long',
        'start_lang',
        'end_long',
        'end_lang',
        'start_location',
        'end_location',
        'distance'
    ];

    public function recentActivity(){
        return $this->belongsTo(RecentActivity::class);
    }


    public function user(){
        return $this->belongsTo(User::class ,'user_id', 'path_id');
    }


    public function bicycle(){
        return $this->belongsTo(Bicycle::class);
    }

    public function gps(){
        return $this->hasMany(Gps::class);
    }
}
