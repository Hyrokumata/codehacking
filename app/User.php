<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'photo_id', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Relationship - User-Role
    public function role(){
        return $this->belongsTo('App\Model\Role');
    }

    //Relationship - User-Photo
    public function photo(){
        return $this->belongsTo('App\Model\Photo');
    }

}
