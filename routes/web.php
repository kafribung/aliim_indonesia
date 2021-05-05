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

    // Galeri
    Route::resource('/galeri', 'GaleriController')->middleware('tolak.ustad');

    // Iklan
    Route::resource('iklan', 'IklanController')->middleware('tolak.ustad');

    // Hadist Harian
    Route::resource('hadist', 'HadistController');

    // Tanggapan
    Route::get('response', 'TanggapanController@index');
    Route::delete('response/{response:id}', 'TanggapanController@destroy');
});

// ----------------------------------------------------------USER
Route::namespace('Pages')->group(function(){
    Route::group(['middleware' => 'auth'], function () {
        // Profile
        Route::get('profil', 'ProfilController@index');
        Route::put('profil/{id}', 'ProfilController@update');
        // Tanggapan
        Route::post('tanggapan', 'ResponseController')->name('tanggapan.store');
        // Notifikasi
        Route::get('notifikasi', 'NotifikasiController@index');
    });
    // Redirect Tanggapan
    Route::get('tanggapan', function(){
        return redirect('/');
    });
    // Home
    Route::get('/', 'HomeController')->name('home');
    // Filter
    Route::get('belajar-artikel/{kategori}', 'FilterArtikelController');
    // Single
    Route::get('artikel-islam/{artikel:slug}', 'SingelArtikelController');

    // Search
    Route::get('search/artikel', 'SearchArtikelController');
    // Motivasi
    Route::get('galeri-islam', 'MotivasiController');
});
// Token Register
Route::get('verification/{token}/{id}', 'Auth\RegisterController@verification');
// Core Laravel
Route::get('logout', function () {
    return abort('404');
});
Auth::routes();
