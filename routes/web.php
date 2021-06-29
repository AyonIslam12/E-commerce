<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FilemanagerController;
use App\Http\Controllers\Admin\Usercontroller;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\ColorController;
use App\Http\Controllers\Product\MainCategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\PublicationController;
use App\Http\Controllers\Product\SizeController;
use App\Http\Controllers\Product\StatusController;
use App\Http\Controllers\Product\SubCategoryController;
use App\Http\Controllers\Product\UnitController;
use App\Http\Controllers\Product\VendorController;
use App\Http\Controllers\Product\WriterController;
use App\Http\Controllers\WebsiteController;
use App\Models\MainCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[WebsiteController::class,'index'])->name('website_home');
Route::get('/products',[WebsiteController::class,'products'])->name('website_products');
Route::get('/product-details',[WebsiteController::class,'productDetails'])->name('website_products_details');
Route::get('/cart',[WebsiteController::class,'cart'])->name('website_cart');
Route::get('/checkout',[WebsiteController::class,'checkout'])->name('website_checkout');
Route::get('/your-wishlist',[WebsiteController::class,'wishlist'])->name('website_wishlist');
Route::get('/contact-us',[WebsiteController::class,'contact'])->name('website_contact');

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth',
    'namespace' => 'Admin'],
    function( ){
    Route::get('/', [AdminController::class,'index'])->name('admin.index');


    //basic_page

    Route::get('/blade-index',[AdminController::class,'blade_index'])->name('admin_blade_index');
    Route::get('/blade-create',[AdminController::class,'blade_create'])->name('admin_blade_create');
    Route::get('/blade-view',[AdminController::class,'blade_view'])->name('admin_blade_view');


});
//User Management
Route::group([
    'prefix' => 'user',
    'middleware' => ['auth','check_user_is_active','super_admin'],
    'namespace' => 'Admin'],
    function( ){

    Route::get('/index',[Usercontroller::class,'index'])->name('admin_user_index');
    Route::get('/create',[Usercontroller::class,'create'])->name('admin_user_create');
    Route::post('/store',[Usercontroller::class,'store'])->name('admin_user_store');
    Route::get('/show/{id}',[Usercontroller::class,'show'])->name('admin_user_show');
    Route::get('/edit/{id}',[Usercontroller::class,'edit'])->name('admin_user_edit');
    Route::put('/update/{id}',[Usercontroller::class,'update'])->name('admin_user_update');
    Route::post('/delete',[Usercontroller::class,'delete'])->name('admin_user_delete');



});
//User Role Management
Route::group(['prefix' => 'user-role',
'middleware' => ['auth','check_user_is_active','super_admin'],
'namespace' => 'Admin'],
function( ){

    Route::get('/index',[UserRoleController::class,'index'])->name('admin_user_role_index');
    Route::post('/update',[UserRoleController::class,'update'])->name('admin_user_role_update');
    Route::post('/delete',[UserRoleController::class,'delete'])->name('admin_user_role_delete');


});
//product Page
Route::group([
'prefix' => 'admin/product',
'middleware' => 'auth',
'namespace' => 'Product'],
function( ){
    /* Route::get('/index',[ProductController::class,'index'])->name('admin_product_index');
    Route::get('/create',[ProductController::class,'create'])->name('admin_product_create');
    Route::post('/store',[ProductController::class,'store'])->name('admin_product_store');
    Route::get('/show',[ProductController::class,'show'])->name('admin_product_show'); */
    Route::resource('product', 'ProductController');

    Route::resource('brand','BrandController');
    Route::resource('main-category','MainCategoryController');
    Route::resource('category', 'CategoryController');
    Route::resource('sub-category','SubCategoryController');
    Route::resource('color','ColorController');
    Route::resource('size','SizeController');
    Route::resource('unit','UnitController');
    Route::resource('status','StatusController');
    Route::resource('writer','WriterController');
    Route::resource('publication','PublicationController');
    Route::resource('vendor','VendorController');

    Route::get('/get-all-category-selected-by-main-category/{main_category_id}',[CategoryController::class,'get_category_by_main_category'])->name('get_all_category_selected_by_main_category');
    Route::get('/get-all-sub-cateogory-selected-by-category/{category_id}',[CategoryController::class,'get_sub_category_by_category'])->name('get_all_sub_category_by_category');
//Geting json data for
   /*  Route::get('/get-all-main-category-josn', [MainCategoryController::class,'get_main_category_json'])->name('get_main_category_json');
    Route::get('/get-all-category-josn', 'CategoryController@get_category_json')->name('get_category_json'); */
});

Route::group([
    'prefix' => 'file-manager',
    'middleware' => ['auth'],
    'namespace' => 'Admin'
], function () {

    Route::post('/store-file',[FilemanagerController::class,'store_file'])->name('admin_fm_store_file');
    Route::get('/get-files', [FilemanagerController::class,'get_files'])->name('admin_fm_get_files');
    Route::delete('/delete-file/{id}', [FilemanagerController::class,'delete_file'])->name('admin_fm_delete_file');
});
//Blank Page
Route::group(['prefix' => 'blank',
'middleware' => 'auth',
'namespace' => 'Admin'],
function( ){



    //basic_page

    Route::get('/blade-index',[AdminController::class,'blade_index'])->name('admin_blade_index');
    Route::get('/blade-create',[AdminController::class,'blade_create'])->name('admin_blade_create');
    Route::get('/blade-view',[AdminController::class,'blade_view'])->name('admin_blade_view');


});


