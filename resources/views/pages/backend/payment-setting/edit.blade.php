@extends('layout.admin')
@section('title', 'Advance Date')
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
                        <h4 class="card-title">Edit Payment Setting </h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('admin.payment-setting.update',$advance->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="date" name="date"  value="{{ $advance->date }}"class="form-control" placeholder="Start Date">
                                        @if ($errors->has('date'))
                                            <span class="text-danger">{{ $errors->first('date') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                        <input type="date" name="date_end" value="{{ $advance->date_end }}" class="form-control" placeholder="End Date">
                                        @if ($errors->has('date_end'))
                                            <span class="text-danger">{{ $errors->first('date_end') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12" style="padding:15px;">
                                    <button type="submit" class="btn btn-primary mb-2">Updated</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
