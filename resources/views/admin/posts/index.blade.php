@extends('layouts.admin')

@section('content')
    <h1>Posts Index</h1>
    
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th>
                    <a href="{{ route('admin.posts.create') }}">
                        <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Post</button>
                    </a>
                </th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Owner</th>
                <th>Category</th>
                <th>Photo</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($posts)
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->user ? $post->user->name : 'Post whitout user' }}</td>
                        <td>{{ $post->category ? $post->category->name : 'Post whitout category' }}</td>
                        <td>{{ $post->photo ? $post->photo->path : 'Post whitout photo' }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->body }}</td>
                        <td>{{ $post->created_at->diffForHumans() }}</td>
                        <td>{{ $post->updated_at->diffForHumans() }}</td>
                        <td>
                            <div class="col-sm-6">
                                {{-- <a href="{{ route('admin.post.edit', $post->id) }}"> --}}
                                    <button type="button" class="btn btn-warning">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </button>
                                {{-- </a> --}}
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection