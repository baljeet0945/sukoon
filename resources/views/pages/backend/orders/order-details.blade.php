@extends('layout.admin')
@section('title', 'Orders Details')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="me-auto d-none d-lg-block">
            <h2 class="text-primary font-w600 mb-0">Order Details</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Order Detaills</a></li>
            </ol>
        </div>
            <div class="col-xl-12 col-lg-12">
            <div class="card">
                
                <div class="card-body pt-2">
                    <div class="table-responsive ">
                        <table class="table items-table">
                            <tr>
                                <th class="my-0 text-black font-w500 fs-20">Items</th>
                                <th style="width:10%;" class="my-0 text-black font-w500 fs-20">Qty</th>
                                <th style="width:10%;" class="my-0 text-black font-w500 fs-20">Price</th>
                                <th class="my-0 text-black font-w500 fs-20">Total Price</th>
                                <th></th>
                            </tr>
                            @foreach ($items as $item )
                            <tr>                               
                                    
                                
                                <td>
                                    <div class="media">
                                        <a href="ecom-product-detail.html"><img class="me-3 img-fluid rounded" width="85" src="{{ asset('uploads/products/' . $item->products->image ?? null ) }}" alt="DexignZone"></a>
                                        <div class="media-body">
                                            <small class="mt-0 mb-1 font-w500"><a class="text-primary" href="javascript:void(0);"></a></small>
                                            <h5 class="mt-0 mb-2 mb-4"><a class="text-black" href="ecom-product-detail.html">{{ $item->products->product_name ?? null }}</a></h5>
                                            <div class="star-review fs-14">
                                                <i class="fa fa-star text-orange"></i>
                                                <i class="fa fa-star text-orange"></i>
                                                <i class="fa fa-star text-orange"></i>
                                                <i class="fa fa-star text-gray"></i>
                                                <i class="fa fa-star text-gray"></i>
                                                <span class="ms-3 text-dark">451 reviews</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h4 class="my-0 text-secondary font-w600">{{ $item->qty }}X</h4>
                                </td>
                                <td>
                                    <h4 class="my-0 text-secondary font-w600">&#8377;{{ $item->products->price ?? null }}</h4>
                                </td>
                                <td>
                                    <h4 class="my-0 text-secondary font-w600">&#8377;{{ $item->orders->amount ?? null}}</h4>
                                </td>
                                <td>
                                    {{-- <a href="javascript:void(0);" class="ti-close fs-28 text-danger las la-times-circle"></a> --}}
                                </td>
                                
                            </tr>
                            @endforeach
                            
                        </table>
                    </div>	
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="full-map-area mb-4">
                        <img src="images/map-2.png" alt=""> 
                        <a href="javascript:void(0);" class="btn btn-danger btn-xs">View in Fullscreen</a>
                        <i class="flaticon-381-location-4"></i>
                    </div>
                    <div class="row mx-0">
                        <div class="media align-items-center col-md-4 col-lg-6 px-0 mb-3 mb-md-0">
                            <img class="me-3 img-fluid rounded-circle" width="65" src="./images/avatar/3.jpg" alt="DexignZone">
                            <div class="media-body">
                                <h4 class="my-0 text-black">Kevin Hobs Jr.</h4>
                                <small>ID 412455</small>
                            </div>
                        </div>
                        <div class="iconbox col-md-4 col-lg-3 mb-3 mb-md-0">
                            <i class="las la-phone"></i>
                            <small>Telepon</small>
                            <p>+12 345 5662 66</p>
                        </div>
                        <div class="iconbox col-md-4 col-lg-3 mb-md-0">
                            <i class="las la-shipping-fast"></i>
                            <small>Delivery Time</small>
                            <p>12:52 AM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection