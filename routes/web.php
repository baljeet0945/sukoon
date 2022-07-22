<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
//use App\Http\Controllers\admin\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::prefix('admin')->middleware('auth')->group(function () {
    
// });
Route::get('/admin', 'admin\AdminController@signin');

Route::post('/admin-login','admin\AdminController@adminLogin')->name('admin.login');


Route::get('/', [FrontendController::class,'dashboard']);
Route::get('/{any}', [FrontendController::class,'dashboard']); 