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
        return $this->belongsTo(User::class, 'status_id', 'status_id');
    }
}
