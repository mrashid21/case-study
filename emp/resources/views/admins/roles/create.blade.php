@extends('adminlte::page')

@section('title', 'Create New Role')

@section('content')
<div class="container py-4">
    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-primary"><i class="fa fa-plus"></i> Add Role</h5>
        </div>
        <div class="card-body">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
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