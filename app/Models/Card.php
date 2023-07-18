<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Card extends Model
{
    use HasFactory;

    protected $primaryKey = 'card_id';

    protected $fillable = [
        'user_id',
        'card_number',
        'security_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
