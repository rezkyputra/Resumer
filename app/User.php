<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'password', 'roleId', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }


    // Relation

    public function role() {
        return $this->belongsTo('App\role', "roleId");
    }

    public function award() {
        return $this->hasMany('App\award', 'userId', 'id');
    }

    public function education() {
        return $this->hasMany('App\education', 'userId');
    }

    public function exprience() {
        return $this->hasMany('App\exprience', 'userId');
    }

    public function portofolio() {
        return $this->hasMany('App\portofolio', 'userId');
    }

    public function profile() {
        return $this->hasOne('App\profile', 'userId');
    }

    public function skill() {
        return $this->hasMany('App\skill', 'userId');
    }
}
