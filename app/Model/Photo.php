<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    // indicação do caminho
    protected $folder = '/images/';

    // permissão para escrever na base de dados
    protected $fillable = [
        'path'
    ];

    // Assessor Atribute
    public function getPathAttribute($photo) {
        return $this->folder . $photo;
    }

}
