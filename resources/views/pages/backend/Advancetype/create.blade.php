@extends('layout.admin')
@section('title', 'Employees Advance')
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
                        <h4 class="card-title">Employee Advance</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('admin.advance-type.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label class="col-sm-2 col-form-label col-form-label-sm">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control form-control-sm" name="name"
                                            placeholder="Enter Name">
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">View Employee Advance</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-responsive-sm" id="expensivecategory">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            {{-- <th>Status</th> --}}
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employee as $advance)
                                            
                                        
                                            <tr>
                                                <th>{{ $no++ }}</th>
                                                <td>{{ $advance->name }}</td>
                                                <td>{{ $advance->created_at->format('d M,Y') }}</td>
                                                {{-- <td></td> --}}
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
                                                                href="{{ route('admin.advance-type.edit',$advance->id) }}">Edit</a>
                                                                
                                                                <a class="dropdown-item"
                                                                onclick="deleteAdvanceType('{{ route('admin.advance-type.destroy', $advance->id) }}')">Delete</a>
                                                            

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