<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\clsAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\PublicController;
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

//****start of home page*********//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//****end of home page**********//


//****start of admin login *******//
Route::get('/adminlogin', [clsAdminController::class, 'AdminLogin']);
Route::POST('/admin_login_process', [clsAdminController::class,'AdminLoginProcess']);
//****end of admin login *******//

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


    /************    Products  *******************/
    Route::resource('products', ProductController::class);


     /*         Show On change subcategory        */
    Route::post('subcategory', [SubCategoryController::class,'getSubCategoryByCategoryId']);


    //***Logout*****//
    Route::get('/adminlogout', [clsAdminController::class,'Logout']);
});
//*****end of admin links*********//
