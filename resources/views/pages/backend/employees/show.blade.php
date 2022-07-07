@extends('layout.admin')
@section('title', 'Employees Show')
@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="form-head d-flex mb-3 align-items-start">
                <div class="me-auto d-none d-lg-block">
                    <h2 class="text-primary font-w600 mb-0">{{ ucwords($employees->name) }}</h2> jk
                    <p class="mb-0"> </p>
                </div>
    
                <div class="dropdown custom-dropdown"> 
                     
                    <div class="btn btn-sm btn-primary light d-flex align-items-center svg-btn" data-bs-toggle="dropdown">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M22.4281 2.856H21.8681V1.428C21.8681 0.56 21.2801 0 20.4401 0C19.6001 0 19.0121 0.56 19.0121 1.428V2.856H9.71606V1.428C9.71606 0.56 9.15606 0 8.28806 0C7.42006 0 6.86006 0.56 6.86006 1.428V2.856H5.57206C2.85606 2.856 0.560059 5.152 0.560059 7.868V23.016C0.560059 25.732 2.85606 28.028 5.57206 28.028H22.4281C25.1441 28.028 27.4401 25.732 27.4401 23.016V7.868C27.4401 5.152 25.1441 2.856 22.4281 2.856ZM5.57206 5.712H22.4281C23.5761 5.712 24.5841 6.72 24.5841 7.868V9.856H3.41606V7.868C3.41606 6.72 4.42406 5.712 5.57206 5.712ZM22.4281 25.144H5.57206C4.42406 25.144 3.41606 24.136 3.41606 22.988V12.712H24.5561V22.988C24.5841 24.136 23.5761 25.144 22.4281 25.144Z" fill="#2F4CDD"></path></g></svg>
                        <div class="text-start ms-3">
                            <span class="d-block fs-16" id="filter">Filter Periode</span>
                            <small class="d-block fs-13">{{ $payment->date }} - {{ $payment->date_end }}</small>
                        </div>
                        <i class="fa fa-angle-down scale5 ms-3"></i>  
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" id="filter">
                        @foreach ( $result as  $value)                       
                        
                        <a class="dropdown-item" href="#">{{ $payment->date }} - {{ $value->format("Y-m-05") }} </a>
                        @endforeach
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-xxl-4 col-lg-4 col-md-4 col-sm-4">  
                    <div class="widget-stat card">
                        <div class="card-body p-3">
                            <div class="media ai-icon d-flex">
                                <span class="me-3 bgl-primary text-primary">                                
                                    <i class="fa-solid fa-indian-rupee-sign"></i>                             
    
                                </span>
                                <div class="media-body">
                                    <h3 class="mb-0 text-black"><span class=" ms-0">{{ $employees->amount }}</span></h3>
                                    <p class="mb-0">Actually Salary<ry/p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-xl- col-xxl-4 col-lg-4 col-md-4 col-sm-4">  
                <div class="widget-stat card">
                    <div class="card-body p-3">
                        <div class="media ai-icon d-flex">
                            <span class="me-3 bgl-primary text-primary">                                
                                <i class="fa-solid fa-indian-rupee-sign"></i>                             

                            </span>
                            <div class="media-body">
                                @foreach ($totalAdvance as $totalAdv )
                                <h3 class="mb-0 text-black"><span class=" ms-0">{{ $totalAdv->total_advance ?? 0}}</span></h3>
                                @endforeach
                               
                                <p class="mb-0">Total Advance</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-4 col-lg-4 col-md-4 col-sm-4">
                <div class="widget-stat card">
                    <div class="card-body p-3">
                        <div class="media ai-icon d-flex">
                            <span class="me-3 bgl-primary text-primary">                               
                                <i class="fa-solid fa-indian-rupee-sign"></i>                               
                            </span>
                            <div class="media-body">
                                <h3 class="mb-0 text-black"><span class=" ms-0">{{ ($employees->amount)-($totalAdv->total_advance) }}</span></h3>
                                <p class="mb-0">Pandding Salary</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"></h4>
                        <a href="{{ route('admin.employees.index') }}" class="float-right btn btn-success">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                         
                            <table class="table table-bordered table-responsive-sm">
                                <thead>
                                    <tr>
                                                                     
                                        <th>Advance Total</th>                                        
                                        <th>Advance Type</th>
                                        <th>Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $advances as $adv)
                                    <tr>
                                        <th>{{ $adv->advance_amount}}</th>                                        
                                        <td>{{ $adv->name}}</td>                                        
                                        <td>{{ $adv->created_at->format('d M,Y') }}</td>
                                      
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

@push('js')
<script>
    $(document).ready(function(){
    
     var date = new Date();
    
    //  $('.input-daterange').datepicker({
    //   todayBtn: 'linked',
    //   format: 'yyyy-mm-dd',
    //   autoclose: true
    //  });
    
     var _token = $('input[name="_token"]').val();
    
     fetch_data();
    
     function fetch_data(date = '', date_end = '')
     {
      $.ajax({
       url:"{{ route('admin.employees.show',$payment->id) }}",
       method:"GET",
       data:{date:date, date_end:date_end, _token:_token},
       dataType:"json",
       success:function(data)
       {
        var output = '';
        $('#total_records').text(data.length);
        for(var count = 0; count < data.length; count++)
        {
         output += '<tr>';
         output += '<td>' + data[count].post_title + '</td>';
         output += '<td>' + data[count].post_description + '</td>';
         output += '<td>' + data[count].date + '</td></tr>';
        }
        $('tbody').html(output);
       }
      })
     }
    
     $('#filter').click(function(){
        var date = $('#date').val();
        var date_end = $('#date_end').val();
        if(date != '' &&  date_end != '')
        {
        // $('#order_table').DataTable().destroy();
        load_data(date, date_end);
        }
        else
        {
        alert('Both Date is required');
        }
        });

        $('#refresh').click(function(){
        $('#date').val('');
        $('#date_end').val('');
        // $('#order_table').DataTable().destroy();
        load_data();
        });

        });
    </script>
@endpush
