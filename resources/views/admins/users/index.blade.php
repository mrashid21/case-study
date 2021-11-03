@extends('adminlte::page')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><i class="fa fa-users"></i> Users</h5>
            <span class="float-right">
                <a href="{{ route('users.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></a>
            </span>
        </div>
        <div class="card-body">
            <div class="col-12">
                
            <table class="table" width="100%">
                <thead>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Action</td>
                </thead>
                @foreach($users as $key => $user)
                <tbody>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{-- <a class="btn btn-sm btn-primary " href="./{{ $item->code }}"><i class="fas fa-file-alt"></i></a> --}}
                        @can('users-edit')
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                        @if(auth()->user()->id != $user->id)
                        @can('users-delete')
                        <button type="button" class="btn btn-sm btn-danger sa-warning" data-title="User" data-route="users" data-id="{{ $user->id }}"><i class="fa fa-trash"></i></button>
                        @endcan
                        @endif
                        @endcan
                    </td>
                </tbody>
                @endforeach
            </table>
            </div>
        </div>
    </div>
</div>

@include('layouts.delete')
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/delete.js') }}"></script>
@endsection
