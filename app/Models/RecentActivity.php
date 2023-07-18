<?php

namespace App\Models;

use App\Models\Path;
use App\Models\User;
use App\Models\Bicycle;
use App\Models\Station;
use App\Models\Weather;
use App\Models\PaymentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecentActivity extends Model
{
    use HasFactory;

    protected $primaryKey = 'activity_id';

    protected $fillable = [
        'user_id',
        'path_id',
        'station_id',
        'bicycle_id',
        'payment_type_id',
        'date',
        'start_time',
        'end_time'
    ];


    public function path(){
        return $this->hasOne(Path::class);
    }


    public function paymentType(){
        return $this->hasOne(PaymentType::class);
    }


    public function station(){
        return $this->belongsTo(Station::class);
    }


    public function bicycle(){
        return $this->belongsTo(Bicycle::class);
    }


    public function weather(){
        return $this->hasMany(Weather::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }
}
