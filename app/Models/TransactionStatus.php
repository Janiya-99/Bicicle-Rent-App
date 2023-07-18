<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'transacton-_status'
    ];

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
