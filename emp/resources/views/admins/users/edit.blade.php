@extends('adminlte::page')

@section('title', 'Edit User')
@section('content')
<div class="container py-4">
    {!! Form::model($user, ['method' => 'put','route' => ['users.update', $user->id]]) !!}
    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-primary"><i class="fa fa-edit"></i> Edit ({{ $user->name }})</h5>
        </div>
        <div class="card-body">
            @include('admins.users.form')
        </div>
        <div class="card-footer">
            <center>
                <a href="{{  route('users.index') }}" class="btn btn-default"> Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>    
            </center>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection 

@section('js')
    <script type="text/javascript" src="{{ asset('js/select_2.js') }}"></script>
@endsection
