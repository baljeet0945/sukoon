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

                            <h4 class="card-title">Add Daily Sale</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('admin.daily.store') }}" method="post"
                                    enctype="multipart/form-data">

                                    @csrf

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label col-form-label-sm"> Sale Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" style="text-transform: capitalize"
                                                class="form-control form-control-sm" placeholder="Enter Price" name="date"
                                                value="">
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
                                                value="">
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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">View Expensive category</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-sm" id="daily">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Data</th>
                                            <th>Amount</th>
                                            {{-- <th>Date</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($daily as $data)
                                            <tr>
                                                <th>{{ $no++ }}</th>
                                                <td>{{ $data->date }}</td>

                                                <td> &#8377; {{ $data->amount }}</td>
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
                                                                href="{{ route('admin.daily.edit', $data->id) }}">Edit</a>
                                                            <a class="dropdown-item"
                                                                onclick="deleteDailysale('{{ route('admin.daily.destroy', $data->id) }}')">Delete</a>

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
        $('#daily').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });
    </script>
@endpush
