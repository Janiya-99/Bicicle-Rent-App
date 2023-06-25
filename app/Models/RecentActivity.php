<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentActivity extends Model
{
    use HasFactory;


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
