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
    Route::post('/min-support', 'minSupport')->name('min-support');
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