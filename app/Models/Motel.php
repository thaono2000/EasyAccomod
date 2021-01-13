<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Motel extends Authenticatable
{
    use HasFactory,notifiable;

    protected $fillable = [
        'location',
        'price',
        'acreage',
        'infrastructure',
        'status',
        'title',
        'air_conditioning',
        'hot_cold',
        'bathroom',
        'status',
        'owner_id',
        'extend',
        'now',
        'admin_id'
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

    public function images() {
        return $this->hasMany('App\Models\Image');
    }

    public function likelists() {
        return $this->hasMany('App\Models\LikeList');
    }
    
    public function reviews() {
        return $this->hasMany('App\Models\Review');
    }

    public function owner() {
        return $this->belongsTo('App\Models\Owner');
    }
}
