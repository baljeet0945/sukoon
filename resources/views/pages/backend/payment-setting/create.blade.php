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
                        <h4 class="card-title">Payment Setting</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('admin.payment-setting.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="date" name="date" class="form-control" placeholder="Start Date">
                                        @if ($errors->has('date'))
                                            <span class="text-danger">{{ $errors->first('date') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                        <input type="date" name="date_end" class="form-control" placeholder="End Date">
                                        @if ($errors->has('date_end'))
                                            <span class="text-danger">{{ $errors->first('date_end') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12" style="padding:15px;">
                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">View Payment Setting</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-responsive-md" id="category">
                                    <thead>
                                        <tr>
                                            <th style="width:80px;"><strong>#</strong></th>
                                            <th><strong>Start Date</strong></th>
                                            <th><strong>End Date</strong></th>                                           

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $data1)
                                            <tr>
                                                <td><strong>{{ $no++ }}</strong></td>
                                                <td>{{ $data1->date }}</td>
                                                <td>
                                                   {{ $data1->date_end }}
                                                </td>                                              

                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-success light sharp"
                                                            data-bs-toggle="dropdown">
                                                            <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                                version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24" height="24" />
                                                                    <circle fill="#000000" cx="5" cy="12" r="2" />
                                                                    <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                    <circle fill="#000000" cx="19" cy="12" r="2" />
                                                                </g>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.payment-setting.edit', $data1->id) }}">Edit</a>
                                                            <a class="dropdown-item"
                                                                onclick="deleteAdvance('{{ route('admin.payment-setting.destroy', $data1->id) }}')">Delete</a>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
