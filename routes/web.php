<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Auth
// * Registration is disabled, because registered user will be able login to Bykecms
Auth::routes(['register' => false]);

// Home
Route::get('/', 'App\Http\Controllers\PagesController@home')->name('home');

// Set Website Language
Route::get('/set_language', 'App\Http\Controllers\PagesController@set_language');

// Cart
Route::post('/change_quantity', 'App\Http\Controllers\CartsController@change_quantity');
Route::get('/cart', 'App\Http\Controllers\CartsController@cart');
Route::get('/remove_item/{id}', 'App\Http\Controllers\CartsController@remove_item');
Route::get('/add-to-cart/{id}', 'App\Http\Controllers\CartsController@add_to_cart');
Route::post('/create_cart', 'App\Http\Controllers\CartsController@create_cart');

    //
    // CMS Routes
    //
    
    // Change Language of CMS here. Available: en, lt.
    App::setLocale('en');

    // Set CMS Language
    Route::get('/set_cms_language', 'App\Http\Controllers\CmsPagesController@set_language')->middleware('auth');;

    // Resources
    Route::resource('cms_bits', App\Http\Controllers\CmsBitsController::class)->middleware('auth');
    Route::resource('cms_configs', App\Http\Controllers\CmsConfigsController::class)->middleware('auth');
    Route::resource('cms_tags', App\Http\Controllers\CmsTagsController::class)->middleware('auth');
    Route::resource('cms_users', App\Http\Controllers\CmsUsersController::class)->middleware('auth');

    // Cms Homepage
    Route::get('/cms', 'App\Http\Controllers\CmsPagesController@home')->middleware('auth');

    // CmsTags
    Route::get('/cms_tag_delete/{id}', 'App\Http\Controllers\CmsTagsController@delete')->middleware('auth');
    Route::post('/cms_tag_positions', 'App\Http\Controllers\CmsTagsController@save_positions')->middleware('auth');

    // CmsBits
    Route::get('/cms_bit_delete/{id}', 'App\Http\Controllers\CmsBitsController@delete')->middleware('auth');
    Route::post('/cms_bit_positions', 'App\Http\Controllers\CmsBitsController@save_positions')->middleware('auth');

    // CmsPhoto
    Route::get('/cms_photos/destroy/{id}', 'App\Http\Controllers\CmsPhotosController@destroy')->middleware('auth');
    Route::post('/cms_photos/upload/', 'App\Http\Controllers\CmsPhotosController@upload')->middleware('auth');

    //
    // CMS Carts
    //
    Route::resource('/cms_carts', 'App\Http\Controllers\CmsCartsController')->middleware('auth');
    Route::get('/cms_carts/destroy/{id}', 'App\Http\Controllers\CmsCartsController@destroy')->middleware('auth');
    Route::get('/order/{hash}', 'App\Http\Controllers\CartsController@order');

// Rendering page, if other routes didn't met condition
Route::get('/{slug}', 'App\Http\Controllers\PagesController@home');

// Echo Bit
Route::get('/bit/{slug}', 'App\Http\Controllers\PagesController@bit');

