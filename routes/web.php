<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\clsAdminController;
use App\Http\Controllers\admin\category;
use App\Http\Controllers\admin_pages;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/***********************/
/*      Admin Panel    */
/*********************/

Route::get('/adminlogin', [clsAdminController::class, 'AdminLogin']);
Route::POST('/admin_login_process', [clsAdminController::class,'AdminLoginProcess']);

Route::group(['middleware' => ['AuthAdmin']], function(){

    Route::get('pages/{Module?}/{Component?}/{MenuId?}', [admin_pages::class, 'AjaxPage']); //Shows Dynamic Pages with Grid
    Route::any('details/{Module?}/{Component?}/{id?}/{Action?}', 'DataGrid\clsDataGrid@DataGrid');

    Route::get('/adminpanel', [clsAdminController::class, 'AdminDashboard']);
    Route::resource('Categories', category::class);

    Route::get('/adminlogout', [clsAdminController::class,'Logout']);
});
/***************************************************************/
