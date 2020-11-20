<?php

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

App::setLocale('en');

// Auth
Auth::routes();

// Home
Route::get('/', 'App\Http\Controllers\PagesController@home')->name('home');

use Illuminate\Support\Facades\Auth;

//
// CMS
//
//if (\Auth::check()) {

    // Resources
    Route::resources([
        'cms_bits' => App\Http\Controllers\CmsBitsController::class,
        'cms_configs' => App\Http\Controllers\CmsConfigsController::class,
        'cms_tags' => App\Http\Controllers\CmsTagsController::class,
        'cms_users' => App\Http\Controllers\CmsUsersController::class
    ]);

    // Cms Homepage
    Route::get('/cms', 'App\Http\Controllers\CmsPagesController@home');

    // CmsTags
    Route::get('/cms_tag_delete/{id}', 'App\Http\Controllers\CmsTagsController@delete');
    Route::post('/cms_tag_positions', 'App\Http\Controllers\CmsTagsController@save_positions');

    // CmsBits
    Route::get('/cms_bit_delete/{id}', 'App\Http\Controllers\CmsBitsController@delete');
    Route::post('/cms_bit_positions', 'App\Http\Controllers\CmsBitsController@save_positions');

    // CmsPhoto
    Route::get('/cms_photos/destroy/{id}', 'App\Http\Controllers\CmsPhotosController@destroy');
    Route::post('/cms_photos/upload/', 'App\Http\Controllers\CmsPhotosController@upload');
//}

// Cart
Route::post('/change_quantity', 'App\Http\Controllers\CartsController@change_quantity');
Route::get('/prekiu-krepselis', 'App\Http\Controllers\CartsController@show_cart');
Route::get('/remove_item/{id}', 'App\Http\Controllers\CartsController@remove_item');
Route::get('/add-to-cart/{id}', 'App\Http\Controllers\CartsController@add_to_cart');
Route::post('/create_cart', 'App\Http\Controllers\CartsController@create_cart');

/*
Route::get('flights', function () {
    // Only authenticated users may enter...
})->middleware('auth');
*/

// App, Categories
Route::get('/{slug}', 'App\Http\Controllers\PagesController@home');
