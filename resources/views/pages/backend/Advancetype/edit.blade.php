@extends('layout.admin')
@section('title', 'Employees Advance')
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
                        <h4 class="card-title"> Edit Employee Advance</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('admin.advance-type.update',$data->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-sm" name="name"
                                             value="{{ $data->name }}" placeholder="Enter Name">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
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