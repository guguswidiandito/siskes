<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware'=>['auth']], function () {
    Route::resource('pasien', 'PasienController');
    Route::resource('dokter', 'DokterController');
    Route::resource('kunjungan', 'KunjunganController');
    Route::resource('medis', 'RekamController');
    Route::resource('obat', 'ObatController');
    Route::resource('resep', 'ResepController');
    Route::resource('anggota', 'MemberController');
    Route::get('laporan/kunjungan', [
    'as' => 'laporan.kunjungan',
    'uses' => 'KunjunganController@export'
    ]);
    Route::post('laporan/kunjungan', [
    'as' => 'laporan.kunjungan.post',
    'uses' => 'KunjunganController@exportPost'
    ]);
    Route::get('laporan/obat', [
    'as' => 'laporan.obat',
    'uses' => 'ObatController@export'
    ]);
    Route::post('laporan/obat', [
    'as' => 'laporan.obat.post',
    'uses' => 'ObatController@exportPost'
    ]);
    Route::get('laporan/tindakan', [
    'as' => 'laporan.tindakan',
    'uses' => 'RekamController@export'
    ]);
    Route::post('laporan/tindakan', [
    'as' => 'laporan.tindakan.post',
    'uses' => 'RekamController@exportPost'
    ]);
    Route::get('resep/cetak/{id}', [
    'as' => 'resep.cetak',
    'uses' => 'ResepController@cetakResep'
    ]);
    Route::post('resep/obat', 'ResepController@obat');
    Route::get('pasien/kartu/{id}', 'PasienController@kartu');
});
