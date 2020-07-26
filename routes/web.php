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

// ----------------------------------------------------------ADMIN
Route::group(['middleware' => 'admin'], function () {
    // Admin 
    Route::get('/dashboard', 'DashboardController@index');
    Route::resource('user', 'UserController');
    Route::resource('ustad', 'UstadController');
    Route::resource('admin', 'AdminController');

    // Artikel 
    Route::resource('artikel', 'ArtikelController');
    Route::resource('kategori-artikel', 'KategoriArtikelController');

    // Video
    Route::resource('video', 'VideoController');
    Route::resource('kategori-video', 'KategoriVideoController');

    // Doa & Motivasi
    Route::resource('/doa-hadist', 'DoaHadistController');

    // Plugin (Iklan dan Hadist Harian)
    Route::resource('iklan', 'IklanController');
    Route::resource('hadist', 'HadistController');
});

// ----------------------------------------------------------USER
// Token Register
Route::get('/verification/{token}/{id}', 'Auth\RegisterController@verification');

Route::group(['middleware' => 'auth'], function () {
    // Profile
    Route::get('/profile', 'HomeController@profile');
    Route::put('/profile/{id}', 'HomeController@profile_update');

    // Koment
    Route::post('komentar-artikel/{id}', 'KomentArtikelController@store');
});

// Home
Route::get('/', 'HomeController@index');

// Filter
Route::get('/belajar-artikel/{kategori}', 'HomeController@filter_artikel');
Route::get('/belajar-video/{kategori}', 'HomeController@filter_video');

// Single
Route::get('/artikel-islam/{slug}', 'HomeController@show_artikel');
Route::get('/video-islam/{slug}', 'HomeController@show_video');



// Search
Route::get('/search/artikel', 'HomeController@search_artikel');

// Motivasi
Route::get('/motivasi', 'HomeController@motivasi');


// Core Laravel
Route::get('/logout', function () {
    return abort('404');
});

Auth::routes();
