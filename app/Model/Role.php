<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    // Permitir escrever na base de dados
    protected $fillable = [
        'name'
    ];

    // Relationship Role-User
    public function user(){
        return $this->belongsToMany('App\User');
    }
}
