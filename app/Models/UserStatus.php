<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'user_id = 1 '];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
