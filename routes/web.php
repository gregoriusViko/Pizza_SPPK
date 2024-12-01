<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('LandingPAGE');
});

Route::get('/lihatdata', [DataController::class, 'dataTampil']);

Route::prefix('/olah-data')->name('olahdata.')->group(function(){
    Route::view('/input', 'Pengolahan_1')->name('input');

    Route::get('/data-per-hari', [DataController::class, 'dataKelompok'])->name('kelompok-hari');
});

Route::get('/coba', function () {
    return view('COBA');
});