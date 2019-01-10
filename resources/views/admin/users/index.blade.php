@extends('layouts.admin');


@section('content')
    
    <table class="table table-striped table-responsive"> 
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Active</th>
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
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if ($user->is_active)
                            <td>Active</td>
                        @else
                            <td>Inactive</td>
                        @endif
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>{{ $user->updated_at->diffForHumans() }}</td>
                        <td>
                            <i class="fa fa-eye admin-view"></i>
                            <i class="fa fa-edit admin-edit"></i>
                            <i class="fa fa-trash admin-delete"></i>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>


@endsection