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
                        'advance-type'     => AdvanceTypeController::class,
                        'employee-advance' => EmployeeAdvanceController::class,
                        'payment-setting'  => PaymentSettingController::class,

                      ]);


      Route::get('changeStatus', 'AdminController@changeStatus');

      Route::get('changeCategorystatus', 'AdminController@changeCategorystatus');

      Route::get('changeExcatestatus','AdminController@changeExcatestatus');

      Route::get('changeOrderstatus','AdminController@changeOrderstatus');
       
      Route::get('logout','AdminController@logout')->name('admin.logout');

      Route::get('/net_profit/{show}', 'AdminController@retriveNetProfite');

      Route::get('order-detail','AdminController@orderDetail')->name('admin.details');

      // Route::get('payment-setting','PaymentSettingController@create')->name('payment.setting');
      // Route::post('payment-store','PaymentSettingController@store')->name('payment.store');
      // Route::get('payment-edit/{id}','PaymentSettingController@edit')->name('payment.edit');
      // Route::post('payment-update/{id}','PaymentSettingController@update')->name('payment.update');
      // Route::post('payment-delete/{id}','PaymentSettingController@destroy')->name('payment.destroy');

});
