<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Owner extends Authenticatable
{
    use HasFactory,notifiable;

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'address',
        'identity',
        'phone',
        'status',
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

    public function likelists(){
        return $this->hasMany('App\Models\LikeList');
    }

    public function motels() {
        return $this->hasMany('App\Models\Motel');
    }

    public function notifications() {
        return $this->hasMany('App\Models\Notification');
    }
}
