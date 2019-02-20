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

    //Relationship - User-Role (this have one role)
    public function role(){
        return $this->belongsTo('App\Model\Role');
    }

    //Relationship - User-Photo (this have one photo)
    public function photo(){
        return $this->belongsTo('App\Model\Photo');
    }

     // Relationship User->Post (this have mane posts)
     public function posts() {
        return $this->hasMany('App\Model\Post');
    }

    // Method for verify if is admin
    public function isAdmin(){

        if($this->role->name === 'Administrator' && $this->is_active === 1){
            return true;
        }

        return false;
    }

   

}
