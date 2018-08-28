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
    return view('sample');
});
Route::get('sample', function () {
    return view('sample');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
	Route::prefix('admin')->group(function () {
		
	    Route::get('/', 'Admin\AdminPageController@getDashboard')->name('admin');
	    Route::post('/save-theme', 'Admin\ThemeController@saveTheme');

	    Route::prefix('profile')->group(function () {

		   	Route::get("/","Admin\ProfileController@getProfileOverview");
		   	Route::get("settings","Admin\ProfileController@getProfileSettings");

		   	Route::post("/update-picture","Admin\ProfileController@updateProfilePic")->name('update_picture');
		   	Route::put("/update/{id}","Admin\ProfileController@updateProfile")->name('update_profile');
		   	Route::post("/check-password","Admin\ProfileController@checkPassword")->name("checkPassword");
		   	Route::put("/password-update/{id}","Admin\ProfileController@updatePassword")->name("updatePassword");
		});

	    Route::post("upload-temp","Admin\UploadController@uploadTmp")->name("uploadTemp");
	});
});