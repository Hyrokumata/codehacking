@extends('layouts.admin');

@section('content')
    <h1>Admin Roles Create</h1>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminRolesController@store']) !!}
        
    {{-- Name --}}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>
    {{--  EndName  --}}

    {{-- Submit --}}
        <div class="form-group">
            {!! Form::submit('Create Role', ['class'=>'btn btn-primary']) !!}
        </div>
    {{-- EndSubmit --}}

    {{-- Display Errors --}}
    @include('layouts.errors')

    {!! Form::close() !!}
@endsection