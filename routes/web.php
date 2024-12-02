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

    Route::get('/data-per-hari', [DataController::class, 'dataKelompok'])->name('kelompok-hari');
});


Route::get('/Pengolahan_2', function () {
    return view('Pengolahan_2');
});
Route::get('/Pengolahan_3', function () {
    return view('Pengolahan_3');
});
Route::get('/Pengolahan_4', function () {
    return view('Pengolahan_4');
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