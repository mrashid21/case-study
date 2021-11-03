@extends('adminlte::page')

@section('title', 'Create Address')
@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-primary"> Create Address</h5>
        </div>
        <div class="card-body">            
            {!! Form::open(array('route' => 'addresses.store','method'=>'POST', 'class' => 'form-horizontal')) !!}

            @include('modules.addresses.form')
            <hr>
            <center>
                <a href="{{  route('addresses.index') }}" class="btn btn-default"> Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>    
            </center>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection