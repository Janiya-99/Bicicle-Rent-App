<?php

namespace App\Models;

use App\Models\RecentActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentType extends Model
{
    use HasFactory;

    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'payment_type',
        'description'
    ];

    public function recentActivity(){
        return $this->belongsTo(RecentActivity::class);
    }
}
