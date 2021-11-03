@extends('adminlte::page')

@section('title', 'Edit Employee')
@section('content')
<div class="container py-4">
    {!! Form::model($employee, ['method' => 'put','route' => ['employees.update', $employee->id]]) !!}
    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-primary"><i class="fa fa-edit"></i> Edit ({{ $employee->name }})</h5>
        </div>
        <div class="card-body">
            @include('modules.employees.form')
        </div>
        <div class="card-footer">
            <center>
                <a href="{{  route('employees.index') }}" class="btn btn-default"> Cancel</a>
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
