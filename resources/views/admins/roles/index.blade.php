@extends('adminlte::page')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><i class="fa fa-project-diagram"></i> Roles</h5>
            <span class="float-right"><a href="{{ route('roles.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></a></span>
        </div>
        <div class="card-body">
            <div class="col-12">
                
            <table class="table" width="100%">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Action</td>
                    </tr>
                </thead>
                @foreach($roles as $key => $role)
                <tbody>
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            @can('roles-edit')
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                            {{-- <a href="{{ url('emp/roles/'. $role->id.'/delete') }}" class="btn btn-sm btn-danger showModal"><i class="fas fa-trash"></i></a> --}}
                            @endcan
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
