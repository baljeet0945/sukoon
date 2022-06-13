@extends('layout.admin')
@section('title', 'Expensive Category Create')
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

                            <h4 class="card-title">Add Expensive Category </h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                
                                <form action="{{ route('admin.excates.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3 row">
                                        <label class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" style="text-transform: capitalize"
                                                class="form-control form-control-sm" placeholder="Enter Name" name="name">
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

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">View Expensive category</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-sm" id="expensivecategory">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $cata)
                                            <tr>
                                                <th>{{ $no++ }}</th>
                                                <td>{{ $cata->name }}</td>
                                                <td><input data-id="{{$cata->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Suspend" {{ $cata->status ? 'checked' : '' }}></td>
                                                <td>{{ $cata->created_at->format('d M,Y') }}</td>
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
                                                                href="{{ route('admin.excates.edit', $cata->id) }}">Edit</a>
                                                            <form method="post" action="{{ route('admin.excates.destroy',$cata->id) }}">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Delete</button>
                                                            </form>

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
        $('#expensivecategory').DataTable({
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
          var excate_id = $(this).data('id'); 
           console.log(status);
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/admin/changeExcatestatus',
              data: {'status': status, 'excate_id': excate_id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>
    @endpush