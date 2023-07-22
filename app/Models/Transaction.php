<?php

namespace App\Models;

use App\Models\User;
use App\Models\TransactionStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'transaction_id';

    protected $fillable = [
        'user_id',
        'transaction_status_id',
        'amount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'transaction_id');
    }

    public function transactionStatus()
    {
        return $this->belongsTo(TransactionStatus::class,'transaction_id');
    }
}

