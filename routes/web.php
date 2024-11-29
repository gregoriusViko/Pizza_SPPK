<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('LandingPAGE');
});

Route::get('/lihatdata', function () {
    return view('lihat_data');
});

Route::get('/inputPengolahan', function () {
    return view('Pengolahan_1');
});

Route::get('/coba', function () {
    return view('COBA');
});

Route::get('bacaData', [DataController::class, 'dataTampil']);
