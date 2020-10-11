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
Route::namespace('pages')->group(function(){
    Route::group(['middleware' => 'auth'], function () {
        // Profile
        Route::get('/profil', 'ProfilController@index');
        Route::put('/profil/{id}', 'ProfilController@update');
    });
    // Home
    Route::get('/', 'HomeController@index')->name('home');
    // Filter
    Route::get('/belajar-artikel/{kategori}', 'FilterArtikelController');
    Route::get('/belajar-video/{kategori}', 'FilterVideoController');
    // Single
    Route::get('/artikel-islam/{artikel:slug}', 'SingelArtikelController');
    Route::get('/video-islam/{video:slug}', 'SingelVideoController');
    // Search
    Route::get('/search/artikel', 'HomeController@search_artikel');
    // Motivasi
    Route::get('/motivasi', 'MotivasiController@index');
});
// Token Register
Route::get('/verification/{token}/{id}', 'Auth\RegisterController@verification');
// Core Laravel
Route::get('/logout', function () {
    return abort('404');
});
Auth::routes();
