<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('LandingPAGE');
});

Route::get('/lihatdata', [DataController::class, 'dataTampil']);
Route::get('/data-tampil', [DataController::class, 'dataTampil'])->name('dataTampil');

Route::get('/data-kelompok', [DataController::class, 'dataKelompok'])->name('data_kelompok');


Route::prefix('/olah-data')->name('olahdata.')->group(function(){
    Route::view('/input', 'Pengolahan_1')->name('input');
    Route::controller(DataController::class)->group(function(){

        Route::get('/data-per-hari', 'dataKelompok')->name('kelompok-hari');

        Route::get('/data-tabular', 'dataTabular')->name('data-tabular');
    });
});

Route::prefix('/hasil')->controller(DataController::class)->name('hasil.')->group(function(){
    Route::get('/', 'hasilAkhir')->name('hasil-akhir');
    Route::post('/min-support-1', 'minSupport1')->name('min-support-1');
    Route::post('/min-support-2', 'minSupport2')->name('min-support-2');
    Route::post('/min-support-3', 'minSupport3')->name('min-support-3');
    Route::post('/conf', 'nilaiConf')->name('conf');
});

Route::get('/Pengolahan_5', function () {
    return view('Pengolahan_5');
});
Route::get('/Pengolahan_6', function () {
    return view('Pengolahan_6');
});
Route::get('/Pengolahan_7', function () {
    return view('Pengolahan_7');
});
Route::get('/Pengolahan_8', function () {
    return view('Pengolahan_8');
});
Route::get('/Hasil', function () {
    return view('Hasil');
});


Route::get('/coba', function () {
    return view('COBA');
});