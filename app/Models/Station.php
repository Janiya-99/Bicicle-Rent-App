<?php

namespace App\Models;

use App\Models\Bicycle;
use App\Models\RecentActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Station extends Model
{
    use HasFactory;
    protected $primaryKey = 'station_id';

    protected $fillable = [
        'name',
        'lang',
        'long',
        'description',
        'is_open',
        'address_line_1',
        'address_line_2',
        'address_line_3'
    ];

    public function bicycles(){
        return $this->hasMany(Bicycle::class);
    }

    public function recentActivities(){
        return $this->hasMany(RecentActivity::class);
    }
}
