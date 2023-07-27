<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Path;
use App\Models\Card;
use App\Models\UserStatus;
use App\Models\Transaction;
use App\Models\UserContact;
use App\Models\RecentActivity;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $primaryKey = 'user_id';

    protected $fillable = [
        'status_id,',
        'first_name',
        'last_name',
        'email',
        'password',
        'date_of_birth',
        'nic',
        'licence_id',
        'blood_group',
        'license_issue_date',
        'license_expire_date',
        'points',
        'device_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getRouteKeyName()
    {
        return 'user_id';
    }

    public function userStatus()
    {
        return $this->belongsTo(UserStatus::class, 'status_id');
    }

    public function cards()
    {
        return $this->hasMany(Card::class, 'user_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }

    public function userContacts()
    {
        return $this->hasMany(UserContact::class, 'user_id');
    }

    public function recentActivities()
    {
        return $this->hasMany(RecentActivity::class, 'user_id');
    }

    public function paths()
    {
        return $this->hasMany(Path::class, 'user_id');
    }

}
