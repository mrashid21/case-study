@extends('adminlte::page')

@section('title', 'Permissions')

@section('content')

<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><i class="fa fa-list"></i> Permissions</h5>
            <div class="text-right">
                @can('roles-create', Model::class)
                <a class="btn btn-primary" href="{{ route('permissions.create') }}"><i class="fa fa-plus"></i> Add Access Control</a>    
                @endcan
            </div>
        </div>
        <div class="card-body">            
            @if (count($permissions) == 0)
                <div class="text-center">
    
                    <i class="fa fa-search fa-4x text-muted"></i>
                    <div class="text-bold">
                        Could not find any items
                    </div>
                    <div class="text-muted">
                        Try changing the filters or add a new one
                    </div>
    
                    <div class="mt-3">
                        @role('superadmin')
                        <a class="btn btn-primary" href="{{ route('permissions.create') }}"><i class="fa fa-plus"></i> Add Access Control</a>    
                        @endcan
                    </div>
    
                </div>
            @endif
    
            <div class="row">
                @foreach ($permissions as $value)
                <div class="col-4">
    
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ Str::ucfirst($value->name) }}</h5>
                        </div>
                        <div class="card-body">
                            <ul>
                                @foreach ($value->children as $item)
                                    <li>
                                        {{ $item->name }} 
                                        {{-- @can('roles-delete')
                                            <button type="button" class="btn btn-light btn-xs sa-warning text-danger" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></button>    
                                        @endcan --}}
                                    </li>
                                @endforeach
                            </ul>
                            
                        </div>
                    </div>
                
                </div>
                @endforeach
            </div>
    
                
            {!! $permissions->render() !!}
        </div>
        
    </div>
</div>

@endsection
    
@section('js')
@endsection