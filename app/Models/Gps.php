<?php

namespace App\Models;

use App\Models\Path;
use App\Models\Bicycle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gps extends Model
{
    use HasFactory;
    protected $primaryKey = 'gps_id';

    protected $fillable = [
        'path_id',
        'bicycle_id',
        'gps_points_lang',
        'gps_points_long'
    ];

    public function bicycle(){
        return $this->belongsTo(Bicycle::class);
    }

    public function path(){
        return $this->belongsTo(Path::class);
    }
}
