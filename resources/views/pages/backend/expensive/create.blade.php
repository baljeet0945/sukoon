@extends('layout.admin')
@section('title', 'Expensive Create')
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

                            <h4 class="card-title">Add Expensive</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('admin.expens.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label col-form-label-sm">Category</label>
                                        <div class="col-sm-10">
                                            <select name="category" class="default-select form-control wide mb-3">
                                                <option value="">Select Category</option>
                                                @foreach ($excate as $value)
                                                    <option value="{{ $value->id }}">{{ $value->excate->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label col-form-label-sm">Price</label>
                                        <div class="col-sm-10">
                                            <input type="text" style="text-transform: capitalize"
                                                class="form-control form-control-sm" placeholder="Enter Price" name="price">
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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">View Expensive</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-sm" id="expensive">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($excate as $data)
                                            <tr>
                                                <th>{{ $no++ }}</th>
                                                <td>{{ $data->excate->name ?? null }}</td>
                                                <td> &#8377;{{ $data->price  }}</td>
                                                <td>{{ $data->created_at->format('d M,Y') }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn btn-primary light sharp"
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
                                                                href="{{ route('admin.expens.edit', $data->id) }}">Edit</a>
                                                            <a class="dropdown-item"
                                                                onclick="deleteExpensive('{{ route('admin.expens.destroy', $data->id) }}')">Delete</a>

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

@push('css')
    <link href="{{ asset('backend/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endpush
@push('js')
    <script src="{{ asset('backend/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/js/plugins-init/datatables.init.js') }}"></script>

    <script>
        $('#expensive').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });
    </script>
@endpush
