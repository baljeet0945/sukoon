@extends('layout.admin')
@section('title', 'Employees Add')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    @if (session()->has('message'))
                        <div class="alert alert-success" id="msg">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="card-header">
                        <h4 class="card-title">Add Employee</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('admin.employees.store') }}" method="post">
                                @csrf
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-sm" name="name"
                                            placeholder="Enter Name">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Department</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="department"
                                            placeholder="Enter Department">
                                        @if ($errors->has('department'))
                                            <span class="text-danger">{{ $errors->first('department') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-lg">Salary</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-lg" name="amount"
                                            placeholder="Enter Salary">
                                        @if ($errors->has('amount'))
                                            <span class="text-danger">{{ $errors->first('amount') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </div>
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
