@extends('layout.admin')
@section('title', 'Employees')
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
                        <h4 class="card-title">Employees Details</h4>
                        <a href="{{ route('admin.employees.create') }}" class="float-right">Add Employee</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Salary</th>
                                        <th>Show</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td><a href="javascript:void(0)">{{ $no++ }}</a>
                                            </td>
                                            <td>{{ $employee->name }}</td>
                                            <td><span class="text-muted">{{ $employee->department }}</span>
                                            </td>
                                            <td> &#8377;{{ $employee->amount }}</td>
                                            <td>
                                                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $employee->id }}" name="name"
                                                data-bs-whatever="@mdo">Advance</a>
                                                                                        
                                                    {{-- @foreach ($employees as $object)                                                       --}}
                                                   
                                                <div class="modal fade" id="exampleModal{{ $employee->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">New
                                                                    message</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('admin.employees.store')}}" method="POST">
                                                                    {{ csrf_field() }}
                                                                    <div class="mb-3">
                                                                        <label for="name"
                                                                            class="col-form-label">Name</label>
                                                                       
                                                                        <input type="text" name="name" id="employee-name" value="{{ $employee->name }}"   class="form-control" id="name">
                                                                        
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="amount"
                                                                            class="col-form-label">Amount</label>
                                                                        <input type="text" name="advance_amount" class="form-control"
                                                                            id="advance_amount">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="amount"
                                                                            class="col-form-label">Type</label>
                                                                        <select class="form-select" name="type"
                                                                            aria-label="Default select example">
                                                                            <option selected> select menu</option>
                                                                            @foreach ($advance as $object )                                                                             
                                                                            
                                                                            <option value="{{ $object->id }}">{{ ucwords($object->name)}}</option>
                                                                           
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Submit</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- @endforeach --}}
                                            </td>
                                            <td>{{ $employee->created_at->format('d M,Y') }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-primary light sharp"
                                                        data-bs-toggle="dropdown">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
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
                                                            href="{{ route('admin.employees.edit', $employee->id) }}">Edit</a>
                                                        <a class="dropdown-item" deleteEmployee
                                                            onclick="deleteEmployee('{{ route('admin.employees.destroy', $employee->id) }}')">Delete</a>

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

    <script type="text/javascript">
       
       function myFunction() {
            var div = document.getElementsByTagName("div")[0].getAttribute("employees"); 
            var id = div.getAttribute('data-id'); 
        }
       
    </script>
@endsection

