<?php

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
Route::get('sample', function () {
    return view('sample');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
	Route::prefix('admin')->group(function () {
	    Route::resource('content','Admin\ContentController');
	    Route::post('/content/delete-attachment', 'Admin\ContentController@deleteAttachment')->name('deleteAttach');
	    Route::get('/', 'Admin\AdminPageController@getDashboard')->name('admin');
	});
    // Route::get('/admin', 'Admin\DashboardController@getDashboard')->name('admin');
});