@extends('layouts.admin');


@section('content')
    
    <table class="table table-striped table-responsive"> 
        <thead>
            <tr>
                <th colspan="8">
                    <button type="button" class="btn btn-success btn-sm pull-right"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add</button>
                </th>
            </tr>
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
                        {{-- @if ($user->is_active)
                            <td>Active</td>
                        @else
                            <td>Inactive</td>
                        @endif --}}
                        <td>{{ $user->is_active == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>{{ $user->updated_at->diffForHumans() }}</td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-warning btn-sm">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>


@endsection