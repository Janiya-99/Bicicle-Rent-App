<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserStatus extends Model
{
    use HasFactory;

    protected $primaryKey = 'status_id';

    protected $fillable = [
        'status_id',
        'status',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'status_id');
    }
}
