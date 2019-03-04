@extends('layouts.admin');

@section('content')
    <h1>Admin Roles Edit - {{ $role->name }} </h1>

    {!! Form::model($role, ['method' => 'PATCH', 'action' => ['AdminRolesController@update', $role->id]]) !!}
        
    {{-- Name --}}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', $role->name, ['class'=>'form-control']) !!}
        </div>
    {{--  EndName  --}}

    {{-- Submit --}}
        <div class="form-group">
            {!! Form::submit('Update Role', ['class'=>'btn btn-success']) !!}
        </div>
    {{-- EndSubmit --}}

    {{-- Display Errors --}}
    @include('layouts.errors')

    {!! Form::close() !!}
@endsection