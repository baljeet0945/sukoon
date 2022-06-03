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

                      ]);


       Route::get('changeStatus', 'AdminController@changeStatus');

       Route::get('change', 'AdminController@changeCategory');
       
       Route::get('logout','AdminController@logout')->name('admin.logout');

});
