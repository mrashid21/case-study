@extends('adminlte::page')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><i class="fa fa-users"></i> Employees</h5>
            <span class="float-right">
                <a href="{{ route('employees.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></a>
            </span>
        </div>
        <div class="card-body">
            <div class="col-12">
                <div class="col-6">
                    <form action="{{ route('employees.index') }}" method="GET">
                        <div class="input-group input-group">
                            {{-- {!! Form::text('q', $q, array('placeholder' => 'Search','class' => 'form-control form-control')) !!} --}}
                            <select name="addr" class="form-control" id="selAddress"></select>
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary mx-sm-2"><i class="fa fa-search"></i> Filter</button>
                            </span>
                        </div>
                    </form>    
                </div>
                <br>
                <table class="table" width="100%">
                    <thead>
                        <td>Name</td>
                        <td>Emp No</td>
                        <td>Email</td>
                        <td>Location</td>
                        @can('users-edit')
                        <td>Action</td>
                        @endcan
                    </thead>
                    @foreach($employees as $key => $employee)
                    <tbody>
                        <td>{{ $employee->name }}</td>
                        <td>{{ ($employee->details)?$employee->details->emp_num:'' }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ ($employee->details)?$employee->details->address->name:'' }}</td>
                        <td>
                            @can('users-edit')
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                            @if(auth()->user()->id != $employee->id)
                            @can('users-delete')
                            <button type="button" class="btn btn-sm btn-danger sa-warning" data-title="Employee" data-route="employees" data-id="{{ $employee->id }}" data-toggle="modal" data-target="#modal-delete">
                              <i class="fa fa-trash"></i>
                            </button>
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
    <script type="text/javascript" src="{{ asset('js/select_2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/delete.js') }}"></script>
@endsection
