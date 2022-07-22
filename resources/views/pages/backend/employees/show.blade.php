@extends('layout.admin')
@section('title', 'Employees Show')
@section('content')

    <div class="content-body" id="topBar">
        <div class="container-fluid" id="loader">
            <div class="form-head d-flex mb-3 align-items-start">
                <div class="me-auto d-none d-lg-block">
                    <h2 class="text-primary font-w600 mb-0">{{ ucwords($employees->name) }}</h2> 
                    <input type="hidden" id="employeesId" value="{{ $employees->id }}">
                    <p class="mb-0"> </p>
                </div>
    
                <div class="dropdown custom-dropdown"> 

                    <div class="btn btn-sm btn-primary light d-flex align-items-center svg-btn" data-bs-toggle="dropdown">
                        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M22.4281 2.856H21.8681V1.428C21.8681 0.56 21.2801 0 20.4401 0C19.6001 0 19.0121 0.56 19.0121 1.428V2.856H9.71606V1.428C9.71606 0.56 9.15606 0 8.28806 0C7.42006 0 6.86006 0.56 6.86006 1.428V2.856H5.57206C2.85606 2.856 0.560059 5.152 0.560059 7.868V23.016C0.560059 25.732 2.85606 28.028 5.57206 28.028H22.4281C25.1441 28.028 27.4401 25.732 27.4401 23.016V7.868C27.4401 5.152 25.1441 2.856 22.4281 2.856ZM5.57206 5.712H22.4281C23.5761 5.712 24.5841 6.72 24.5841 7.868V9.856H3.41606V7.868C3.41606 6.72 4.42406 5.712 5.57206 5.712ZM22.4281 25.144H5.57206C4.42406 25.144 3.41606 24.136 3.41606 22.988V12.712H24.5561V22.988C24.5841 24.136 23.5761 25.144 22.4281 25.144Z" fill="#2F4CDD"></path></g></svg>
                        <div class="text-start ms-3">
                            <span class="d-block fs-16" id="filter" id="btnHome">Filter Periode</span>
                            <small class="d-block fs-13 currentBillingCycle" id="content">{{ $payment->date }} - {{ $payment->date_end }}</small>
                        </div>
                        <i class="fa fa-angle-down scale5 ms-3"></i>  
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" id="filter">
                        @for ($i= 1; $i<12; $i++)
                        <a class="dropdown-item empAdvDetail" href="javascript:void(0)">2022-<?=$i?>-10 - 2022-<?=$i+1?>-10</a>
                            
                        @endfor
                        
                    </div>
                </div>
            </div>
            <div class="row overlay">
                <div class="col-xl-3 col-xxl-4 col-lg-4 col-md-4 col-sm-4">  
                    <div class="widget-stat card">
                        <div class="card-body p-3">
                            <div class="media ai-icon d-flex">
                                <span class="me-3 bgl-primary text-primary">                                
                                    <i class="fa-solid fa-indian-rupee-sign"></i>                             
    
                                </span>
                                <div class="media-body">
                                    <h3 class="mb-0 text-black"><span class=" ms-0" id="empActuallySalary">{{ $employees->amount }}</span></h3>
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
                                <h3 class="mb-0 text-black"><span class=" ms-0" id="totalAdvance">{{ $totalAdv->total_advance ?? 0}}</span></h3>
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
                                <h3 class="mb-0 text-black"><span class=" ms-0" id="pandding">{{ ($employees->amount)-($totalAdv->total_advance) }}</span></h3>
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
                                                                     
                                        <th >Advance Total</th>                                        
                                        <th>Advance Type</th>
                                        <th>Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $advances as $adv)
                                    <tr>
                                        <td id="advance">{{ $adv->advance_amount}}</td>                                        
                                        <td id="type">{{ $adv->name}}</td>                                        
                                        <td id="AdvDate">{{ $adv->created_at->format('d M,Y') }}</td>
                                      
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
 <link rel="stylesheet" href="{{ asset('backend/css/loading.css') }}">
@endpush
@push('js')
<script src="{{ asset('backend/js/loading.js') }}"></script>
    <script>
    $(document).ready(function(){
        // location.reload()
        $(".empAdvDetail").click(function(){
            var date = $(this).text();
            var employee_id = $("#employeesId").val();    
            
            $('.currentBillingCycle').text(date);
            loader('show', 'circle', 'Please Wait...');

            $.ajax({
                url:'/admin/ajaxData',
                method:"GET",
                data:{'date':date, 'employee_id':employee_id},
                dataType:"json",
                success: function(data){      
                                //console.log(data);  
                                loader('hide');    
                    if(data){                        
                        if(data.total_advance != null){
                            var sum = data.empActuallySalary- data.total_advance;
                            $('#pandding').text(sum);
                            $('#totalAdvance').text(data.total_advance);
                        } else {
                            $('#pandding').text('0');
                            $('#totalAdvance').text('0');
                        }
                         if(data.total_advance){
                            $('#advance').text(data.total_advance)
                         }else{
                            $('#advance').text('0');
                         }
                        
                         if(data.names){
                            $('#type').text(data.names);
                            $('#AdvDate').text(data.dates); 

                         }else{
                            $('#type').text('0');
                            $('#AdvDate').text('0');
                           
                         }                        
                       
                    }
                }
            });
            
        });
       
    });
 
            
         function loader(action, animation=null, text=null) {
        if(action == 'show'){
            $('body').loadingModal({'animation': animation, text: text, 'color':'#ffffff', 'backgroundColor': '#484646e0', 'opacity':'0.9'});
        }else{
            $('body').loadingModal('hide');
            $('body').loadingModal('destroy');
        }     
        }
        
        </script>
@endpush
