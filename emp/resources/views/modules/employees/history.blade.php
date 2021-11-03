@extends('adminlte::page')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><i class="fa fa-user-minus"></i> Deleted Employees</h5>
        </div>
        <div class="card-body">
            <div class="col-12">
                <table class="table" width="100%">
                    <thead>
                        <td>Name</td>
                        <td>Emp No</td>
                        <td>Email</td>
                        <td>Location</td>
                        <td>Action</td>
                    </thead>
                    @foreach($employees as $key => $employee)
                    <tbody>
                        <td>{{ $employee->name }}</td>
                        <td>{{ ($employee->details)?$employee->details->emp_num:'' }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ ($employee->details)?$employee->details->address->name:'' }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-danger sa-warning" data-restore="restore" data-title="Employee" data-route="employees" data-id="{{ $employee->id }}" data-toggle="modal" data-target="#modal-delete">
                              <i class="fa fa-trash-restore"></i>
                            </button>
                        </td>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>

@include('layouts.delete')
@include('layouts.restore')
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/select_2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/delete.js') }}"></script>
@endsection
