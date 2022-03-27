<?php

use App\Http\Controllers\ProductController;
use GuzzleHttp\Middleware;
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

Route::resource('/products', 'ProductController');


Route::get('/product/{id}', 'HomeController@detail');


Route::get('/', 'HomeController@index')->name('home');

// Route::get('/', function () {
//     return view('layouts.admin');
// });

Route::middleware(['auth'])->group(function () {

    Route::get('/cart', 'ProductController@cart');

    Route::get('/compare', 'ProductController@compareView');

    Route::post('/add-to-cart/{id}', 'ProductController@addToCart');

    Route::get('/remove-from-cart/{id}', 'ProductController@removeFromCart');

    Route::post('/product/compare', 'ProductController@compare')->name('product.compare');

    Route::get('/conq', 'HomeController@homeAdmin');

    Route::get('/checkout', 'ProductController@checkout');

    Route::get('/history', 'ProductController@history');

    // User
    Route::get('/mgpegawai', 'Homecontroller@user')->name('admin.user.homeUser');
    // Route::get('/mgpegawai', 'Homecontroller@user')->name('admin.user.homeUser');

    Route::resource('/users', 'UserController');

    Route::get('/mgpegawai-add', 'UserController@create');

    Route::get('/mgpegawai-edit/{id}', 'OrderController@confirmOrder');

    // End User

    // Product

    Route::get('/mgproduct-add', 'Homecontroller@mgproductAdd');

    Route::get('/mgproduct', 'Homecontroller@mgproduct')->name('admin.product.homeProduct');

    Route::get('/mgproduct-detail/{id}', 'Homecontroller@detailAdminProduct');

    Route::get('/mgproduct-edit/{id}', 'Homecontroller@editProduct');

    Route::get('/order', 'OrderController@createOrder')->name('product.order');

    // End Product

    // Category
    Route::get('/mgcate', 'CategoryController@index')->name('admin.cate.homeCate');

    Route::get('/mgcate-add', 'CategoryController@create');

    Route::get('/mgcate-edit/{id}', 'CategoryController@edit');

    Route::resource('/cates', 'CategoryController');

    // End Category

    // Brand

    Route::get('/mgbrand', 'BrandController@index')->name('admin.brand.homeBrand');


    Route::get('/mgbrand-add', 'BrandController@create');

    Route::resource('/brands', 'BrandController');

    Route::get('/mgbrand-edit/{id}', 'BrandController@edit');

    // End Brand

    // Order
    Route::resource('/orders', 'OrderController');
    Route::get('/mgorder', 'OrderController@index')->name('admin.transaction.homeTransaction');
    Route::get('/detailtr/{id}', 'OrderController@detailsTr')->name('admin.transaction.detail');
    Route::get('/result', 'OrderController@result')->name("result");
    Route::post('/history/detail', 'OrderController@history')->name('order.history');
    Route::post('/history/detail2', 'ProductController@shipmentHistory')->name('product.shipmentHistory');

    // End Order
});
