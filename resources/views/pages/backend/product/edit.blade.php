@extends('layout.admin')
@section('title','Product Edit')
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
                        
                        <h4 class="card-title">Edit Menu</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('admin.product.update',$product->id) }}" method="post"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-sm"> Product Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" style="text-transform: capitalize" class="form-control form-control-sm" placeholder="Enter Product Name"
                                            name="product_name" value="{{ $product->product_name }}">
                                        @if ($errors->has('product_name'))
                                            <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label col-form-label-sm">Category</label>
                                    <div class="col-sm-10">
                                        <select  name="category" class="default-select form-control wide mb-3">
                                            
                                            @foreach($category as $data)
                                                <option value="{{ $data->id }}" @if(old('data') == $data->id || $data->id == $product->category_id) selected @endif>{{ $data->title }}</option>
                                            @endforeach
                                          
                                        </select>
                                        @if ($errors->has('product name'))
                                            <span class="text-danger">{{ $errors->first('product name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control form-control-lg"
                                            placeholder="col-form-label-lg" name="image">
                                        @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" placeholder="Enter Price"
                                            name="price" value="{{ $product->price }}">
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
