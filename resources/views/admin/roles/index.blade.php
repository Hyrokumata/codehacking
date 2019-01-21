@extends('layouts.admin');

@section('content')
    <table class="table table-striped table-responsive">
        <thead>
            <tr>
                <th colspan="5">
                    <a href="/admin/roles/create">
                        <button type="button" class="btn btn-success btn-sm pull-right">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true">
                            </span> Add
                        </button>
                    </a>
                </th>
            </tr>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
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