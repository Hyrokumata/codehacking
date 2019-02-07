<?php

namespace App\helpers;

use App\User;
use App\Model\Photo;

    // Helpers functions

    function createUser(User $user,Request $input){
       
        // Verificar se o utilizador já possui photo
        if(verifyHasPhoto($user)){
            if($request->file('photo_id')!==null) {
                // Pegar no ficheiro novo
                $fileNew = $request->file('photo_id');
                // Pegar no caminho do ficheiro existente
                $fileOld = $user->photo->path;
                // Pegar no id da photo existente
                $photoID = $user->photo->id;
                deletePhotoFromFolder($fileOld);


            }
        }
    }

    // Função para verificar se o utilizador tem photo
    function verifyHasPhoto(User $user){
        return isset($user->photo);
    }
    
    // Funcao para apagar ficheiro existente
    function deletePhotoFromFolder(Photo $fileOld){
        // Apagar photo antiga da pasta
        $fileOld = preg_replace("#[\/]#", "\\", $fileOld);
        $filePath = public_path() . $fileOld;
        unlink($filePath);
    }