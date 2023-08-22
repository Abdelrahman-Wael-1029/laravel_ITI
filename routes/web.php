<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'namespace' => 'App\Http\Controllers',
], function () {
    Route::get('about', 'AboutController@index')->name('about');
    Route::get('contact', 'ContactController@index')->name('contact');
    Route::resource('products', 'ProductsController');
    Route::resource('category', 'CategoryController');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\TestMulti;

Route::get('test', function () {
    return User::find(6);
});

/*

*/