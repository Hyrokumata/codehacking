@extends('layouts.admin')

@section('content')
    <h1>Posts Create</h1>

    <div class="row">

        {!! Form::open(['method' => 'POST', 'action' =>'AdminPostsController@store', 'files' => true]) !!}

            {{-- Title --}}
            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>

            {{-- Category --}}
            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id', ['' =>  'Select a category...'] + $categories, null, ['class' => 'form-control']) !!}
            </div>

            {{-- Body --}}
            <div class="form-group">
                {!! Form::label('body', 'Body:') !!}
                {!! Form::textarea('body', null, ['id' => 'body', 'rows' => 4, 'class' => 'form-control']) !!}
            </div>

            {{-- Photo --}}
            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            {{-- Submit --}}
            <div class="form-group">
                {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}

    </div>

    <div class="row">
        {{--  Display Errors  --}}
        @include('layouts.errors')
    </div>
  

@endsection