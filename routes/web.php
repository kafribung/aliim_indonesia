<?php

use Illuminate\Support\Facades\Route;
// ----------------------------------------------------------ADMIN
Route::group(['middleware' => 'admin'], function () {
    // Admin 
    Route::get('/dashboard', 'DashboardController@index');
    Route::resource('user', 'UserController')->middleware('tolak.ustad');
    Route::resource('ustad', 'UstadController')->middleware('tolak.ustad');
    Route::resource('admin', 'AdminController')->middleware('tolak.ustad');

    // Artikel 
    Route::resource('artikel', 'ArtikelController');
    Route::resource('kategori-artikel', 'KategoriArtikelController');

    // Video
    Route::resource('video', 'VideoController');
    Route::resource('kategori-video', 'KategoriVideoController');

    // Doa & Motivasi
    Route::resource('/doa-hadist', 'DoaHadistController')->middleware('tolak.ustad');

    // Plugin (Iklan dan Hadist Harian)
    Route::resource('iklan', 'IklanController')->middleware('tolak.ustad');
    Route::resource('hadist', 'HadistController')->middleware('tolak.ustad');
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
Route::get('/artikel-islam/{artikel:slug}', 'SingelController@show');
Route::get('/video-islam/{artikel:slug}', 'SingelController@show');

// Search
Route::get('/search/artikel', 'HomeController@search_artikel');

// Motivasi
Route::get('/motivasi', 'HomeController@motivasi');


// Core Laravel
Route::get('/logout', function () {
    return abort('404');
});

Auth::routes();
