@extends('layout.admin')
@section('title', 'Expensive Category Edit')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            @if (session()->has('message'))
                                <div class="alert alert-success" id="msg">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <h4 class="card-title">Edit Expensive Category</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('admin.excates.update', $excate->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" style="text-transform: capitalize"
                                                class="form-control form-control-sm" placeholder="Enter Name" name="name"
                                                value="{{ $excate->name }}">
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
    </div>

@endsection
