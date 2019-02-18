@extends('layouts.admin')

@section('content')
    <div class="row">
        <h1>Edit - {{ $user->name }}</h1>
    </div>
    <div class="row">
        <div class="col-sm-2">
            <img src="{{ $user->photo ? $user->photo->path : "/images/defaultUser.svg" }}" alt="{{ $user->name }}" class="img-responsive img-rounded">
        </div>
        <div class="col-sm-10">
            {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files'=>true]) !!}

                {{-- Name --}}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', $user->name, ['class'=>'form-control']) !!}
                </div>{{-- EndName --}}

                {{-- Email --}}
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', $user->email, ['class'=>'form-control']) !!}
                </div>{{-- EndEmail --}}

                {{-- Role --}}
                <div class="form-group">
                    {!! Form::label('role_id', 'Role:') !!}
                    {!! Form::select('role_id', $roles, null, ['class'=>'form-control'], ['placeholder' => 'Choose a Role']) !!}
                </div>{{-- EndRole --}}
                
                {{-- Status --}}
                <div class="form-group">
                    {!! Form::label('is_active', 'Status:') !!}
                    {!! Form::select('is_active', array(1 => 'Active', 0 => 'Inactive'), null, ['class'=>'form-control']) !!}
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
                    {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}

            {{--  delete user button  --}}
            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete User', ['class' => 'btn btn-danger']) !!}
                </div>
                
            {!! Form::close() !!}

        </div>
    </div>
    <div class="row">
        {{--  Display Errors  --}}
        @include('layouts.errors')
    </div>
    

@endsection