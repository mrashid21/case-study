@extends('adminlte::page')

@section('title', 'Edit Role')

@section('content')
<div class="container py-4">
    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-primary"><i class="fa fa-edit"></i> Edit Role ({{ $role->name }})</h5>
        </div>
        <div class="card-body">
            @include('admins.roles.form')
        </div>
        <div class="card-footer">
            <center>
                <a href="{{  route('roles.index') }}" class="btn btn-default"> Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>    
            </center>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection 