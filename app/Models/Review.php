<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Review extends Authenticatable
{
    use HasFactory,notifiable;

    protected $fillable = [
        'motel_id', 'renter_id', 'owner_id', 'review'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function owner(){
        return $this->hasOne('App\Models\Owner', 'id', 'owner_id');
    }

    public function renter(){
        return $this->hasOne('App\Models\renter', 'id', 'renter_id');
    }
}
