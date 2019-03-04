<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'category_id',
        'photo_id',
        'title',
        'body'
    ];

    // Relation Post->User (this have one user)
    public function user(){
        return $this->belongsTo('App\User');
    }

    // Relation Post->Photo (this have one photo)
    public function photo(){
        return $this->belongsTo('App\Model\Photo');
    }

    // Relation Post->Category (this have one category)
    // public function category(){
    //     return $this->belongsTo('App\Model\Category');
    // }
}
