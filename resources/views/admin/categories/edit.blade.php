@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Edit - {{ $category->name }}</h1>
    </div>

    <div class="row">
        {!! Form::open(['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}
            
            <div class="form-group">
                {!! Form::label('name', 'Name::') !!}
                {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
            </div>

            {!! Form::submit('Update Category', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div> 
@endsection