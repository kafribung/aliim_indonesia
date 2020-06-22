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

Route::group(['middleware' => 'admin'], function () {
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

// Token Register
Route::get('/verification/{token}/{id}', 'Auth\RegisterController@verification');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', function(){
    return abort('404');
});


Auth::routes();

