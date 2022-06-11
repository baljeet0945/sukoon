<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;



Route::group(['middleware' => 'web','as'=>'admin.'], function()
{
    //Route::get('admin','AdminController@signin');
    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');

    Route::resources ([
                        'category'  => CategoryController::class,
                        'product'   => ProductController::class,
                        'expens'    => ExpensiveController::class,
                        'excates'   => ExcateController::class,
                        'daily'     => DailysaleController::class,
                        'orders'    => OrderController::class,

                      ]);


       Route::get('changeStatus', 'AdminController@changeStatus');

       Route::get('changeCategorystatus', 'AdminController@changeCategorystatus');

       Route::get('changeEcatestatus','AdminController@changeEcatestatus');
       
       Route::get('logout','AdminController@logout')->name('admin.logout');

      //Route::get('chart-line', 'ChartController@chartLine');
      //Route::get('chart-line-ajax', 'ChartController@chartLineAjax');

      Route::get('/net_profit/{show}', 'AdminController@retriveNetProfite');

});
