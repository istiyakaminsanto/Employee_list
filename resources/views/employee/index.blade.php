@extends('layouts.app')
@section('title', 'Employee List')
@section('body')
<div class="table-wrapper">
    <div class="table-title">
        <div class="row">
            <div class="col-sm-6">
                <h2><a href="/" style="text-decoration: none; color: white; ">Manage <b>Employees</b></a></h2>
            </div>
            <div class="col-sm-6">
                <a href="/employee/create" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>

                <a href="/pdf" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>PDF Download</span></a>

                <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
            </div>
        </div>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                    </span>
                </th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                        <label for="checkbox1"></label>
                    </span>
                </td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->address}}</td>
                <td>{{$employee->phone}}</td>
                <td>
                    <a href="/employee/{{$employee->id}}/edit" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>

                    <form action="/employee/{{$employee->id}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit" class="delete">
                            <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="clearfix">
        <ul class="pagination centered">
            {{$employees->links()}}
            {{-- <li class="page-item disabled"><a href="#">Previous</a></li>
            > --}}
        </ul>
    </div>
</div>
@include('employee.partials.messages');
</div>
@endsection 