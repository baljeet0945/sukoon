@extends('layout.admin')
@section('title', 'Expensive Edit')
@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        @if (session()->has('message'))
                                <div class="alert alert-success" id="msg">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                        <div class="card-header">
                            
                            <h4 class="card-title">Edit Expensive</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('admin.expens.update', $expen->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label col-form-label-sm">Category</label>
                                        <div class="col-sm-10">
                                            <select  name="category" class="default-select form-control wide mb-3">
                                                
                                                @foreach($excate as $data)
                                                    <option value="{{ $data->id }}" @if(old('data') == $data->id || $data->id == $expen->id) selected @endif>{{ $data->name }}</option>
                                                @endforeach
                                              
                                            </select>
                                            @if ($errors->has('product name'))
                                                <span class="text-danger">{{ $errors->first('product name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label col-form-label-sm">Price</label>
                                        <div class="col-sm-10">
                                            <input type="text" style="text-transform: capitalize"
                                                class="form-control form-control-sm" placeholder="Enter Price" name="price"
                                                value="{{ $expen->price }}">
                                            @if ($errors->has('price'))
                                                <span class="text-danger">{{ $errors->first('price') }}</span>
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
