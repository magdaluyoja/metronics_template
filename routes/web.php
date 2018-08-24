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
		
	    Route::get('/', 'Admin\AdminPageController@getDashboard')->name('admin');

	    Route::prefix('profile')->group(function () {

		   	Route::get("/","Admin\ProfileController@getProfileOverview");
		   	Route::get("settings","Admin\ProfileController@getProfileSettings");
		});

	    Route::post("upload-temp","Admin\UploadController@uploadTmp")->name("uploadTemp");
	});
});