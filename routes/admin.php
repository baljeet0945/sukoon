<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;



Route::group(['middleware' => 'web','as'=>'admin.'], function()
{
    //Route::get('admin','AdminController@signin');
    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');

    Route::resources ([
                        'category'         => CategoryController::class,
                        'product'          => ProductController::class,
                        'expens'           => ExpensiveController::class,
                        'excates'          => ExcateController::class,
                        'daily'            => DailysaleController::class,
                        'orders'           => OrderController::class,
                        'employees'        => EmployeeController::class,
                        'employee-advance' => EmployeeAdvanceController::class,

                      ]);


       Route::get('changeStatus', 'AdminController@changeStatus');

       Route::get('changeCategorystatus', 'AdminController@changeCategorystatus');

       Route::get('changeExcatestatus','AdminController@changeExcatestatus');

       Route::get('changeOrderstatus','AdminController@changeOrderstatus');
       
       Route::get('logout','AdminController@logout')->name('admin.logout');

      
      Route::get('/net_profit/{show}', 'AdminController@retriveNetProfite');

      Route::get('order-detail','AdminController@orderDetail')->name('admin.details');

      Route::post('advance','AdminController@store')->name('admin.advance');

});
