@extends('layout.admin')
@section('title', 'Daily Sale ')
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
                            
                            <h4 class="card-title">Edit Daily Sale</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('admin.daily.update',$data->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label col-form-label-sm"> Sale Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" style="text-transform: capitalize"
                                                class="form-control form-control-sm" placeholder="Enter Price" name="date"
                                                value="{{ $data->date }}">
                                            @if ($errors->has('date'))
                                                <span class="text-danger">{{ $errors->first('date') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label col-form-label-sm">Sale Amount</label>
                                        <div class="col-sm-10">
                                            <input type="text" style="text-transform: capitalize"
                                                class="form-control form-control-sm" placeholder="Enter Price" name="amount"
                                                value="{{ $data->amount }}">
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
</div>
@endsection