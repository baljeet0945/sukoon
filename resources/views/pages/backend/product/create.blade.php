@extends('layout.admin')
@section('title', 'Add Menu')
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

                            <h4 class="card-title">Add Menu Items</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('admin.product.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label col-form-label-sm"> Product Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" style="text-transform: capitalize"
                                                class="form-control form-control-sm" placeholder="Enter Product Name"
                                                name="product_name">
                                            @if ($errors->has('product_name'))
                                                <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label col-form-label-sm">Category</label>
                                        <div class="col-sm-10">


                                            <select name="category" class="default-select form-control wide mb-3">
                                                <option value="">Select Category</option>
                                                @foreach ($category as $data)
                                                    <option value="{{ $data->id }}">{{ $data->title }}</option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('category'))
                                                <span class="text-danger">{{ $errors->first('category') }}</span>
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
                                                name="price">
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
                            <h4 class="card-title">View Menu </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table class="table table-responsive-sm" id="product">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>

                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <th>{{ $no++ }}</th>
                                                <td>{{ $product->product_name }}</td>
                                                </td>
                                                <td><img src="{{ asset('uploads/products/' . $product->image) }}"
                                                        width="50" height="50" alt=""></td>
                                                <td>
                                                    <input data-id="{{ $product->id }}" class="toggle-class"
                                                        type="checkbox" data-onstyle="success" data-offstyle="danger"
                                                        data-toggle="toggle" data-on="Active" data-off="Suspend"
                                                        {{ $product->status ? 'checked' : '' }}>
                                                </td>
                                                <td> &#8377;{{ $product->price }}</td>
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
                                                                href="{{ route('admin.product.edit', $product->id) }}">Edit</a>
                                                            <a class="dropdown-item"
                                                                onclick="deleteProduct('{{ route('admin.product.destroy', $product->id) }}')">Delete</a>


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
        $('#product').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });
    </script>

    <script>
        $(function() {
            $('.toggle-class').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var product_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/admin/changeStatus',
                    data: {
                        'status': status,
                        'product_id': product_id
                    },
                    success: function(data) {
                        console.log(data.success)
                    }
                });
            })
        })
    </script>
@endpush
