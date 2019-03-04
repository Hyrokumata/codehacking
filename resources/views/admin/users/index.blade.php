@extends('layouts.admin');

@section('content')
    
@if (Session::has('info'))
    <p class="bg-danger">{{ session('info') }}</p>
@endif

    

    <div class="row">
        <h1>Users</h1>
        <hr>
        <a href="{{ route('admin.users.create') }}">
            <button type="button" class="btn btn-success btn-sm">
                <span class="glyphicon glyphicon-plus" aria-hidden="true">
                </span> Add User
            </button>
        </a>
    </div>
   
    <div class="row">
        <table class="table table-striped table-responsive"> 
            <thead>
                <tr>
                <th>ID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Role</th>
                <th>Email</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
                <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($users)
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td><img src="{{ $user->photo ? $user->photo->path : "/images/defaultUser.svg" }}" class="avatar"></td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->role ? $user->role->name : 'User has no role' }}</td>
                            <td>{{ $user->email }}</td>
                            {{-- @if ($user->is_active)
                                <td>Active</td>
                            @else
                                <td>Inactive</td>
                            @endif --}}
                            <td>{{ $user->is_active == 1 ? 'Active' : 'Inactive' }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td>{{ $user->updated_at->diffForHumans() }}</td>
                            <td>
                                {{-- <a href="{{ route('admin.users.edit', $user->id) }}">
                                    <button type="button" class="btn btn-warning">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </button>
                                </a> --}}
                               

                                
                                
                                <div class="btn-toolbar" role="toolbar" aria-label="Actions">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-warning btn-sm" href="{{ route('admin.users.edit', $user->id) }}">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                                        </a>
                                    </div>
                                    <div class="btn-group" role="group">
                                        {{ Form::open(['action' => ['AdminUsersController@destroy', $user->id], 'method' => 'DELETE']) }}
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
                                            </button>
                                        {{ Form::close() }}
                                    </div>
                                </div>


                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
   
@endsection