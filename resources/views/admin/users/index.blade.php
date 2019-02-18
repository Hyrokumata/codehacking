@extends('layouts.admin');

@section('content')
    
    
    <table class="table table-striped table-responsive"> 
        <thead>
            <tr>
                <th colspan="8">
                    <a href="{{ route('admin.users.create') }}">
                        <button type="button" class="btn btn-success btn-sm pull-right">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true">
                            </span> Add
                        </button>
                    </a>
                </th>
            </tr>
          <tr>
            <th>ID</th>
            <th>Avatar</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Actions</th>
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
                            <div class="col-sm-6">
                                <a href="{{ route('admin.users.edit', $user->id) }}">
                                    {{-- <button type="button" class="btn btn-warning"> --}}
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-sm-6 ">
                                {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}

                                    {!! Form::button(
                                        '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>',
                                        array(
                                            'class' => 'btn btn-danger',
                                            'type' => 'submit'
                                        )
                                    ) !!}
                            
                                {!! Form::close() !!}  
                            </div>
                            
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>


@endsection