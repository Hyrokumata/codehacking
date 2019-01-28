<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Model\Role;
use App\Http\Requests\UsersRequest;
use App\Model\Photo;
use Illuminate\Support\Facades\File;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Getting all users
        $users = User::all();

        // var_dump($users);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Pull out roles
        $roles = Role::lists('name', 'id')->all();

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        
        $inputRequest = $request->all();

        if($file = $request->file('photo_id')){
            
            // Criar um nome para o ficheiro incluindo o tempo de criação e o nome do utilizador
            $name = time() . '_' . $file->getClientOriginalName();
            // Colocar o ficheiro (photo) na pasta /public/images;
            $file->move('images', $name);
            // Criar um novo objecto photo
            $photo = Photo::create(['path' => $name]);
            // Adicionar ao utilizador o id da photo criada
            $inputRequest['photo_id'] = $photo->id;
        }

        $inputRequest['password']= bcrypt($request->password);

        User::create($inputRequest);


        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = Role::lists('name', 'id')->all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {

        // Pegar na informação do utilizador a editar
        $user = User::findOrFail($id);
        // Pegar na informação do input
        $input = $request->all();

        // Verificar se o utilizador já possui photo
        if(isset($user->photo)){
            // Verificar se o utilizadr fez upload de uma photo nova
            if($request->file('photo_id')!==null) {
                // Pegar no ficheiro novo;
                $fileNew = $request->file('photo_id');
                // Pegar caminho photo antiga;
                $fileOld = $user->photo->path;
                // Pegar no id da photo existente;
                $photoID = $user->photo->id;
                // Apagar photo antiga da pasta
                $fileOld = preg_replace("#[\/]#", "\\", $fileOld);
                $filePath = public_path() . $fileOld;
                unlink($filePath);
                // Apagar a photo do user
                $user->photo->delete();
                /**
                 * Atulizar novos dados
                 */
                // Criar nome para o ficheiro;
                $name = time() . '_' . $fileNew->getClientOriginalName();
                $fileNew->move('images', $name);
                // Criar novo object photo
                $photoNew = Photo::create(['path' => $name]);
                $input['photo_id'] = $photoNew->id;
                // encryptar a password
                $input['password'] = bcrypt($request->password);
                // atualizar dados do utilziador
                $user->update($input);
            } else {
                // encryptar a password
                $input['password'] = bcrypt($request->password);
                $user->update($input);
            }
        } else {
            if($fileNew = $request->file('photo_id')){
                // Criar nome para o ficheiro;
                $name = time() . '_' . $fileNew->getClientOriginalName();
                $fileNew->move('images', $name);
                // Criar novo object photo
                $photoNew = Photo::create(['path' => $name]);
                $input['photo_id'] = $photoNew->id;
                // encryptar a password
                $input['password'] = bcrypt($request->password);

                $user->update($input);
            } else {
                // encryptar a password
                $input['password'] = bcrypt($request->password);
                $user->update($input);
            }
            
        }
        return redirect('admin/users/');



        //return view('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('admin.users.destroy');
    }
}
