@extends('adminlte::page')

@section('title', 'Create New Permission')

@section('content')
<div class="container">
    {!! Form::open(array('route' => 'permissions.store','method'=>'POST')) !!}
    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-primary"><i class="fa fa-plus"></i> Add Permission</h5>
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
            
            <div class="form-group">
                <label for="inputText">Group</label>
                <select class="form-control" id="selPermissions" name="parent_id">
                    @if (isset($menu->parent))
                    <option value="{{ $menu->parent_id }}" selected="selected">{{ $menu->parent->name }}</option>
                    @endif
                </select>
                <small id="emailHelp" class="form-text text-muted">Leave empty to create group</small>
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label>Name</label>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
            </div>

            <div class="form-group">
                
                <small id="emailHelp" class="form-text text-muted">Leave empty to create group</small>
            </div>
            
        </div>
        <div class="card-footer">
            <center>
                <a class="btn btn-default" href="{{ route('permissions.index') }}"> Cancel</a>
                <button type="submit" class="btn btn-primary"> Save</button>
            </center>
        </div>
    </div>
    {!! Form::close() !!}
</div>

@endsection

@section('js')
    <script src="{{ asset('js/select_2.js') }}"></script>
@endsection