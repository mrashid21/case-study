@extends('adminlte::page')

@section('title', 'Create New User')
@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-primary"> Create User</h5>
        </div>
        <div class="card-body">            
            {!! Form::open(array('route' => 'users.store','method'=>'POST', 'class' => 'form-horizontal')) !!}

            @include('admins.users.form')
            <hr>
            <center>
                <a href="{{  route('users.index') }}" class="btn btn-default"> Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </center>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection