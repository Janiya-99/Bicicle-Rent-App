<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;

    protected $primaryKey = 'contact_id';

    protected $fillable = [
        'contact_id',
        'contact_number',
        'user_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
