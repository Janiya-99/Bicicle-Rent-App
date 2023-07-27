<?php

namespace App\Models;

use App\Models\Employ;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployContact extends Model
{
    use HasFactory;
    protected $fillable = [
        'employ_id',
        'contact_number'
    ];

    public function employ(){
        return $this->belongsTo(Employ::class,'emp_id');
    }
}
