<?php

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
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    'prefix' => LaravelLocalization::setLocale(),
    
], function () {
    Route::get('about', 'AboutController@index')->name('about');
    Route::get('contact', 'ContactController@index')->name('contact');
    Route::resource('products', 'ProductsController');
    Route::resource('category', 'CategoryController');

}); 

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home') ->middleware('verified');
