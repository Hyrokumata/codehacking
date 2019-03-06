@extends('layouts.admin')

@section('content')

    @if (Session::has('info'))
        <p class="bg-danger">{{ session('info') }}</p>
    @endif

    <div class="row">
        <h1>Categories</h1>
        <hr>
        <a href="{{ route('admin.category.create') }}">
            <button type="button" class="btn btn-success btn-sm">
                <span class="glyphicon glyphicon-plus" aria-hidden="true">
                </span> Add Category
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
                @if ($categories)
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>
                            <td>{{ $category->updated_at->diffForHumans() }}</td>
                            <td>
                                {{-- Actions - Edit --}}
                                <div class="btn-toolbar" role="toolbar" aria-label="Actions">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-warning btn-sm" href="{{ route('admin.category.edit', $category->id) }}">
                                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit
                                        </a>
                                    </div>
                                    <div class="btn-group" role="group">
                                        {!! Form::open(['action'=>['AdminCategoriesController@destroy', $category->id], 'method'=>'DELETE']) !!}
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
                                            </button>
                                        {!! Form::close() !!}
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