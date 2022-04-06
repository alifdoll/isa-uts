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

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    // User
    Route::resource('/users', 'UserController');
    Route::resource('/shipment', 'ShipmentController');
    Route::get('/mgpegawai-add', 'UserController@create');
    // End User

    Route::get('/locDetail-shipped/{id}', 'ShipmentController@shipped')->name("shipped");
    Route::get('/locDetail-add', 'ShipmentController@storeLoc')->name("addLocation");
    Route::get('/stops/{id}', 'ShipmentController@getTrack');

    Route::get('/locDetail/{id}', 'HomeController@createLoc');
    Route::get('/send', 'HomeController@sendItemView');
});
