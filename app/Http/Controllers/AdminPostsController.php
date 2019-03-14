<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Post;
use App\Http\Requests\PostsCreateRequest;
use App\Model\Category;
use Auth;
use App\Model\Photo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::lists('name', 'id')->all();

        $categories = Category::lists('name', 'id')->all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $input = $request->all();

        $user = Auth::user();

        if($file = $request->file('photo_id')){

             // Criar um nome para o ficheiro incluindo o tempo de criação e o nome do utilizador
             $name = time() . '_' . $file->getClientOriginalName();
             // Colocar o ficheiro (photo) na pasta /public/images;
             $file->move('images', $name);
             // Criar um novo objecto photo
             $photo = Photo::create(['path' => $name]);
             // Adicionar ao utilizador o id da photo criada
             $input['photo_id'] = $photo->id;

        }

        $user->posts()->create($input);

        Session::flash('info', 'The Post has been created!');

        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('admin.posts.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('admin.posts.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return view('admin.posts.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return view('admin.posts.destroy');
    }
}
