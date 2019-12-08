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

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');
//Route::get('/', function () {
    //    return view('welcome');
    //});
    Route::get('/','PenyewaController@index');
    Route::get('gedung/{id}','PenyewaController@DetailGedung');
    // Route::get('/sewa', 'PenyewaController@sewa');
    Route::get('/sewa/{id}/hapus', 'SewaController@destroy');


    
    Route::group(['middleware' => ['auth','owner']], function () {
        Route::get('/profiles','OwnerController@index')->name('owner.profile');
        Route::patch('/profiles/update','OwnerController@update')->name('owner.update');
        Route::get('/buildings-rentaled', 'OwnerController@penyewaan')->name('owner.penyewaan');
        Route::get('/buildings', 'GedungController@index')->name('owner.indexgedung');
        Route::post('/buildings/create', 'GedungController@store')->name('owner.creategedung');
        Route::get('/buildings/{gedung}', 'GedungController@edit')->name('owner.proposeedit');
        Route::patch('/buildings/update/{gedung}', 'GedungController@update')->name('owner.editgedung');
        Route::get('editprofile', 'OwnerController@edit');
        
    });
    
    
    
    Route::group(['middleware' => ['auth','user']], function () {    
        Route::get('masyarakat.indexsewa', function () {
            return view('masyarakat.indexsewa');
        });
        Route::POST('/sewa','SewaController@store');
        Route::get('masyarakat.indexrekomendasi', function () {
            return view('masyarakat.indexrekomendasi');
        });
        Route::get('masyarakat.indexsewa', 'GedungController@index');
        Route::get('masyarakat.showgedung/{gedung}', 'GedungController@show');
        Route::resource('masyarakat', 'MasyarakatController');
        Route::resource('admin', 'MasyarakatController');
        Route::get('bayar/{id}', 'SewaController@bayar');
        Route::post('bayar', 'SewaController@post_bayar');
        Route::get('checkout', 'SewaController@indexcheckout');
        Route::get('/sewa', 'PenyewaController@sewa');
    });
    
    
    Route::group(['middleware' => ['auth','admin']], function () {
        Route::resource('profile', 'ProfileController');
        Route::get('/gedung/{gedung}', 'GedungController@show');
        Route::get('/gedung', 'GedungController@index')->name('admin.indexbuilding');
        Route::patch('/gedung/updateverif/{gedung}', 'GedungController@adminverif')->name('admin.updateverif');
        Route::patch('/gedung/updateeditverif/{gedung}', 'GedungController@adminverifedit')->name('admin.updateverifedit');
        Route::get('/verification', 'GedungController@verification')->name('admin.buildingverification');
        Route::get('/verificationedit', 'GedungController@verificationedit')->name('admin.editverification');
        Route::get('/admin/pemilik/{user}', 'GedungController@pemilik')->name('pemilik.gedung');
        Route::get('/datapenyewa', 'GedungController@penyewa');
        Route::patch('admin/verifbayar/{payment}', 'SewaController@verifbayar');
        
        // Route::get('admin.showgedung/{gedung}', 'GedungController@show');
    });
    