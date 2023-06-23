<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployContact extends Model
{
    use HasFactory;

    public function employ(){
        return $this->belongsTo(Employ::class);
    }
}
