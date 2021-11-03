@extends('adminlte::page')

@section('title', 'Create Employee')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-primary"> Create Employee</h5>
        </div>
        <div class="card-body">            
            {!! Form::open(array('route' => 'employees.store','method'=>'POST', 'class' => 'form-horizontal')) !!}

            @include('modules.employees.form')
            <hr>
            <center>
                <a href="{{  route('employees.index') }}" class="btn btn-default"> Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>    
            </center>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/select_2.js') }}"></script>
@endsection