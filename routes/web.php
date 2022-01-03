<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\clsAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\admin\OrdersController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\ProductController;
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

//****Front Home Page*********//
Route::get('/', [PublicController::class,'index']);


//*****start of user login and registration********//
Auth::routes();
//*****end of user login and registration**********//

//****start of User Dashboard page*********//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('changePassword',[App\Http\Controllers\HomeController::class, 'changePassword'])->name('changePassword');
Route::get('viewOrders',[App\Http\Controllers\HomeController::class, 'viewOrders'])->name('viewOrders');
Route::get('logout',[App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
//****end of User page**********//


//****start of admin login *******//
Route::get('/adminlogin', [clsAdminController::class, 'AdminLogin']);
Route::POST('/admin_login_process', [clsAdminController::class,'AdminLoginProcess']);
//****end of admin login *******//

//*******Show On change subcategory*******//
Route::post('subcategory', [SubCategoryController::class,'getSubCategoryByCategoryId']);


//******Show On change*******//
Route::get('singleProducts/{id}', [PublicController::class,'singleProducShow']);

//****Review Controller*******//
Route::resource('reviews', ReviewController::class);

//*****start of admin links*********//
Route::group(['middleware' => ['AuthAdmin']], function(){



    //****Admin Dashboard Home*******//
    Route::get('/adminpanel', [clsAdminController::class, 'AdminDashboard']);


    //*****Users********//
    Route::resource('users', UserController::class);

    //*****Categories********//
    Route::resource('categories', CategoryController::class);

    //****Sub Categories******//
    Route::resource('subcategories', SubCategoryController::class);

    //***********Products*******************//
    Route::resource('products', ProductController::class);


    //***********Orders*******************//
    Route::resource('orders', OrdersController::class);

     //******Show On change subcategory******//
    Route::post('subcategory', [SubCategoryController::class,'getSubCategoryByCategoryId']);


    //*****Shipping******//
    Route::resource('shipping',ShippingController::class);


    //***Logout*****//
    Route::get('/adminlogout', [clsAdminController::class,'Logout']);

    //Reset Password
    Route::get('reset_password',[clsAdminController::class,'reset_password'])->name('reset_password');
    Route::post('resetProcess',[clsAdminController::class,'resetPasswordProcess'])->name('resetProcess');

});
//*****end of admin links*********//



