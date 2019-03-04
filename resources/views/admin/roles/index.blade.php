@extends('layouts.admin');

@section('content')

<div class="row">
    <h1>Roles</h1>
    <hr>
    <a href="{{ route('admin.roles.create') }}">
        <button type="button" class="btn btn-success btn-sm">
            <span class="glyphicon glyphicon-plus" aria-hidden="true">
            </span> Add Role
        </button>
    </a>
</div>
    <div class="row">
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($roles)
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->created_at ? $role->created_at->diffForHumans() : 'No Specific date' }}</td>
                            <td>{{ $role->updated_at ? $role->updated_at->diffForHumans() : 'No Specific date' }}</td>
                            <td>
                                <div class="btn-toolbar" role="tollbar" aria-label="Actions">
                                    <div class="btn-group" role="group">
                                        {{-- Edit Button --}}
                                        <a class="btn btn-warning btn-sm" href="{{ route('admin.roles.edit', $role->id) }}">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                                        </a>
                                    </div>
                                    <div class="btn-group" role="group">
                                        {{-- Delete button --}}
                                        {{ Form::open(['action' => ['AdminRolesController@destroy', $role->id], 'method' => 'DELETE']) }}
                                            <button class="btn btn-danger btn-sm" type="submit">
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