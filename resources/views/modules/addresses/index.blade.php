@extends('adminlte::page')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title"><i class="fa fa-search-location"></i> Address</h5>
            <span class="float-right">
                <a href="{{ route('addresses.create') }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></a>
            </span>
        </div>
        <div class="card-body">
            <div class="col-12">
                
            <table class="table" width="100%">
                <thead>
                    <td>Name</td>
                    <td>Address</td>
                    <td>Action</td>
                </thead>
                @foreach($addresses as $key => $addr)
                <tbody>
                    <td>{{ $addr->name }}</td>
                    <td>{{ $addr->address }}</td>
                    <td>
                        {{-- <a class="btn btn-sm btn-primary " href="./{{ $item->code }}"><i class="fas fa-file-alt"></i></a> --}}
                        <a href="{{ route('addresses.edit', $addr->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-pencil-alt"></i></a>
                        <button type="button" class="btn btn-sm btn-danger sa-warning" data-title="Address" data-route="addresses" data-id="{{ $addr->id }}"><i class="fa fa-trash"></i></button>
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
