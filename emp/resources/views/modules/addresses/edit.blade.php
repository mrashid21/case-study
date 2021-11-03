@extends('adminlte::page')

@section('title', 'Edit Address')
@section('content')
<div class="container py-4">
    {!! Form::model($address, ['method' => 'put','route' => ['addresses.update', $address->id]]) !!}
    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-primary"><i class="fa fa-edit"></i> Edit ({{ $address->name }})</h5>
        </div>
        <div class="card-body">
            @include('modules.addresses.form')
        </div>
        <div class="card-footer">
            <center>
                <a href="{{  route('addresses.index') }}" class="btn btn-default"> Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>    
            </center>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection 