@extends('layouts.admin')

@section('content')

    <h1>Admin Users Create</h1>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files'=>true]) !!}

        {{-- Name --}}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>{{-- EndName --}}

        {{-- Email --}}
        <div class="form-group">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
        </div>{{-- EndEmail --}}

        {{-- Role --}}
        <div class="form-group">
            {!! Form::label('role_id', 'Role:') !!}
            {!! Form::select('role_id', ['' => 'Choose role... '] + $roles, null, ['class'=>'form-control'], ['placeholder' => 'Choose a Role']) !!}
        </div>{{-- EndRole --}}
        
        {{-- Status --}}
        <div class="form-group">
            {!! Form::label('is_active', 'Status:') !!}
            {!! Form::select('is_active', array(1 => 'Active', 0 => 'Inactive'), 0, ['class'=>'form-control']) !!}
        </div>{{-- EndStatus --}}

         {{-- File Upload --}}
        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>{{-- EndFileUpload --}}

         {{-- Password --}}
         <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password',  ['class'=>'form-control']) !!}
        </div>{{-- EndPassword --}}

        <div class="form-group">
            {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

    {{--  Display Errors  --}}
    @include('layouts.errors')

@endsection